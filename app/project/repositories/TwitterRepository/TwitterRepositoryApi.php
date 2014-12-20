<?php 
namespace project\repositories\TwitterRepository;

date_default_timezone_set('Europe/London');

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
 
class TwitterRepositoryApi implements TwitterRepositoryInterface {
    private $client;

    public function init($consumer_key,$consumer_secret,$proxy){


        $this->client = new \Guzzle\Service\Client('http://api.twitter.com/1.1', array(
            'request.options' => array(
                'proxy'   => $proxy,
            )
        ));

        $auth = new \Guzzle\Plugin\Oauth\OauthPlugin([
            'consumer_key' => $consumer_key,
            'consumer_secret' => $consumer_secret,

        ]);
        
        $this->client->addSubscriber($auth);

    }
    public function search($args){ 
        try{
            var_dump("search/tweets.json?".urlencode(http_build_query($args)));
            $response = $this->client->get("search/tweets.json?".http_build_query($args))->send()->json();
            // $response = $this->client->get("search/tweets.json?q=freebandnames&since_id=24012619984051000")->send()->json();
            //=%23freebandnames&since_id=24012619984051000

            return $response; 
        } catch(Exception $e){
            echo $e->getMessage();

            return false;
        }

    

    }

}
