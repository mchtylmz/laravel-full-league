<?php

namespace App\Providers;

use App\Enums\RoleTypeEnum;
use App\Policies\Backend\Settings\SettingPolicy;
use Carbon\Carbon;
use Couchbase\Role;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use Pharaonic\Laravel\Settings\Models\Settings;

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
        RedirectIfAuthenticated::redirectUsing(fn() => route('admin.home.index'));

        if (app()->environment('production')) {
            Facades\URL::forceScheme('https');
            request()->server->set('HTTPS', 'on');
        }

        setlocale(LC_TIME, app()->getLocale().'.utf8');
        Carbon::setLocale(app()->getLocale());

        Paginator::useBootstrapFive();

        $this->viewComposer();

        $this->registerMacros();
    }

    public function viewComposer(): void
    {
        Facades\View::composer('*', function (View $view) {
            $view->with('siteFavicon', settings()->siteFavicon ?? 'uploads/logo.png');
            $view->with('siteLogo', settings()->siteLogo ?? 'uploads/logo.webp');
            $view->with('siteLogoWhite', settings()->siteLogoWhite ?? 'uploads/logo_white.png');
            $view->with('siteTitle', settings()->siteTitle ?? '');
            $view->with('siteDescription', settings()->siteDescription ?? '');
            $view->with('siteKeywords', settings()->siteKeywords ?? '');
        });
    }

    public function registerMacros(): void
    {

    }
}
