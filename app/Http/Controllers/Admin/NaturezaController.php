<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\NaturezaRepositoryInterface;
use App\Http\Requests\StoreUpdateNaturezaFormRequest;

class NaturezaController extends Controller
{
    protected $repository;
    protected $titulo = 'Natureza de despesa';

    public function __construct(NaturezaRepositoryInterface $repository) 
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = $this->titulo.' - Listagem';
        
        $data = $this->repository->paginate();
        
        return view('admin.naturezas.index', compact('data', 'titulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = $this->titulo.' - Cadastrar';
        
        return view('admin.naturezas.create', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateNaturezaFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateNaturezaFormRequest $request)
    {
        if($this->repository->store($request->all())):
            return redirect()->route('naturezas.index')->withSuccess('Cadasro realizado com sucesso!');
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
        $titulo = $this->titulo.' - Detalhes';
        
        $data = $this->repository->findById($id);
        
        return view('admin.naturezas.show', compact('data','titulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulo = $this->titulo.' - Editar';
        
        if(!$data = $this->repository->findById($id)):
            return redirect()->back();
        else:
            return view('admin.naturezas.edit', compact('data','titulo'));
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateNaturezaFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateNaturezaFormRequest $request, $id)
    {
        $this->repository->update($id, $request->all());
        return redirect()->route('naturezas.index')->withSuccess('Atualização realizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->repository->delete($id)):
            return redirect()->route('naturezas.index')->withSuccess('Cadastro deletado co sucesso!');
        else:
            return redirect()->back()->withErrors("Falha ao deletar");
        endif;
    }
    
    public function search(Request $request) 
    {
        $titulo = $this->titulo;
        
        $filter = $request->except('_token');
        
        $unidades = $this->repository->search($filter);
        
        return view('admin.unidades.index', compact('unidades','filter','titulo'));
    }
}
