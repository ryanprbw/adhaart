<?php

namespace App\Providers;

use App\Models\Gallery;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $galleries = Gallery::latest()->filter(request(['search', 'category', 'author']))->paginate(12)->withQueryString();

        view()->share('galleries', $galleries);
    }
}
