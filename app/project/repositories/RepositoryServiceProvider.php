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
		$this->app->bind('project\repositories\TwitterRepository\TwitterRepositoryInterface', 'project\repositories\TwitterRepository\TwitterRepositoryApi');
		$this->app->bind('project\repositories\StocktwitsRepository\StocktwitsRepositoryInterface', 'project\repositories\StocktwitsRepository\StocktwitsRepositoryApi');
		$this->app->bind('project\repositories\CompanyRepository\CompanyRepositoryInterface', 'project\repositories\CompanyRepository\CompanyRepositoryDb');

	}
} 