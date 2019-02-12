<?php

namespace SpkApp\Http\Controllers;

use Illuminate\Http\Request;

use SpkApp\http\Requests;

class AuthController extends Controller
{
	public function login()
	{
		return view ('auth.login');
	}

	public function register()
	{
		return view ('auth.register');
	}

	public function email()
	{
		return view ('auth.email');
	}

	public function reset()
	{
		return view ('auth.reset');
	}
}