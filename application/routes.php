<?php

/*
|--------------------------------------------------------------------------
| VIEW ALL POSTS PAGE
|--------------------------------------------------------------------------
*/

Route::get('/', 'home@index');


//博客首页
Route::get('blog', 'blog@index');
Route::get('blog/all', 'blog@index');
/*
|--------------------------------------------------------------------------
| VIEW A SINGLE POST PAGE
|--------------------------------------------------------------------------
*/

Route::get('blog/view/(:num)', 'blog@view');

/*
|--------------------------------------------------------------------------
| SHOW THE CREATE POST FORM
|--------------------------------------------------------------------------
*/

Route::get('blog/add', array('before' => 'auth', 'uses' => 'blog@add'));

/*
|--------------------------------------------------------------------------
| HANDLE THE CREATE POST FORM
|--------------------------------------------------------------------------
*/

Route::post('blog/add', array('before' => 'auth', 'uses' =>'blog@add'));

//编辑博客
Route::get('blog/edit/(:num)', array('before' => 'auth', 'uses' => 'blog@edit'));

//编辑博客
Route::post('blog/edit/(:num)', array('before' => 'auth', 'uses' => 'blog@edit'));
/*
|--------------------------------------------------------------------------
| SHOW THE LOGIN FORM
|--------------------------------------------------------------------------
*/

Route::get('account/login', 'account@login');

/*
|--------------------------------------------------------------------------
| HANDLE THE THE LOGIN FORM
|--------------------------------------------------------------------------
*/

Route::post('account/login', 'account@login');

/*
 |--------------------------------------------------------------------------
 | SHOW THE REGISTER FORM
 |--------------------------------------------------------------------------
 */

Route::get('account/register', 'account@register');

/*
 |--------------------------------------------------------------------------
 | HANDLE THE THE REGISTER FORM
 |--------------------------------------------------------------------------
 */

Route::post('account/register', 'account@register');

Route::get('account/setting/(:num)', 'account@setting');
Route::post('account/setting/(:num)', 'account@setting');
/*
|--------------------------------------------------------------------------
| LOGOUT FROM THE SYSTEM
|--------------------------------------------------------------------------
*/

Route::get('account/logout', 'account@logout');

//图片首页
Route::get('photo', 'photo@index');
Route::get('photo/all', 'photo@index');

//活动首页
Route::get('events', 'events@index');
Route::get('events/all', 'events@index');
//群组首页
Route::get('group', 'group@index');
Route::get('group/all', 'group@index');

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
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
 |		Router::register('GET /', array('before' => 'filter', function()
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