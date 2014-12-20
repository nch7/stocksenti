<?php 

namespace project\gateways;

use project\repositories\TwitterRepository\TwitterRepositoryInterface;

class TwitterGateway {

	private $TwitterRepository;

	public function __construct(TwitterRepositoryInterface $TwitterRepository) {
		$this->TwitterRepository = $TwitterRepository;
	}

	public function getMessageAboutSymbol($symbol,$opts){
		extract($opts);
		
		$settings = array(
		    'consumer_key' => $consumer_key,
		    'consumer_secret' => $consumer_secret
		);

		$url = 'https://api.twitter.com/1.1/blocks/create.json';
		$requestMethod = 'GET';

		$getfield = '?q='.$symbol;

		$this->TwitterRepository->init($settings);
		return $this->TwitterRepository->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(true,$proxy);
	}


	public function setProxy($proxy){
		if(!empty($proxy)){
			$this->TwitterRepository->setProxy($proxy);
		}
 
		return $this;
	}

}