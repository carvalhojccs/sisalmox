<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\EntradaRepositoryInterface;
use App\Repositories\Interfaces\DocumentoRepositoryInterface;
use App\Repositories\Interfaces\MaterialRepositoryInterface;
use App\Repositories\Interfaces\ContaRepositoryInterface;
use App\Repositories\Interfaces\TipoMovimentoRepositoryInterface;
use App\Repositories\Interfaces\NaturezaRepositoryInterface;
use App\Repositories\Interfaces\ArmazemRepositoryInterface;
use App\Repositories\Interfaces\ArmazenagemRepositoryInterface;
use App\Http\Requests\StoreUpdateEntradaFormRequest;
use DB;
use Illuminate\Support\Carbon;

class EntradaController extends Controller
{
    protected   $repository, 
                $documentoRepository,
                $materialRepository, 
                $tipoMovimentoRepository, 
                $contaRepository,
                $naturezaRepository,
                $armazemRepository,
                $armazenagemRepository,
                $model;
    
    public function __construct(
            EntradaRepositoryInterface $repository, 
            DocumentoRepositoryInterface $documentoRepository,
            MaterialRepositoryInterface $materialRepository,
            TipoMovimentoRepositoryInterface $tipoMovimentoRepository,
            ContaRepositoryInterface $contaRepository,
            NaturezaRepositoryInterface $naturezaRepository,
            ArmazemRepositoryInterface $armazemRepository,
            ArmazenagemRepositoryInterface $armazenagemRepository) 
    {
                $this->repository = $repository;
                $this->documentoRepository = $documentoRepository;
                $this->materialRepository = $materialRepository;
                $this->tipoMovimentoRepository = $tipoMovimentoRepository;
                $this->contaRepository = $contaRepository;
                $this->naturezaRepository = $naturezaRepository;
                $this->armazemRepository = $armazemRepository;
                $this->armazenagemRepository = $armazenagemRepository;
                $this->model = 'entradas';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->repository->relationships('material','natureza','documento','tipoMovimento')->paginate();
        
        return view('admin.entradas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_movimentos = $this->tipoMovimentoRepository->selectEntradas();
        
        $documentos = $this->documentoRepository->selectDocumentos();
        
        $contas = $this->contaRepository->selectContas();
        
        $naturezas = $this->naturezaRepository->selectNaturezas();
        
        $armazens = $this->armazemRepository->selectArmazens();
        
        return view('admin.entradas.create', compact('tipo_movimentos','documentos','contas','naturezas','armazens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateEntradaFormRequest $request)
    {
        //estoque atual
        $estoque_atual = $this->materialRepository->findById($request->material_id);
        
        
        $user = auth()->user();
        
        
        if($request->preco):
            $request->preco = str_replace('.', '', $request->preco);
            $request->preco = str_replace(',', '.', $request->preco);
        else:
            $request->preco = '0.00';
        endif;
        
        
       //dd($request->all());
        
       //pega o id do material de acordo com a natureza
       $material_natureza_id = DB::table('material_natureza')
               ->where('material_id',$request->material_id)
               ->where('natureza_id',$request->natureza_id)
               ->first();
       
       
        DB::beginTransaction();
        
            $registraEntrada = DB::table('movimentos')->insert([
                "tipo_movimento_id" => $request->tipo_movimento_id,
                "documento_id"      => $request->documento_id,
                "numero_documento"  => $request->numero_documento,
                "data_documento"    => $request->data_documento,
                "conta_id"          => $request->conta_id,
                "material_id"       => $request->material_id,
                "natureza_id"       => $request->natureza_id,
                "armazenagem_id"    => $request->armazenagem_id,
                "quantidade"        => $request->quantidade,
                "preco"             => $request->preco,
                "user_id"           => $user->id,
                "created_at"        => Carbon::now(),
                
            ]);
            
            if($material_natureza_id):
            $registraDadosEstoque = DB::table('material_natureza')
                    ->where('id',$material_natureza_id->id)
                    ->update([
                        'material_id'   => $request->material_id,
                        'natureza_id'   => $request->natureza_id,
                        'preco_atual'   => $request->preco,
                        'estoque_atual' => $request->quantidade + $material_natureza_id->estoque_atual,
                        'created_at'    => Carbon::now(),
                    ]);
            else:
                $registraDadosEstoque = DB::table('material_natureza')
                    ->insert([
                        'material_id'   => $request->material_id,
                        'natureza_id'   => $request->natureza_id,
                        'preco_atual'   => $request->preco,
                        'estoque_atual' => $request->quantidade,
                        'created_at'    => Carbon::now(),
                    ]);
            endif;
            

//            $atualizaEstoque = DB::table('materiais')
//                    ->where('id',$request->material_id)
//                    ->update([
//                        'estoque_atual' => $request->quantidade + $estoque_atual->estoque_atual,
//                        'preco_atual'   => $request->preco,
//                    ]);
        
        if($registraEntrada && $registraDadosEstoque):
            DB::commit();
            
            return redirect()->route('entradas.index')
                    ->withSuccess('Entrada registrada com sucesso!');
        
        else:
            DB::rollBack();
            
            return redirect()->back()->withErrors('Falha ao registrar entrada!');
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
