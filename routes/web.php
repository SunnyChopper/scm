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
Route::get('/test', 'AdminController@test');

// Client dashboard
Route::get('/clients/login', 'ClientsController@index');
Route::get('/clients/password/initial/{client_id}', 'ClientsController@set_password');
Route::post('/clients/password/set', 'ClientsController@create_password');
Route::get('/clients/dashboard', 'ClientsController@dashboard');
Route::get('/clients/tasks', 'TasksController@view_all');
Route::get('/clients/tasks/request', 'TasksController@request');
Route::post('/clients/tasks/new', 'TasksController@create');
Route::get('/clients/logs', 'LogsController@view_all');
Route::get('/clients/revenue', 'RevenuesController@view_all');

// Admin dashboard
Route::get('/admin/register/{p}', 'AdminController@create_admin');
Route::post('/admin/create', 'AdminController@register');
Route::get('/admin', 'AdminController@login_screen');
Route::get('/admin/login', 'AdminController@login_screen');
Route::post('/admin/login/attempt', 'AdminController@login');
Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/clients', 'AdminController@view_clients');
Route::get('/admin/clients/new', 'AdminController@new_client');
Route::post('/admin/clients/create', 'AdminController@create_client');
Route::get('/admin/clients/edit/{client_id}', 'AdminController@edit_client');
Route::post('/admin/clients/update', 'AdminController@update_client');
Route::get('/admin/logs', 'AdminController@view_logs');
Route::get('/admin/logs/new', 'AdminController@new_log');
Route::post('/admin/logs/create', 'LogsController@create');
Route::get('/admin/revenue', 'AdminController@view_revenue');
Route::get('/admin/revenue/new', 'AdminController@new_revenue');
Route::get('/admin/logout', 'AdminController@logout');