<?php
namespace Think201\Echoza;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

class EchozaServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {

		$this->setupConfig($this->app);
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {

		$this->app->singleton(Echoza::class, function () {
			return new Classes\Echoza();
		});

		$this->app->alias(Classes\Echoza::class, 'echoza');
	}

	protected function setupConfig(Container $app) {

		$source = realpath($raw = __DIR__ . '/../config/echoza.php') ?: $raw;

		$this->publishes([$source => config_path('echoza.php')]);

		$this->mergeConfigFrom($source, 'echoza');
	}
}