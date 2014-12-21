<?php

class UsersController extends \BaseController {

	public function index(){
		$this->layout->content = View::make('hello');
	}

	public function login()
	{
		$this->layout->content = View::make('users.login');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{

		$this->layout->content = View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
			$username = $input['username'];
			$password = Hash::make($input['password']);
			$errors = array();
			$user = DB::table('users')->where('username', $input['username'])->first();
			if (!empty($user)){
				$errors[]="This username has already been captivated, try another";
			}
			foreach ($input as $key => $value) {
				if ($value == ''){
					$errors[]=strtoupper($key) . ' is required';
				}
			}
			if ($input['password']!=$input['password_confirmation']){
				$errors[] = "Your password doesn't match confirmed password";
			}
			if (!empty($errors)){
				$my_errors = array(2 => $errors);
				Notification::error($my_errors);
				return Redirect::back();
			}else{
				DB::table('users')->insert(
				    array('username' => $username, 'password' => $password)
				);
				Notification::success('You have been successfully registered!');
				return Redirect::to('/');
			}

	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function attempt()
	{
		$input = Input::all();
			$errors = array();
			if (empty($input['username'])){
				$errors[] = "You must fill username field";
			}
			if (empty($input['password'])){
				$errors[] = "You must fill password field";
			}
			$attempt = Auth::attempt([
				'username' => $input['username'],
				'password' => $input['password']
				]);
			if ($attempt){
				Notification::success("Successfully logged in");
				$this->index();

			}else{
				$errors[] = "Your login attempt was failed due to wrong password or username";
				Notification::error($errors);
				return Redirect::back();
			}
		


	}


	public function edit($id)
	{
		//
	}


	public function update($id)
	{
		
	}


	public function destroy()
	{
		Auth::logout();
		Notification::success("You have been logged out Successfully!");
		return Redirect::to('/');
	}

}