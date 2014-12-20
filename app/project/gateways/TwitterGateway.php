<?php 

namespace project\gateways;

use project\repositories\TwitterRepository\TwitterRepositoryInterface;

class TwitterGateway {

	private $TwitterRepository;

	public function __construct(TwitterRepositoryInterface $TwitterRepository) {
		$this->TwitterRepository = $TwitterRepository;
	}

	public function getMessageAboutSymbol($symbol){
		return $this->TwitterRepository->getMessageAboutSymbol($symbol);
	}

	public function auth($consumer_key,$consumer_secret){
		$this->TwitterRepository->auth($consumer_key,$consumer_secret);
		return $this;
	}

	public function setProxy($proxy){
		if(!empty($proxy)){
			$this->TwitterRepository->setProxy($proxy);
		}
 
		return $this;
	}
}