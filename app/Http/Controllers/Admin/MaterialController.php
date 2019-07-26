<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\MaterialRepositoryInterface;
use App\Repositories\Interfaces\UnidadeRepositoryInterface;
use App\Repositories\Interfaces\ContaRepositoryInterface;
use App\Http\Requests\StoreUpdateMaterialFormRequest;

class MaterialController extends Controller
{
    protected $repository, $unidadeRepository, $contaRepository, $model;
    
    public function __construct(MaterialRepositoryInterface $repository, UnidadeRepositoryInterface $unidadeRepository, ContaRepositoryInterface $contaRepository, Request $request)
    {
        $this->repository = $repository;
        $this->unidadeRepository = $unidadeRepository;
        $this->contaRepository = $contaRepository;
        $this->model = $request->segment(2);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //recupera todas as unidades
        $unidades = $this->unidadeRepository->selectUnidades();
        
        //recupera todas as contas
        $contas = $this->contaRepository->selectContas();

        //recupera todos os dados da tabela
        $data = $this->repository->relationships('unidade','conta')->paginate();
        
        
        
        //chama a view index para listagem dos dados
        return view('admin.'.$this->model.'.index', compact('data', 'unidades','contas'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //recupera todas as unidades
        $unidades = $this->unidadeRepository->selectUnidades();
        
        //recupera todas as contas
        $contas = $this->contaRepository->selectContas();
        
        //chama a view create com o formulário para cadastro
        return view('admin.'.$this->model.'.create', compact('contas','unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateMaterialFormRequest $request)
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
        $data = $this->repository->relationships('unidade','conta')->findById($id);
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
