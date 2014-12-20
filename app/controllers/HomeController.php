<?php

use project\gateways\TwitterGateway;
use project\gateways\CompanyGateway;
class HomeController extends BaseController {

	public function __construct(TwitterGateway $TwitterGateway,CompanyGateway $CompanyGateway)
	{
		
		$this->TwitterGateway = $TwitterGateway;
		$this->CompanyGateway = $CompanyGateway;
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
		$sentiment = new \PHPInsight\Sentiment();
		$tweets = $this->TwitterGateway->getMessageAboutSymbol($stock);
		$tweets;
		$results = [];
		foreach ($tweets as $tweet){
			$results[] = [
				'scores'=>$sentiment->score($tweet),
				'category' => $sentiment->categorise($tweet),
				'text'=>$tweet,
			];
		}
		echo '<pre>';
		print_r($results);
		return '</br>';


	}

	public function test(){
		
	}

}
