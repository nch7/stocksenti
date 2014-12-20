<?php 

namespace project\gateways;

use project\repositories\TwitterRepository\TwitterRepositoryInterface;

class TwitterGateway {

	private $TwitterRepository;

	public function __construct(TwitterRepositoryInterface $TwitterRepository) {
		$this->TwitterRepository = $TwitterRepository;
	}

	public function getMessageAboutSymbol($symbol){
		$this->TwitterRepository->search($symbol);	
	}


	public function setProxy($proxy){
		if(!empty($proxy)){
			$this->TwitterRepository->setProxy($proxy);
		}
 
		return $this;
	}

}