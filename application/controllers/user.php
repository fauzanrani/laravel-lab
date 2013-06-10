<?php

class User_Controller extends Base_Controller {

	public $restful = true;

	public function get_index()
	{
		$view = View::make('users.index');
		$view->title = 'Login Page';
		return $view;
	}	
	public function post_index()
	{
		$input = Input::all();

		$rules = array(
			'email'		=>	'required|email',
			'password'	=>	'required'	
		);

		$v = Validator::make($input, $rules);
		if( $v->fails()){
			return Redirect::to('login')->with_errors($v);
		}else{
			$credentials = array('username'=>$input['email'], 'password'=>$input['password']);

			if( Auth::attempt($credentials)){
				return Redirect::to('profile');
			}else{
				return Redirect::to('login');
			}
		}

	}

	public function get_register()
	{
		$view = View::make('users.register');
		$view->title = 'Registration Page';
		return $view;

	}
	public function post_register()
	{
		$input = Input::all();

		$rules = array(
			'username'	=>	'required|unique:users',
			'email'		=>	'required|unique:users|email',
			'password'	=>	'required',
			'firstname'	=>	'required',
			'lastname'	=>	'required',	
		);

		$v = Validator::make($input, $rules);

		if( $v->fails()){
			return Redirect::to('register')->with_errors($v);
		}else{
			$password = $input['password'];
			$password = Hash::make($password);

			$user = new User;
			$user->firstname = $input['firstname'];
			$user->lastname = $input['lastname'];
			$user->username = $input['username'];
			$user->email = $input['email'];
			$user->password = $password;
			$user->save();

			return Redirect::to('login');
		}

	} // end post_resgister

	public function get_profile()
	{
		$title = ucwords(Auth::user()->username."'s Page");
		$firstname = Auth::user()->firstname;
		$lastname = Auth::user()->lastname;
		
		$view = View::make('users.profile');
		$view->title = $title;
		$view->firstname = $firstname;
		$view->lastname = $lastname;
		return $view;
	}

	public function get_logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}





