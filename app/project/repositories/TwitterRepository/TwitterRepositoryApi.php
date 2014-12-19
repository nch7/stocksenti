<?php 

namespace project\repositories\TwitterRepository;

 
class TwitterRepositoryApi implements TwitterRepositoryInterface {
	private $config = [];
	public function __construct(){
		$this->client = new \Guzzle\Service\Client(['base_url'=>'http://stocksenti.com/test/save.php','defaults'=>['proxy'=>'tcp://173.234.227.19:3128']]);
	}

	public function auth($consumer_key,$consumer_secret){
		
		$auth = new \Guzzle\Plugin\Oauth\OauthPlugin([
			'consumer_key' => $consumer_key,
			'consumer_secret' => $consumer_secret
		]);

		return $this->client->addSubscriber($auth);
	}

	public function setProxy($proxy){
		return $this->config[CURLOPT_PROXY]=$proxy; 
	}

	public function getMessageAboutSymbol($symbol){

		$params = [
			'config' => [
				'curl' => $this->config,
			],
		];
		$response = $this->client->get('search/tweets.json?q='.$symbol,['proxy' => '173.234.227.19:3128'])->send();
		die('DIED!!!');

		if($response->getStatusCode()=='200'){
			// debug($response->json());
			// return array_fetch($response->json()['statuses'],'text');
			return $response->json();
		} else { 
			// debug($response->getStatusCode());
			// debug($response->getBody()); 
			return false;
		}
	}
}
