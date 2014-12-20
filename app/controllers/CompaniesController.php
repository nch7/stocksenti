<?php

class CompaniesController extends \BaseController {
	public function __construct(){
		if(!Auth::check()){
			return Route::to('/');
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /companies
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = User::with('companys')->find(Auth::id());
		$this->layout->companys = $user->companys;
		$this->layout->content = View::make('hello')->with('companys',$user->companys);
	}	


	/**
	 * Show the form for creating a new resource.
	 * GET /companies/create
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /companies
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /companies/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$scores = DB::table('company_scores')->where('company_id',$id)->get();
		return View::make('companies.show')->with('scores',$scores);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /companies/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /companies/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /companies/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}