<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PapelRepositoryInterface;
use App\Repositories\Interfaces\PapelPermissaoRepositoryInterface;
use App\Repositories\Interfaces\PermissaoRepositoryInterface;
use App\Http\Requests\StoreUpdatePapelFormRequest;

class PapelController extends Controller
{
    protected $repository, $permissaoRepository, $papelPermissaoRepository, $model;
    
    public function __construct(
            PapelRepositoryInterface $repository, 
            PapelPermissaoRepositoryInterface $papelPermissaoRepository,
            PermissaoRepositoryInterface $permissaoRepository,
            Request $request) 
    {
        $this->repository = $repository;
        $this->papelPermissaoRepository = $papelPermissaoRepository;
        $this->permissaoRepository = $permissaoRepository;
        $this->model = $request->segment(2);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //recupera todos os dados da tabela
        $data = $this->repository->paginate();
        
        //chama a view index para listagem dos dados
        return view('admin.'.$this->model.'.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //recupera todas as permissoes
        $permissoes = $this->permissaoRepository->getAll();

        //chama a view create com o formulário para cadastro
        return view('admin.'.$this->model.'.create', compact('permissoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePapelFormRequest $request)
    {
        
        //persiste o papel no banco
        $papel = $this->repository->store($request->all());
        
        if($papel):
            //associa os papeis às permissões selecionadas
            $papel->permissoes()->sync($request->permissoes);
        
            return redirect()->route($this->model.'.index')
                ->withSuccess('Cadasro realizado com sucesso!');
        else:
            return redirect()->back()->withErrors('Falha ao cadastrar!');
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //recupera os papeis e suas perissões pelo seu id
        $data = $this->repository->relationships('permissoes')->findById($id);
        
        //chama a view show e passa os dados na variável $data
        return view('admin.'.$this->model.'.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //retorna as permissões que estão associadas ao papel
        $permissoesAssociadas = $this->papelPermissaoRepository
                ->findWhere('papel_id',$id)->pluck('permissao_id');
        
        //retorna as permissões que ainda estão disponíveis
        $permissoes = $this->permissaoRepository
                ->findWhereNotIn('id',$permissoesAssociadas);
                
        if(!$data = $this->repository->relationships('permissoes')->findById($id)):
            return redirect()->back();
        else:
            return view('admin.'.$this->model.'.edit', compact('data','permissoes'));
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePapelFormRequest $request, $id)
    {
        //recupera o papel em questão e sincroniza
        $papel = $this->repository->findById($id);
        $papel->permissoes()->sync($request->permissoes);

        //atualia os dados de um registro específico
        $this->repository->update($id, $request->all());
        
        //redireciona para a view index
        return redirect()->route($this->model.'.index')
                ->withSuccess('Atualização realizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //verifica se a conta foi deletada com sucesso e redireciona para a view index,
        //caso contrário mostra uma mensagem de erro
        if($this->repository->delete($id)):
            $this->papelPermissaoRepository->deleteWhere('papel_id',$id);
            return redirect()->route($this->model.'.index')
                ->withSuccess('Cadastro deletado co sucesso!');
        else:
            return redirect()->back()->withErrors("Falha ao deletar");
        endif;
    }
    
     /**
     * Mostra o resultado da pesquisa na tabela contas
     * 
     * @param Request $request
     * @return type
     */
    public function search(Request $request) 
    {
        //filtro com os parametros da pesquisa
        $filters = $request->except('_token');
        
        //realiza a pesquisa com os filtros passados e armazena em $data
        $data = $this->repository->search($filters);
        
        //chama a view index retornado os filtros e os dados encontrados
        return view('admin.'.$this->model.'.index', compact('data','filters'));
    }
}
