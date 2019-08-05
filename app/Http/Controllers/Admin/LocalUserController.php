<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\LocalRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Requests\StoreUpdateLocalUserFormRequest;
use Illuminate\Support\Facades\DB;

class LocalUserController extends Controller
{
    protected $userRepository, $localRepository;
    
    public function __construct(UserRepositoryInterface $userRepository, LocalRepositoryInterface $localRepository) 
    {
        $this->userRepository = $userRepository;
        $this->localRepository = $localRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->userRepository->relationships('local','papeis')->paginate();
        
        return view('admin.alocacoes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //revupera todos os usuários cadastrados
        $usuarios = $this->userRepository->getSelect('name','id');
        
        //recupera todas as localizações
        $locais = $this->localRepository->getSelect('sigla','id');
        
        return view('admin.alocacoes.create', compact('usuarios','locais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateLocalUserFormRequest $request)
    {
        $id = $request->usuario_id;
        
        return $this->update($request, $id);
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
    public function update(StoreUpdateLocalUserFormRequest $request, $id)
    {
        DB::table('users')->where('id',$id)->update(['local_id' => $request->local_id]);

        //atualia os dados de um registro específico
        //$update = $this->userRepository->update($id, $request->all());
        
        
        
        //redireciona para a view index
        return redirect()->route('alocacoes.index')
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
}
