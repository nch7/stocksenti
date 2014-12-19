<?php 

namespace project\repositories;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	
	public function register() {
		$this->app->bind('project\repositories\UserRepository\UserRepositoryInterface', 'project\repositories\UserRepository\UserRepositoryDb');

	}
}