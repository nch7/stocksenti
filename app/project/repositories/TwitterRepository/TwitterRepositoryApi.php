<?php 

namespace project\repositories\TwitterRepository;

 
class TwitterRepositoryApi implements TwitterRepositoryInterface {

	public function __construct(){
		$this->client = new \Guzzle\Service\Client('https://api.twitter.com/1.1');

		$auth = new \Guzzle\Plugin\Oauth\OauthPlugin([
			'consumer_key' => "3nVuSoBZnx6U4vzUxf5w",
			'consumer_secret' => "Bcs59EFbbsdF6Sl9Ng71smgStWEGwXXKSjYvPVt7qys"
		]);

		$this->client->addSubscriber($auth);
	}

	public function search($q){

		$response = $this->client->get('search/tweets.json?q='.$q)->send();

		return $tweets = array_fetch($response->json()['statuses'],'text');
	}
}
