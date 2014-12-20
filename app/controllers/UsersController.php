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
		var_dump("expression");
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function login()
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