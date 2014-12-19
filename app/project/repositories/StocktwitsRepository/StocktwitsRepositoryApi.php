<?php 

namespace project\repositories\StocktwitsRepository;


//	In order to get the client_id we need to manually go to this url (set consumer key)
//  https://api.stocktwits.com/api/2/oauth/authorize?client_id={CONSUMER_KEY}&response_type=code&redirect_uri=http://www.stocktwits.com&scope=search
//  and authenticate an user into our Stocktwit app

class StocktwitsRepositoryApi implements StocktwitsRepositoryInterface {

	public function __construct(){
		$this->client = new \Guzzle\Service\Client('https://api.stocktwits.com/api/2');
		$this->client_id = '334c5301dbd603f4a6bf4e31d67cb84d621bed4f';
	}

	public function getMessageAboutSymbol($symbol){
		$response = $this->client->get(sprintf('streams/symbol/%s.json?client_id=%s',$symbol,$this->client_id),[],['exceptions' => false])->send(); 
		
		if($response->getStatusCode()=='200'){
			return $response->json()['messages'];
		} else {
			debug($response->getStatusCode());
			debug($response->getBody()); 
			return false;
		}
	}
}
