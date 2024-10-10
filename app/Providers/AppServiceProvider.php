<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\AliasHelper;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models;
class AppServiceProvider extends ServiceProvider {
    public function register(): void {
        //
    }

    public function boot(): void {
        Paginator::useBootstrap();
    /*$config = $this->app['config'];
        $modelAliases = AliasHelper::generateModelAliases();
        $allAliases = array_merge(
            $config->get('app.aliases', []),
            $modelAliases
        );
        dd($allAliases);
        $config->set('app.aliases', $allAliases);*/
        $activeAcademics = Models\Academic::whereStatus('active')->get();
        View::share('activeAcademics', $activeAcademics);

    }
}
