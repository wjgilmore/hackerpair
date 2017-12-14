<?php

Auth::routes();
Route::get('auth/github', 'Auth\SocialGitHubController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\SocialGitHubController@handleProviderCallback');

Route::get('/', 'WelcomeController@index')->name('welcome.index');

Route::view('about', 'about.index')->name('about.index');
Route::view('about/book', 'about.book')->name('about.book');

Route::get('contact', 'ContactController@create')->name('contact.create');
Route::post('contact', 'ContactController@store')->name('contact.store');

Route::resource('users', 'UsersController');
Route::resource('approvals', 'ApprovalsController');
Route::resource('categories', 'CategoriesController');
Route::resource('events', 'EventsController');
Route::resource('favorites', 'FavoritesController');
Route::get('users/{user}/hosted/{any_hosted_event}/edit', 'UserHostedEventsController@edit');
Route::put('users/{user}/hosted/{any_hosted_event}', 'UserHostedEventsController@update');
Route::resource('users.hosted', 'UserHostedEventsController');
Route::resource('users.upcoming', 'UserUpcomingEventsController');
Route::resource('locations', 'LocationsController');
Route::resource('maps', 'MapsController');
Route::resource('search', 'SearchController');
Route::resource('states', 'StatesController');
Route::resource('states.categories', 'StatesCategoriesController');
Route::resource('tickets', 'TicketsController');

