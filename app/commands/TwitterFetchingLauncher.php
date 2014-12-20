<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class TwitterFetchingLauncher extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'twitter:launcher';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

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
		$threads = $this->argument('threads');
		$companies = DB::table('active_companys')->orderBy('last_action')->where('status','0')->limit($threads)->get();

		if(count($companies)<=0){
			die("No companies!\r\n");
		}
		$affectedIds = array_fetch($companies,'id');
		DB::table('active_companys')->whereIn('id',$affectedIds)->update(array('status'=>'1'));

		$delay = intval(1000000/$threads);

		foreach ($companies as $key => $company) {
			echo 'Thread Number '.$key.":\n";
			echo 'running command "php artisan twitter:fetcher '.$company->company_id.'"'."\n";
			exec('php artisan twitter:fetcher '.$company->company_id.' > /dev/null &')."\n\n\n"; 
			usleep($delay);

		}

		DB::table('active_companys')->whereIn('id',$affectedIds)->update(array('status'=>'0'));
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
			array('threads', InputArgument::REQUIRED, 'Number of threads'),
		);
	}


}
