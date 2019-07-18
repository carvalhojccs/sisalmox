<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ContaRepositoryInterface;
use App\Http\Requests\StoreUpdateContaFormRequest;

class ContaController extends Controller
{
    protected $repository;

    public function __construct(ContaRepositoryInterface $repository) 
    {
        $this->repository = $repository;
    }
    
    /**
     * Exibe a listagem dos dados da tabela contas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //recupera todos os dados da tabela contas
        $data = $this->repository->paginate();
        
        //chama a view index para listagem dos dados
        return view('admin.contas.index', compact('data'));
    }

    /**
     * Mostra o formulário de criação de uma nova conta
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //chama a view create com o formulário para cadastro de uma nova conta
        return view('admin.contas.create');
    }

    /**
     * Armazena uma nova conta na tabela contas.
     *
     * @param  \App\Http\Requests\StoreUpdateContaFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateContaFormRequest $request)
    {
        //verifica se os dados foram armazenados com sucesso e redireciona para view index,
        //caso contrário exibe uma mensagem de erro
        if($this->repository->store($request->all())):
            return redirect()->route('contas.index')->withSuccess('Cadastro realizado com sucesso!');
        else:
            return redirect()->back()->withErrors('Falha ao cadastrar!');
        endif;
    }

    /**
     * Mostra os detalhes de uma conta específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //recupera uma conta pelo seu id
        $data = $this->repository->findById($id);
        
        //chama a view show passando os dados ca conta recuperada 
        return view('admin.contas.show', compact('data'));
    }

    /**
     * Mostra o formulário para edição de uma conta específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //verifica se a conta existe e passa os dados dela para a view edit,
        //caso contrário mostra uma mensagem de erro
        if(!$data = $this->repository->findById($id)):
            return redirect()->back();
        else:
            return view('admin.contas.edit', compact('data'));
        endif;
    }

    /**
     * Atualiza uma conta específica na tabela contas.
     *
     * @param  \App\Http\Requests\StoreUpdateContaFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateContaFormRequest $request, $id)
    {
        //realiza a atualização de uma conta específica e redireciona para a view index 
        $this->repository->update($id, $request->all());
        return redirect()->route('contas.index')->withSuccess('Atualização realizada com sucesso!');
    }

    /**
     * Remove uma conta específica da tabela contas.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //verifica se a conta foi deletada com sucesso e redireciona para a view index,
        //caso contrário mostra uma mensagem de erro
        if($this->repository->delete($id)):
            return redirect()->route('contas.index')->withSuccess('Cadastro deletado com sucesso!');
        else:
            return redirect()->back()->withErrors('Falha ao deletar!');
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
        $filter = $request->except('_token');
        
        //realiza a pesquisa com os filtros passados e armazena em $data
        $data = $this->repository->search($filter);
        
        //chama a view index retornado os filtros e os dados encontrados
        return view('admin.contas.index', compact('data','filter'));
    }
}
