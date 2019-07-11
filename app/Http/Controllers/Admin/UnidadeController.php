<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UnidadeRepositoryInterface;
use App\Http\Requests\StoreUpdateUnidadeFormRequest;

class UnidadeController extends Controller 
{
    protected $repository;
    protected $titulo = 'Unidade de Fornecimento';


    public function __construct(UnidadeRepositoryInterface $repository) 
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
        $titulo = $this->titulo;
        
        $unidades = $this->repository->paginate();
        
        return view('admin.unidades.index', compact('titulo','unidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = 'Adicionar nova unidade de fornecimento';
        
        return view('admin.unidades.create', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateUnidadeFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUnidadeFormRequest $request)
    {
        if($this->repository->store($request->all())):
            return redirect()->route('unidades.index')->withSuccess('Cadastro realizado com sucesso!');
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
        
        if(!$data = $this->repository->findById($id)):
            return redirect()->back();
        else:
            
            //dd($data->created_at->format('d/m/Y'));
            
            
            return view('admin.unidades.show', compact('data','titulo'));
        endif;
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
        
        if (!$data = $this->repository->findById($id)):
            return redirect()->back();
        else:
            return view('admin.unidades.edit', compact('data', 'titulo'));
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUnidadeFormRequest $request, $id)
    {
        $this->repository->update($id, $request->all());
        return redirect()
                    ->route('unidades.index')
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
        //
    }
    
    public function search(Request $request) 
    {
        $titulo = $this->titulo;
        
        $data = $request->except('_token');
        
        $unidades = $this->repository->search($data);
        
        return view('admin.unidades.index', compact('unidades','data','titulo'));
    }
}
