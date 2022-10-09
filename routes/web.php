<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group( function () {

	// Dashboards
	Route::get('/', 'DashboardController@index')->name('dashboard.index');

	// Account user
	Route::get('/account', 'AccountController@edit')->name('account.edit');
	Route::put('/account', 'AccountController@update')->name('account.update');

	// Members
	Route::get('members/search/', 'MemberController@search')->name('members.search');
	Route::prefix('members/{id}')->group( function () {
		Route::get('add', 'MemberController@add')->name('members.add');
		Route::post('add', 'MemberController@attach')->name('members.attach');
		Route::get('remove/{pivot_id}', 'MemberController@remove')->name('members.remove');
		Route::delete('remove/{pivot_id}', 'MemberController@detach')->name('members.detach');
		Route::get('delete', 'MemberController@delete')->name('members.delete');
	});
	Route::resource('members', 'MemberController');

	// Ministries
	Route::prefix('ministries/{id}')->group( function () {
		Route::get('add', 'MinistryController@add')->name('ministries.add');
		Route::post('add', 'MinistryController@attach')->name('ministries.attach');
		Route::get('change/{pivot_id}', 'MinistryController@change')->name('ministries.change');
		Route::put('change/{pivot_id}', 'MinistryController@retach')->name('ministries.retach');
		Route::get('remove/{pivot_id}', 'MinistryController@remove')->name('ministries.remove');
		Route::delete('remove/{pivot_id}', 'MinistryController@detach')->name('ministries.detach');
		Route::get('delete', 'MinistryController@delete')->name('ministries.delete');
	});
	Route::resource('ministries', 'MinistryController');

	// Visits
	Route::get('visits/{id}/delete', 'VisitController@delete')->name('visits.delete');
	Route::resource('visits', 'VisitController');
	
	// Users
	Route::get('users/{id}/delete', 'UserController@delete')->name('users.delete');
	Route::resource('users', 'UserController');
	
});

// Auth
Route::get('/login', ['uses' => 'AuthController@login', 'as' => 'login']);
Route::get('/logout', ['uses' => 'AuthController@logout', 'as' => 'logout']);
Route::post('/login', ['uses' => 'AuthController@logging', 'as' => 'logging']);
