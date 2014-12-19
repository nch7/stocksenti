<?php namespace project\gateways;

use project\repositories\UserRepository\UserRepositoryInterface;

class UserGateway {

	private $UserRepository;

	public function __construct(UserRepositoryInterface $UserRepository) {
		$this->UserRepository = $UserRepository;
	}

	public function test(){
		return $this->UserRepository->test();
	}
}