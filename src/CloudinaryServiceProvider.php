<?php

namespace ServiceMap\Cloudinary;

use Cloudinary;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;
use Illuminate\Support\ServiceProvider;

class CloudinaryServiceProvider extends ServiceProvider
{
  /**
   * Boot the service provider.
   *
   * @return void
   */
  public function boot()
  {
    $this->setupConfig();
  }

  /**
   * Setup the config.
   *
   * @return void
   */
  protected function setupConfig()
  {
    $source = realpath(__DIR__.'/../config/cloudinary.php');

    if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
      $this->publishes([$source => config_path('cloudinary.php')]);
    } elseif ($this->app instanceof LumenApplication) {
      $this->app->configure('cloudinary');
    }

    $this->mergeConfigFrom($source, 'cloudinary');
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->registerFactory();
    $this->registerManager();
    $this->registerBindings();
  }

  /**
   * Register the factory class.
   *
   * @return void
   */
  protected function registerFactory()
  {
    $this->app->singleton('cloudinary.factory', function () {
      return new CloudinaryFactory();
    });

    $this->app->alias('cloudinary.factory', CloudinaryFactory::class);
  }

  /**
   * Register the manager class.
   *
   * @return void
   */
  protected function registerManager()
  {
    $this->app->singleton('cloudinary', function (Container $app) {
      $config = $app['config'];
      $factory = $app['cloudinary.factory'];

      return new CloudinaryManager($config, $factory);
    });

    $this->app->alias('cloudinary', CloudinaryManager::class);
  }

  /**
   * Register the bindings.
   *
   * @return void
   */
  protected function registerBindings()
  {
    $this->app->bind('cloudinary.connection', function (Container $app) {
      $manager = $app['cloudinary'];

      return $manager->connection();
    });

    $this->app->alias('cloudinary.connection', Client::class);
  }

  /**
   * Get the services provided by the provider.
   *
   * @return string[]
   */
  public function provides()
  {
    return [
      'cloudinary',
      'cloudinary.factory',
      'cloudinary.connection',
    ];
  }
}
