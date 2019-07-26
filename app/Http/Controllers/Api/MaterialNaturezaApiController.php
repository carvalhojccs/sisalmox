<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MaterialNaturezaApiController extends Controller
{
    public function getEstoqueAtual(Request $request) 
    {
        $estoque_atual = DB::table('material_natureza')
                ->where('material_id',$request->material_id)
                ->where('natureza_id',$request->natureza_id)
                ->sum('estoque_atual');
        
        return response()->json($estoque_atual,200);
    }
}
