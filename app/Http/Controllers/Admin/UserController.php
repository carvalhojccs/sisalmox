<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\PapelRepositoryInterface;
use App\Http\Requests\StoreUpdateUserFormRequest;

class UserController extends Controller
{
    protected $repository, $papelRepository, $model;
    
    public function __construct(
            UserRepositoryInterface $repository, 
            PapelRepositoryInterface $papelRepository,
            Request $request) 
    {
        $this->repository = $repository;
        $this->papelRepository = $papelRepository;
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
        $data = $this->repository->relationships('local')->paginate();
        
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
        //recupera todos os papeis
        $papeis = $this->papelRepository->getAll();
        
        //chama a view create com o formulário para cadastro
        return view('admin.'.$this->model.'.create', compact('papeis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUserFormRequest $request)
    {
        $this->repository->storeUser($request);
        
        return redirect()->route($this->model.'.index')->withSuccess('Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->repository->relationships('papeis')->findById($id);
        
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
        //recupera os papeis que ainda não foram associados
        $papeis = $this->repository->getPapeisDisponiveis($id);
        
        //recupera o usuário com os papeis associados
        if(!$data = $this->repository->relationships('papeis')->findById($id)):
            return redirect()->back();
        else:
            return view('admin.'.$this->model.'.edit', compact('data','papeis'));
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        //recupera os papeis selecionados
        $papeis = $request->papeis;
        
        $user = $this->repository->findById($id);
        
        //persiste e associa o usuário aos papeis selecionados
        $user->papeis()->sync($papeis);
        
        $data = $request->all();
        
        if($request->password):
            $data['password'] = bcrypt($data['password']);
        else:
            unset($data['password']);
        endif;
        
        $this->repository->update($id, $data);
        
        //redireciona para a view index
        return redirect()->route($this->model.'.index')->withSuccess('Atualização realizada com sucesso!');
        
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
