<?php 
namespace project\repositories\TwitterRepository;

date_default_timezone_set('Europe/London');

use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
 
class TwitterRepositoryApi implements TwitterRepositoryInterface {

    public function search($company){
    //$client = new \Guzzle\Service\Client('https://api.twitter.com/1.1');
    

    $client = new \Guzzle\Service\Client('http://api.twitter.com/1.1', array(
        'request.options' => array(
            // This should be the port you've configured Charles to listen for.
            'proxy'   => '173.234.57.14:3128',
        )
    ));
    $auth = new \Guzzle\Plugin\Oauth\OauthPlugin([
        'consumer_key' => '3nVuSoBZnx6U4vzUxf5w',
        'consumer_secret' => 'Bcs59EFbbsdF6Sl9Ng71smgStWEGwXXKSjYvPVt7qys',

        ]);
    


    $client->addSubscriber($auth);
    $response = $client->get("search/tweets.json?q=".$company)->send();

    dd($response->json());
    

    }

}
