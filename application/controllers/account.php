<?php
class Account_Controller extends Base_Controller
{
	public function action_index()
	{
		return View::make('account.index');
	}

	public function action_login()
	{
		$method = Request::method();
		if($method =='POST')
		{
			// get the username and password from the POST
			// data using the Input class

			$username = Input::get('username');
			$password = Input::get('password');
			// call Auth::attempt() on the username and password
			// to try to login, the session will be created
			// automatically on success
			//$credentials = array('username' => $username, 'password' => $password, 'remember' => true);
			$credentials = array('username' => $username, 'password' => $password);
			if(Auth::attempt($credentials))
			{
				// it worked, redirect to the admin route
				return Redirect::to('/');
			}
			else
			{
				// login failed, show the form again and
				// use the login_errors data to show that
				// an error occured
				return Redirect::to('account/login')
				->with('login_errors', true);
			}
		}
		else
		{
			return View::make('account.login');
		}
	}

	public function action_logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
	public function action_register()
	{
		$method = Request::method();
		if($method =='POST')
		{
			// get the username and password from the POST
			// data using the Input class
			$username = Input::get('username');
			$email = Input::get('email');
			$password = Input::get('password');
			$role = 1;
			$active = true;
			if(empty($username) || empty($password))
			{
				return Redirect::to('account/register')
				->with('register_errors', true);
			}else{
				$arr = array(
		    'username' => $username,
		    'email'    => $email,
		    'password' => Hash::make($password),
		    'role'     => $role,
		    'active'   => $active
				);
				$rules = array(
		'username' 	=> 'unique:users,username|required|min:1|max:20',
		'password' 	=> 'required',
		'email' 		=> 'unique:users,email|required'		
		);

		// make the validator
		$v = Validator::make($arr, $rules);

		if ( $v->fails() )
		{
			// redirect back to the form with
			// errors, input and our currently
			// logged in user
			return Redirect::to('account/register')
			->with('user', Auth::user())
			->with_errors($v)
			->with_input();
		}
		$user = new User();
		$user->fill($arr);
		$result = $user->save();
		// call Auth::attempt() on the username and password
		// to try to login, the session will be created
		// automatically on success

		if($result)
		{
			if(Auth::attempt(array(	'username' => $username,	'password' => $password,	'remember' => true)))
			{
				// it worked, redirect to the admin route
				return Redirect::to('/');
			}
			else
			{
				// login failed, show the form again and
				// use the login_errors data to show that
				// an error occured
				return Redirect::to('account/login')
				->with('login_errors', true);
			}
		}
		else
		{
			return Redirect::to('account/register')
			->with('register_errors', true);
		}
			}
		}
		else
		{
			return View::make('account.register');
		}


	}

	public function action_setting($id)
	{
		$current_user = Auth::user();
		$user = User::find($id);
		if($current_user->id != $user->id)
		{
			return Redirect::to('/');
		}
		$method = Request::method();
		if($method =='POST')
		{
			// get the username and password from the POST
			// data using the Input class
			$name = Input::get('name');

			if(empty($name))
			{
				return Redirect::to('account/setting')
				->with('setting_errors', true);
			}else{
				$arr = array(
		    'name' => $name,

				);
				$rules = array(
		'name' 	=> 'required|min:1|max:120',
				);

				// make the validator
				$v = Validator::make($arr, $rules);

				if ( $v->fails() )
				{
					return Redirect::to('account/setting')
					->with('user', Auth::user())
					->with_errors($v)
					->with_input();
				}
				$user->fill($arr);
				$result = $user->save();

                return View::make('account.setting')->with('user', $user);
			}
		}
		else
		{
			return View::make('account.setting')->with('user', $user);
		}
	}
}