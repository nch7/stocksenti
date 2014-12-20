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

		$tweet = 'zswe :)';
		$scores_arr = $sentiment->score($tweet);
		$category = $sentiment->categorise($tweet);
		$curScore = $scores_arr[$category];
		
		if($category=='neg'){
			$score = 0+$curScore*66;
		} elseif ($category=='neu'){
			$score = 67+$curScore*66;
		} elseif ($category=='pos'){
			$score = 134+$curScore*66;
		} else{
			$score = false;
		}

		var_dump($scores_arr);
		echo "</br>".$category.'</br>'.$score;
		return '</br>';


	}

	public function test(){
		return View::make('hello');
	}

}
