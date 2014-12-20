<?php 

namespace project\gateways;

use project\repositories\TwitterRepository\TwitterRepositoryInterface;

class TwitterGateway {

	private $TwitterRepository;

	public function __construct(TwitterRepositoryInterface $TwitterRepository) {
		$this->TwitterRepository = $TwitterRepository;
	}

	public function getMessageAboutSymbol($symbol,$since_id = false){
		$args = [
			'q'=>$symbol,
			'include_entities'=>false,
		];

		if($since_id!=false){
			$args['since_id'] = $since_id;
		}

		return $this->TwitterRepository->search($args);	
	}


	 public function init($args){
	 	extract($args);
	 	return $this->TwitterRepository->init($consumer_key,$consumer_secret,$proxy);
	 }

}