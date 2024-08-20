<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades;
use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RedirectIfAuthenticated::redirectUsing(function() {
            return redirect()->route('dashboard.home.index');
        });

        Facades\View::composer('*', function (View $view) {

            $view->with('siteTitle', settings()->siteTitle ?? '');
            $view->with('siteFavicon', settings()->siteFavicon ?? 'uploads/logo.png');
            $view->with('siteLogo', settings()->siteLogo ?? 'uploads/logo.png');

        });

        Carbon::setLocale(app()->getLocale());

        Paginator::useBootstrapFive();

        if (app()->environment('production')) {
            Facades\URL::forceScheme('https');
            $this->app['request']->server->set('HTTPS', 'on');
        }
    }
}
