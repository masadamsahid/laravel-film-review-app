<?php

namespace App\Providers;

use App\View\Components\FilmCard;
use App\View\Components\ReviewForm;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        //
        Blade::component('film-card', FilmCard::class);
    }
}
