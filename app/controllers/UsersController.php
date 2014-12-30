<?php

use Illuminate\Routing\Controller;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		return Redirect::to('/profile');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /create
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::only(['first_name','last_name','email','password','password_confirmation']);

		$validator = Validator::make(
			$data,
			[
				'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email',
				'password' => 'required|min:8|confirmed',
				'password_confirmation'=> 'required|min:8'
			]
		);

		if($validator->fails()){
			return Redirect::route('user.create')->withErrors($validator)->withInput();
		}
		
		$data['password'] = Hash::make($data['password']);
		$newUser = User::create($data);
		if($newUser){
			Auth::login($newUser);
			return Redirect::route('profile');
		}

		return Redirect::route('user.create')->withInput();
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
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
	 * PUT /users/{id}
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
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Login screen.
	 * GET /login
	 *
	 * @return Response
	 */
	public function login()
	{
		return View::make('users.login');
	}

	/**
	 * Login post.
	 * POST /login
	 *
	 * @return Response
	 */
	public function handleLogin()
	{
		$data = Input::only(['email', 'password']);

		$validator = Validator::make(
			$data,
			[
				'email' => 'required|email',
				'password' => 'required',
			]
		);
		
		if($validator->fails()){
			return Redirect::route('login')->withErrors($validator)->withInput();
		}

		if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
		    return Redirect::to('/profile');
		}

		return Redirect::route('login')->withInput();
	}

	/**
	 * Profile screen.
	 * GET /profile
	 *
	 * @return Response
	 */
	public function profile()
	{
		if(Auth::check()){
			return View::make('users.profile');
		}
		return Redirect::route('login');
	}

	/**
	 * Logout.
	 * GET /logout
	 *
	 * @return Response
	 */
	public function logout()
	{
		if(Auth::check()){
			Auth::logout();
		}
		return Redirect::route('login');
	}


}
