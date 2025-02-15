<?php

declare(strict_types=1);

namespace App\Feature\Post\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class PostViewServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 */
	public function register(): void
	{
		//
	}

	/**
	 * Bootstrap services.
	 */
	public function boot(): void
	{
		View::addLocation(base_path('app/Feature/Post/Resources/views'));
	}
}
