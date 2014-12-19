<?php namespace project\gateways;

use project\repositories\TwitterRepository\TwitterRepositoryInterface;

class TwitterGateway {

	private $TwitterRepository;

	public function __construct(TwitterRepositoryInterface $TwitterRepository) {
		$this->TwitterRepository = $TwitterRepository;
	}

	public function search($q){
		return $this->TwitterRepository->search($q);
	}
}