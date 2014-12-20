<?php

// use project\gateways;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;



class FetchTwitterCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'twitter:fetcher';

	/** 
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Fetch Twitter';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$company_id = $this->argument('company_id');

		$company = DB::table('companies')->where('companies.id',$company_id)->leftJoin('last_fetched_tweet','last_fetched_tweet.company_id','=','companies.id')->first(); 
		DB::table('active_companys')->where('company_id',$company_id)->update(['status'=>1]);

		$twitter_keys = DB::table('twitter_tokens')->orderBy('last_action')->first();
		echo 'Using keys with ID: '.$twitter_keys->id."\r\n";
		DB::table('twitter_tokens')->where('id',$twitter_keys->id)->update(array('last_action'=>time()));

		$twitter = App::make('\project\gateways\TwitterGateway');

		if(!$company){
			echo 'Company search failed'; 
		}
		echo 'Since_id parameter: "'.$company->tweet_id."\"\r\n";
		echo 'Search term: "'.$company->symbol.'"'."\r\n";
		$twitter->init((array)$twitter_keys); 
		$tweets = $twitter->getMessageAboutSymbol($company->symbol,$company->tweet_id);
		
		if($tweets===false OR !is_array($tweets) OR !isset($tweets['statuses']) OR !is_array($tweets['statuses']) OR count($tweets['statuses'])<=0){
			echo 'No tweets were found!'."\r\n";
		} else {


			$data = array(); 
			$sentiment = App::make('\PHPInsight\Sentiment');
			$time = time();
			
			$maxTweetId = $tweets['statuses'][0]['id'];
			foreach ($tweets['statuses'] as $key => $tweet) {
				$scores_arr = $sentiment->score($tweet['text']);
				$category = $sentiment->categorise($tweet['text']);
				$curScore = $scores_arr[$category]; 

				
				if($category=='neg'){
					$score = 0+$curScore*66;
				} elseif ($category=='neu'){
					$score = 67+$curScore*66;
				} elseif ($category=='pos'){
					$score = 134+$curScore*66;
				} else{
					$score = false;
				}

				if($score){
					echo $tweet['id']."\r\n";
					$data[] = ['score'=>$score,'company_id'=>$company_id,'time'=>$time];
				}
			}

			DB::table('company_scores')->insert($data);
			echo sprintf('Inserted %d rows'."\r\n",count($data));
			DB::statement('INSERT INTO `last_fetched_tweet` (`company_id`,`tweet_id`) VALUES ("'.$company_id.'","'.$maxTweetId.'") ON DUPLICATE KEY UPDATE `tweet_id`="'.$maxTweetId.'"');
		}

		DB::table('active_companys')->where('company_id',$company_id)->update(['status'=>0,'last_action'=>time()]);
		
		
		$queries = DB::getQueryLog();
		echo "\r\n\r\n\r\n\r\n\r\n";
		foreach ($queries as $key => $query) {
		 	echo $query['query']."\r\n";
		 	echo implode('  ',$query['bindings'])."\r\n\r\n";

		 } 

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('company_id', InputArgument::REQUIRED, 'Company ID'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */


}
