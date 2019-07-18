<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ContaRepositoryInterface;
use App\Repositories\Interfaces\NaturezaRepositoryInterface;
use App\Http\Requests\StoreUpdateContaFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ContaController extends Controller
{
    protected $repository;
    protected $naturezaRepository;

    public function __construct(ContaRepositoryInterface $repository, NaturezaRepositoryInterface $naturezaRepository) 
    {
        $this->repository = $repository;
        $this->naturezaRepository = $naturezaRepository;
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
        //recupera todas as naturezas de despesas disponíveis
        $data = $this->naturezaRepository->getAll();
        
        //chama a view create com o formulário para cadastro de uma nova conta
        return view('admin.contas.create', compact('data'));
    }

    /**
     * Armazena uma nova conta na tabela contas.
     *
     * @param  \App\Http\Requests\StoreUpdateContaFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateContaFormRequest $request)
    {
        //armazena os dados na tabela contas e recupera o id 
        $id = DB::table('contas')->insertGetId([
            'codigo'        => $request->codigo,
            'nome'          => $request->nome,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
        
        //recupera a conta recem inserida
        $conta = $this->repository->findById($id);
        
        //recupera os id das naturezas de despesas escolhidas pelo usuário
        $naturezas = $request->get('natureza_id');
        
        //sincroniza a conta com as naturezas escolhidadas pelo usuário
        $conta->naturezas()->sync($naturezas);
        
        //redireciona para a view index
        return redirect()->route('contas.index')->withSuccess('Cadastro realizado com sucesso!');
    }

    /**
     * Mostra os detalhes de uma conta específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //recupera uma conta pelo seu id e seus relacionamentos com a tabela naturezas
        $data = $this->repository->relationships('naturezas')->findById($id);
        
        //chama a view show passando os dados da conta recuperada 
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
        //recupera as naturezas associadas com a conta
        $naturezasAssociadas = DB::table('conta_natureza')
                ->addSelect('natureza_id')
                ->where('conta_id',$id);
        
        //recupera as naturezas disponíveis para assoiação
        $naturezasDisponiveis = DB::table('naturezas')
                ->addSelect(['id','codigo'])
                ->whereNotIn('id',$naturezasAssociadas)->get();
        
        //recupera as contas com as naturezas associadas
        $data = $this->repository->relationships('naturezas')->findById($id);
        
        //chama a view de edição passando os dados da conta e suas associações
        return view('admin.contas.edit', compact('data','naturezasDisponiveis'));
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
        //recupera os dados de uma conta específica pelo seu id
        $conta = $this->repository->findById($id);
        
        //recupera as naturezas selecionadas pelo usuário
        $naturezas = $request->natureza_id;
        
        //sincroniza a conta com as naturezas selecionadas pelo usuário
        $conta->naturezas()->sync($naturezas);

        //realiza a atualização de uma conta específica e redireciona para a view index 
        $this->repository->update($id, $request->all());
        
        //chama a view de listagem
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
        //deleta as vinculações da conta com suas naturezas da tabela conta_natureza
        $naturezas = DB::table('conta_natureza')
                ->where('conta_id',$id)
                ->delete();
        
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
