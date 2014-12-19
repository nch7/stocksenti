<?php


class UserController extends BaseController {

	protected $layout='layouts.master';
	public function index()
	{
		$this->layout->content = View::make('User.index');
	}
	public function test(){
		return "Site is comming soon!";
	}

}
