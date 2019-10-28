<?php 

namespace Thinkcreative\Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
	/**
     * Bootstrap the application services.
     *
     * @return void
     */
	public function boot() 
	{
		
		$this->publishes([
			__DIR__ . '/../../config/blog.php' => config_path('blog.php')
		]);

		// Register any CSS
		// $this->publishes([
		// 	__DIR__.'/../../resources/css' => public_path('vendor/packagename')
		// ], 'public');

		//  Register and JS. 
		// $this->publishes([
		// 	__DIR__.'/resources/js' => public_path('vendor/packagename')
		// ], 'public');

		//  Register any images
		// $this->publishes([
		// 	__DIR__.'/resources/images' => public_path('vendor/packagename')
		// ], 'public');


		$this->loadRoutesFrom(__DIR__ . '/../../routes/routes.php');

		$this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

		$this->loadViewsFrom(__DIR__.'/../../resources/views/front', 'blog');

		$this->loadViewsFrom(__DIR__.'/../../resources/views/back', 'admin-blog');

		$this->publishes([
            __DIR__ . '/../../resources/views' => base_path('resources/views/vendor/blog')
        ]);

		// Register any commands for use in the CLI
		// Uncomment for use.
		
		// if($this->app->runningInConsole())
		// {
		// 	$this->commands([
		// 		FooCommand::class,
		// 		BarCommand::class
		// 	]);
		// }

	}

	/**
     * Register the application services.
     *
     * @return void
     */
	public function register()
	{
		$this->app->singleton(Blog::class, function() {
			return new Blog();
		});

		$this->app->alias(Blog::class, 'blog');
	}

}