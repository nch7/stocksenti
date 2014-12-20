<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;


class SyncActiveCompaniesCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'sync-active-companies';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Sync active companies';

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
		DB::statement(sprintf("DELETE FROM `active_companys` where `company_id` NOT IN (select company_id from `company_user` group by company_id)"));
		
		$companies = DB::table('company_user')->select('company_id')->groupBy('company_id')->get();
		$companies = array_fetch($companies,'company_id');
		
		$data = $companies;
		$data = "('".implode("'),('",$data)."')"; 

		DB::statement(sprintf("INSERT INTO `active_companys` (`company_id`) VALUES %s ON DUPLICATE KEY UPDATE `id`=`id`",$data));

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}


}
