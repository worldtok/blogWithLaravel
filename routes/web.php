<?php


Route::group(['middleware' => ['web']], function () {

    Route::get('flash', function () {

        Session::flash('status', 'You are welcomed to home page');

        return redirect('/');
    });

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    /**
     * These are the routes i will be using to complete this project
     * categories route to display all categories
     * post routes to display all posts
     * etc
     * @param
     * @var
     *
     */
    Route::get('categories', 'CategoryController@index');//done
    Route::get('categories/{cat}', 'CategoryController@show');//done
    Route::get('category/{cat}', 'CategoryController@post');//done
    Route::get('post', 'PostController@index');//done
    Route::get('post/{post}/edit', 'PostController@edit');//done
   // Route::patch('post/{post}/update', 'PostController@edited');//done
    Route::patch('post/{post}/update', 'PostController@update');//done
    Route::post('categories/{cat}/addpost', 'PostController@store');//done
    Route::get('users', 'ProfileController@index');//done
    Route::get('post/{post}', 'PostController@show');
    Route::get('postnew', 'CategoryController@returncat');
    Route::post('addpost', 'PostController@add');
    Route::post('addcat', 'CategoryController@store');//done
    Route::get('profile/{user}', 'ProfileController@index');//done
    Route::post('profile/up', 'ProfileController@add');//done
    Route::get('dashboard', 'ProfileController@dashboard');//done
    Route::get('pro', 'ProfileController@dashboard');//done
    Route::get('home/{user}/profile', 'ProfileController@show');//done
    Route::get('delete/{id}', 'PostController@delete');





});
