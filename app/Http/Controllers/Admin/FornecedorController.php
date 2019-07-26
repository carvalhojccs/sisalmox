<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\FornecedorRepositoryInterface;
use App\Http\Requests\StoreUpdateFornecedorFormRequest;

class FornecedorController extends Controller
{
    protected $repository, $model;

    public function __construct(FornecedorRepositoryInterface $repository, Request $request)
    {
        $this->repository = $repository;
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
        //chama a view create com o formulário para cadastro
        return view('admin.'.$this->model.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateFornecedorFormRequest $request)
    {
         if($this->repository->store($request->all())):
            return redirect()->route($this->model.'.index')->withSuccess('Cadasro realizado com sucesso!');
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
        //recupera os dados pelo seu id
        $data = $this->repository->findById($id);
        
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
        if(!$data = $this->repository->findById($id)):
            return redirect()->back();
        else:
            return view('admin.'.$this->model.'.edit', compact('data'));
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateFornecedorFormRequest $request, $id)
    {
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
            return redirect()->route($this->model.'.index')
                ->withSuccess('Cadastro deletado co sucesso!');
        else:
            return redirect()->back()->withErrors("Falha ao deletar");
        endif;
    }

    /**
     * Mostra o resultado da pesquisa na tabela fornecedores
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
