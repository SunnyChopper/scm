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

// Public pages
Route::get('/', 'PagesController@index');
Route::get('/contact', 'PagesController@contact');
Route::get('/pricing', 'PagesController@pricing');
Route::get('/services/web-dev', 'PagesController@web_dev_service');

// Client dashboard
Route::get('/clients', 'ClientsController@index');
Route::post('/clients/login', 'ClientsController@login');
Route::get('/clients/dashboard', 'ClientsController@dashboard');
Route::get('/clients/tasks', 'TasksController@view_all');
Route::get('/clients/tasks/request', 'TasksController@request');
Route::post('/clients/tasks/new', 'TasksController@create');
Route::get('/clients/logs', 'LogsController@view_all');
Route::get('/clients/revenue', 'RevenuesController@view_all');