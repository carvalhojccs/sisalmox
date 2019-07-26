<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TipoMovimentoRepositoryInterface;
use App\Repositories\Interfaces\DocumentoRepositoryInterface;
use App\Repositories\Interfaces\MovimentoRepositoryInterface;

class MovimentoController extends Controller
{
    protected $repository, $tipoMovimentoRepository, $documentoRepository, $model;
    
    public function __construct(
            MovimentoRepositoryInterface $repository, 
            TipoMovimentoRepositoryInterface $tipoMovimentoRepository, 
            DocumentoRepositoryInterface $documentoRepository,
            Request $request) 
    {
        $this->repository = $repository;
        $this->tipoMovimentoRepository = $tipoMovimentoRepository;
        $this->documentoRepository = $documentoRepository;
        $this->model = $request->segment(2);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.entradas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
