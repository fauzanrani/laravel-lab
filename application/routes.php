<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

// Route::get('/', function()
// {
// 	// METHOD (1)
// 	// $greeting = 'Hello';
// 	// $thing = 'Universe!';
// 	// return View::make('home.index')->with(array(
// 	// 	'greeting' => $greeting,
// 	// 	'thing' => $thing
// 	// ));


// 	// METHOD (2)
// 	// $data = array(
// 	// 	'greeting'	=> 'Hello',
// 	// 	'thing'		=> 'Universe'
// 	// );
// 	// return View::make('home.index',$data);


// 	// METHOD (3)
// 	$view = View::make('home.index');
// 	$view->greeting = 'Hi';
// 	$view->thing = 'Everybody';

// 	$view->items = array('item 1','item 2','item 3','item 4');


// 	return $view;

// });

// Route::get('about', function()
// {
// 	return View::make('home.about');
// });

Route::get('/', 'home@index');
Route::get('about', 'home@about');
Route::get('authors', 'authors@index');

Route::get('login', 'user@index');
Route::get('register', 'user@register');
Route::post('login', 'user@index');
Route::post('register', 'user@register');

Route::get('profile','user@profile');
Route::get('logout', 'user@logout');



Route::get('dbtest', function(){
	// $post = DB::table('posts')->where('id','=',2)->get();

	// $post = DB::table('posts')->where('id','=',2)->only('title');

	// $post = DB::table('posts')->get(array('title'));

	// $post = DB::table('posts')
	// ->where('id','!=',1)
	// ->or_where('title','=','The First Post')
	// ->get();

	// $post = DB::table('posts')->where_id_or_title('2','The First Post')->get();

	// $post = DB::table('posts')
	// ->where(function($query){
	// 	$query->where('id','=',2);
	// 	$query->where('title','!=','The First Post');
	// })
	// ->get();

	$post = DB::table('posts')
	->where(function($query){
		$query->where('author','=','Fauzan Rani');
	})
	->order_by('id','desc')
	->get();

	// dd($post); // dump and die
	// return $post;
	$view = View::make('home.dbtest');
	$view->post = $post;
	return $view;

});


Route::get('userpage', function()
{
	$users = User::all();
	// dd($user);

	// $user = User::find(1);
	// $username = $user->username;
	// $email = $user->email;

	// $view->username = $username;
	// $view->email = $email;


	$view = View::make('home.userpage');
	$view->title = 'User Page';
	$view->users = $users;
	return $view;

});



Route::get('add-user', function()
{
	$users = User::create(
		array(
			'username'=>'Chuck Doe',
			'email'=>'chuck@doe.com',
			'password'=>Hash::make(1234)
		)
	);

	if( $users ) $message = 'Successfully added new user!';

	$view = View::make('home.add-user');
	$view->title = 'Add New User';
	$view->message = $message;
	return $view;
});



/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application. The exception object
| that is captured during execution is then passed to the 500 listener.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function($exception)
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});