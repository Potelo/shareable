<?php namespace RyanNielson\Shareable;

use Illuminate\Support\ServiceProvider;

class ShareableServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $viewPath = __DIR__.'/../../views';
        $configPath = __DIR__ . '/../../config/config.php';

        $this->loadViewsFrom($viewPath, 'shareable');
        $this->publishes([$configPath => config_path('shareable.php')], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('shareable', function($app) {
            return new Shareable($app['view']);
        });
    }
}
