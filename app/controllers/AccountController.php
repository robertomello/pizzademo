<?php

class AccountController extends BaseController
{

	public function getIndex()
	{
		return View::make('account/index')->with('user', Auth::user());
	}

	public function getLogin()
	{
		if (Auth::check()) {
			return Redirect::to('account');
		}

		return View::make('account/login');
	}

	public function postLogin()
	{
		$rules = array(
			'email'    => 'required|email',
			'password' => 'required'
		);

		$input = array(
			'email'		=> Input::get('email'),
			'password'	=> Input::get('password')
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {
			if (Auth::attempt($input)) {
				return Redirect::to('/')->with('success', Lang::get('general.successful_login'));
			} else {
				return Redirect::to('account/login')->with('error', 'Email/jelszó hiba.');
			}
		}
		
		return Redirect::to('account/login')->withErrors($validator);
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('/')->with('success', Lang::get('general.successful_logout'));
	}
}