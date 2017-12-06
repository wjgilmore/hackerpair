<?php

Auth::routes();

Route::get('/', 'WelcomeController@index');

Route::view('about', 'about.index')->name('about.index');
Route::view('about/book', 'about.book')->name('about.book');
Route::view('about/faq', 'about.faq')->name('about.faq');
Route::view('about/privacy', 'about.privacy')->name('about.privacy');
Route::view('about/tos', 'about.tos')->name('about.tos');

Route::view('contact', 'contact.index')->name('contact.index');

Route::resource('accounts', 'AccountsController');
Route::resource('approvals', 'ApprovalsController');
Route::resource('categories', 'CategoriesController');
Route::resource('events', 'EventsController');
Route::resource('favorites', 'FavoritesController');
Route::resource('languages', 'LanguagesController');
Route::resource('locations', 'LocationsController');
Route::resource('maps', 'MapsController');
Route::resource('search', 'SearchController');
Route::resource('states', 'StatesController');
Route::resource('states.categories', 'StatesCategoriesController');
Route::resource('tickets', 'TicketsController');

