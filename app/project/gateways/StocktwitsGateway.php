<?php namespace project\gateways;

use project\repositories\StocktwitsRepository\StocktwitsRepositoryInterface;

class StocktwitsGateway {

	private $StocktwitsRepository;

	public function __construct(StocktwitsRepositoryInterface $StocktwitsRepository) {
		$this->StocktwitsRepository = $StocktwitsRepository;
	}

	public function getMessageAboutSymbol($symbol){
		return $this->StocktwitsRepository->getMessageAboutSymbol($symbol);
	}
}