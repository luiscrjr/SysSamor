<?php namespace samor\Http\Controllers;

use samor\Http\Requests;
use samor\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller {

	public function form(){

		return view('login');
	}

	public function login(){

		$credenciais = Request::only('email', 'password');
	}
	
}
