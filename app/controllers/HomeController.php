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

<<<<<<< HEAD
		$tweets = $this->gateway->search('apple');
=======
		$tweets = $this->gateway->getMessageAboutSymbol($stock);
>>>>>>> 679168d0b661e156874a51fc488bb67cbb2d95f0

		debug($tweets);

		return '</br>';

<<<<<<< HEAD
	}
	public function test(){
		return "Site is comming soon!";
=======
>>>>>>> 679168d0b661e156874a51fc488bb67cbb2d95f0
	}

}
