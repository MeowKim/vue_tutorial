<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
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
        // Get all the web routes
        View::composer('*', function ($view) {
            $routes = array();

            $collection = collect(Route::getRoutes())
                ->reject(function ($route) {
                    return preg_match("/^\_ignition\//", $route->uri)
                        || preg_match("/^api\//", $route->uri)
                        || preg_match("/^\/$/", $route->uri);
                })
                ->map(function ($route) {
                    return [
                        'domain' => $route->domain(),
                        'method' => implode('|', $route->methods()),
                        'uri'    => $route->uri(),
                        'name'   => $route->getName(),
                        'action' => ltrim($route->getActionName(), '\\'),
                        'middleware' => collect($route->gatherMiddleware())
                            ->map(function ($middleware) {
                                return $middleware instanceof Closure ? 'Closure' : $middleware;
                            })->implode(','),
                    ];
                });
            foreach ($collection as $item) {
                preg_match('/^(.*?)\/.*$/', $item['uri'], $matches);
                $routes[preg_replace('/\//', '', $matches[1])][] = $item;
            }

            $view->with('routes', $routes);
        });
        //
    }
}
