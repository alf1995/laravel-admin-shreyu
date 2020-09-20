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

Route::get('/', function () {
    return view('welcome');
});


/* LOGIN */
Route::prefix('dashboard')->group(function() {
    Auth::routes(['register' => false]);
    
});
    
/* DASHBOARD */
Route::group([
    'prefix' => 'dashboard', 
    'namespace' => 'Dashboard', 
    'middleware' => ['auth']
], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    /* CONFIG */
    Route::resource('/permissions', 'PermissionsController',[
        'names' => [
            'index' => 'permissions',
        ]
    ]);
    Route::resource('/roles', 'RolesController',[
        'names' => [
            'index' => 'roles',
        ]
    ]);
    /* USER */
    Route::resource('user', 'UserController',[
	    'names' => [
	        'index' => 'user',
	    ]
    ]);
    /* SETTINGS */
    Route::resource('settings', 'SettingsController',[
	    'names' => [
	        'index' => 'settings',
	    ]
	]);
    /* PROFILE */
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile/edit/{id}', 'ProfileController@edit');
});

/* LIMPIAR CACHE */
Route::get('/clear-cache', function() {
    Artisan::call('optimize:clear');
    echo Artisan::output();
});
