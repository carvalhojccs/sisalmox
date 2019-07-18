<?php

namespace App\Providers;

use App\Repositories\Core\Eloquent\EloquentUnidadeRepository;
use App\Repositories\Core\Eloquent\EloquentNaturezaRepository;
use App\Repositories\Core\Eloquent\EloquentEquipamentoRepository;
use App\Repositories\Core\Eloquent\EloquentContaRepository;
use App\Repositories\Interfaces\UnidadeRepositoryInterface;
use App\Repositories\Interfaces\NaturezaRepositoryInterface;
use App\Repositories\Interfaces\EquipamentoRepositoryInterface;
use App\Repositories\Interfaces\ContaRepositoryInterface;
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
