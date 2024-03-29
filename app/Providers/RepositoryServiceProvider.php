<?php

namespace App\Providers;

use App\Repositories\Core\Eloquent\EloquentUnidadeRepository;
use App\Repositories\Core\Eloquent\EloquentNaturezaRepository;
use App\Repositories\Core\Eloquent\EloquentEquipamentoRepository;
use App\Repositories\Core\Eloquent\EloquentContaRepository;
use App\Repositories\Core\Eloquent\EloquentArmazemRepository;
use App\Repositories\Core\Eloquent\EloquentArmazenagemRepository;
use App\Repositories\Core\Eloquent\EloquentMaterialRepository;
use App\Repositories\Core\Eloquent\EloquentDocumentoRepository;
use App\Repositories\Core\Eloquent\EloquentFornecedorRepository;
use App\Repositories\Core\Eloquent\EloquentMovimentoRepository;
use App\Repositories\Core\Eloquent\EloquentTipoMovimentoRepository;
use App\Repositories\Core\Eloquent\EloquentEntradaRepository;
use App\Repositories\Core\Eloquent\EloquentPapelRepository;
use App\Repositories\Core\Eloquent\EloquentPermissaoRepository;
use App\Repositories\Core\Eloquent\EloquentUserRepository;
use App\Repositories\Core\Eloquent\EloquentPapelUserRepository;
use App\Repositories\Core\Eloquent\EloquentPapelPermissaoRepository;
use App\Repositories\Core\Eloquent\EloquentLocalRepository;

use App\Repositories\Interfaces\UnidadeRepositoryInterface;
use App\Repositories\Interfaces\NaturezaRepositoryInterface;
use App\Repositories\Interfaces\EquipamentoRepositoryInterface;
use App\Repositories\Interfaces\ContaRepositoryInterface;
use App\Repositories\Interfaces\ArmazemRepositoryInterface;
use App\Repositories\Interfaces\ArmazenagemRepositoryInterface;
use App\Repositories\Interfaces\MaterialRepositoryInterface;
use App\Repositories\Interfaces\DocumentoRepositoryInterface;
use App\Repositories\Interfaces\FornecedorRepositoryInterface;
use App\Repositories\Interfaces\MovimentoRepositoryInterface;
use App\Repositories\Interfaces\TipoMovimentoRepositoryInterface;
use App\Repositories\Interfaces\EntradaRepositoryInterface;
use App\Repositories\Interfaces\PapelRepositoryInterface;
use App\Repositories\Interfaces\PermissaoRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\PapelUserRepositoryInterface;
use App\Repositories\Interfaces\PapelPermissaoRepositoryInterface;
use App\Repositories\Interfaces\LocalRepositoryInterface;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UnidadeRepositoryInterface::class, EloquentUnidadeRepository::class);
        $this->app->bind(NaturezaRepositoryInterface::class, EloquentNaturezaRepository::class);
        $this->app->bind(EquipamentoRepositoryInterface::class, EloquentEquipamentoRepository::class);
        $this->app->bind(ContaRepositoryInterface::class, EloquentContaRepository::class);
        $this->app->bind(ArmazemRepositoryInterface::class, EloquentArmazemRepository::class);
        $this->app->bind(ArmazenagemRepositoryInterface::class, EloquentArmazenagemRepository::class);
        $this->app->bind(MaterialRepositoryInterface::class, EloquentMAterialRepository::class);
        $this->app->bind(DocumentoRepositoryInterface::class, EloquentDocumentoRepository::class);
        $this->app->bind(FornecedorRepositoryInterface::class, EloquentFornecedorRepository::class);
        $this->app->bind(MovimentoRepositoryInterface::class, EloquentMovimentoRepository::class);
        $this->app->bind(TipoMovimentoRepositoryInterface::class, EloquentTipoMovimentoRepository::class);
        $this->app->bind(EntradaRepositoryInterface::class, EloquentEntradaRepository::class);
        $this->app->bind(PapelRepositoryInterface::class, EloquentPapelRepository::class);
        $this->app->bind(PermissaoRepositoryInterface::class, EloquentPermissaoRepository::class);
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->bind(PapelUserRepositoryInterface::class, EloquentPapelUserRepository::class);
        $this->app->bind(PapelPermissaoRepositoryInterface::class, EloquentPapelPermissaoRepository::class);
        $this->app->bind(LocalRepositoryInterface::class, EloquentLocalRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
