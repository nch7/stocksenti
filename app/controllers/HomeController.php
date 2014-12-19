<?php

use project\gateways\StocktwitsGateway;

class HomeController extends BaseController {

	public function __construct(StocktwitsGateway $gateway){
		$this->gateway = $gateway;
	}

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index($stock)
	{

		$tweets = $this->gateway->getMessageAboutSymbol($stock);

		debug($tweets);

		return '</br>';

	}

}
