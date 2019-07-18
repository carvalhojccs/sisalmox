<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\EquipamentoRepositoryInterface;
use App\Http\Requests\StoreUpdateEquipamentoFormRequest;

class EquipamentoController extends Controller
{
    protected $repository;
    protected $titulo = 'Equipamento';

    public function __construct(EquipamentoRepositoryInterface $repositori) 
    {
        $this->repository = $repositori;
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
        
        return view('admin.equipamentos.index', compact('data','titulo'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = $this->titulo.' - Cadastrar';
        
        return view('admin.equipamentos.create', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateEquipamentoFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateEquipamentoFormRequest $request)
    {
       if($this->repository->store($request->all())):
            return redirect()->route('equipamentos.index')->withSuccess('Cadasro realizado com sucesso!');
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
        
        return view('admin.equipamentos.index', compact('data','titulo'));
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
            return view('admin.equipamentos.edit', compact('data','titulo'));
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param   \App\Http\Requests\StoreUpdateEquipamentoFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateEquipamentoFormRequest $request, $id)
    {
        $this->repository->update($id, $request->all());
        return redirect()->route('equipamentos.index')->withSuccess('Atualização realizada com sucesso!');
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
            return redirect()->route('equipamentos.index')->withSuccess('Cadastro deletado co sucesso!');
        else:
            return redirect()->back()->withErrors("Falha ao deletar");
        endif;
    }
    
    public function search(Request $request) 
    {
        $titulo = $this->titulo;
        
        $filter = $request->except('_token');
        
        $data = $this->repository->search($filter);
        
        return view('admin.equipamentos.index', compact('data','filter','titulo'));
    }
}
