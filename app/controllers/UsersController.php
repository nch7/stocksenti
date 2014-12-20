<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		
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
			$errors[]="This username already exists, try another dude";
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
			Notification::error($errors);
			return Redirect::back();
		}else{
			DB::table('users')->insert(
			    array('username' => $username, 'password' => $password)
			);
			Notification::success('You have been successfully registered!');
			return Redirect::to('signin');
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

		$attempt = Auth::attempt([
			'username' => $input['username'],
			'password' => $input['password']
			]);
		if ($attempt){
			Notification::success("Successfully logged in");
			return Redirect::back();

		}
		Notification::error("Your login attempt was failed due to wrong password or username");
		return Redirect::back();


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
		return Redirect::home();
	}

}