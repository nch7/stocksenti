<?php namespace project\gateways;

use project\repositories\CompanyRepository\CompanyRepositoryInterface;

class CompanyGateway {

	private $CompanyRepository;

	public function __construct(CompanyRepositoryInterface $CompanyRepository) {
		$this->CompanyRepository = $CompanyRepository;
	}

	public function getById($id){
		return $this->CompanyRepository->getById($id);
	}
}