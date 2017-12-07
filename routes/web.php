<?php

Auth::routes();

Route::get('/', 'WelcomeController@index')->name('welcome.index');

Route::view('about', 'about.index')->name('about.index');
Route::view('about/book', 'about.book')->name('about.book');
Route::view('about/faq', 'about.faq')->name('about.faq');
Route::view('about/privacy', 'about.privacy')->name('about.privacy');
Route::view('about/tos', 'about.tos')->name('about.tos');

Route::get('contact', 'ContactController@create')->name('contact.create');
Route::post('contact', 'ContactController@store')->name('contact.store');

Route::resource('accounts', 'AccountsController');
Route::resource('approvals', 'ApprovalsController');
Route::resource('categories', 'CategoriesController');
Route::resource('events', 'EventsController');
Route::resource('favorites', 'FavoritesController');
Route::resource('locations', 'LocationsController');
Route::resource('maps', 'MapsController');
Route::resource('search', 'SearchController');
Route::resource('states', 'StatesController');
Route::resource('states.categories', 'StatesCategoriesController');
Route::resource('tickets', 'TicketsController');

