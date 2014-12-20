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
	protected $name = 'fetch:twitter';

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

		$company = DB::table('companies')->where('id',$company_id)->first(); 
		DB::table('active_companys')->where('company_id',$company_id)->update(['status'=>1]);

		$twitter_keys = DB::table('twitter_tokens')->orderBy('last_action')->first();
		DB::table('twitter_tokens')->where('id',$twitter_keys->id)->update(array('last_action'=>time()));

		$twitter = App::make('\project\gateways\TwitterGateway');
		$twitter->setProxy($twitter_keys->proxy)->auth($twitter_keys->consumer_key,$twitter_keys->consumer_secret);


		if(!$company){
			echo 'Company search failed'; 
		}

		$tweets = $twitter->getMessageAboutSymbol($company->symbol);

		if(!$tweets){
			echo 'Twitter search failed';
		}

		$data = array();

		$sentiment = App::make('\PHPInsight\Sentiment');
		$time = time();
		
		foreach ($tweets as $key => $tweet) {
			$scores_arr = $sentiment->score($tweet);
			$category = $sentiment->categorise($tweet);
			$curScore = $scores_arr[$category];
			
			if($curScore >=0 && $curScore<=66){
				$score = 0+$curScore*66;
			} elseif ($curScore >=67 && $curScore<=133){
				$score = 67+$curScore*66;
			} elseif ($curScore >=134 && $curScore<=200){
				$score = 134+$curScore*66;
			} else{
				$score = false;
			}

			if($score){
				$data[] = ['score'=>$score,'company_id'=>$company_id,'time'=>$time];
			}
		}

		DB::table('active_companys')->where('company_id',$company_id)->update(['status'=>0]);

		DB::table('company_scores')->insert($data);
		echo sprintf('Inserted %d rows',count($data));
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
