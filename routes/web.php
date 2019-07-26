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
Route::get('/clients/register', 'ClientsController@register');
Route::post('/clients/register', 'ClientsController@register_client');
Route::get('/clients/login', 'ClientsController@index');
Route::post('/clients/login/attempt', 'ClientsController@login');
Route::get('/clients/logout', 'ClientsController@logout');
Route::get('/clients/password/initial/{client_id}', 'ClientsController@set_password');
Route::post('/clients/password/set', 'ClientsController@create_password');
Route::get('/clients/dashboard', 'ClientsController@dashboard');

// Tasks functions
Route::get('/clients/tasks', 'TasksController@view_all');
Route::get('/clients/tasks/request', 'TasksController@request');
Route::post('/clients/tasks/request/create', 'TasksController@create_request');
Route::get('/admin/tasks', 'AdminController@view_tasks');
Route::get('/admin/tasks/new', 'AdminController@new_task');
Route::post('/admin/tasks/create', 'TasksController@create');
Route::get('/admin/tasks/edit/{task_id}', 'AdminController@edit_task');
Route::post('/admin/tasks/update', 'TasksController@update');

// Log functions
Route::get('/clients/logs', 'LogsController@view_all');
Route::get('/admin/logs', 'AdminController@view_logs');
Route::get('/admin/logs/new', 'AdminController@new_log');
Route::post('/admin/logs/create', 'LogsController@create');

// Revenue functions
Route::get('/clients/revenue', 'RevenuesController@view_all');
Route::get('/admin/revenue', 'AdminController@view_revenue');
Route::get('/admin/revenue/new', 'AdminController@new_revenue');

// Product functions
Route::get('/admin/products', 'ProductsController@index');
Route::get('/clients/products', 'ClientsController@view_software_products');

// Order functions
Route::get('/clients/orders', 'InvoicesController@client_view');

// Admin dashboard
Route::get('/admin/register/{p}', 'AdminController@create_admin');
Route::post('/admin/create', 'AdminController@register');
Route::get('/admin', 'AdminController@login_screen');
Route::get('/admin/login', 'AdminController@login_screen');
Route::post('/admin/login/attempt', 'AdminController@login');
Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/logout', 'AdminController@logout');

// Client functions
Route::get('/admin/clients', 'AdminController@view_clients');
Route::get('/admin/clients/new', 'AdminController@new_client');
Route::post('/admin/clients/create', 'AdminController@create_client');
Route::get('/admin/clients/edit/{client_id}', 'AdminController@edit_client');
Route::post('/admin/clients/update', 'AdminController@update_client');

// LMBK Functions
Route::get('/clients/tools/lead-builder', 'LeadMagnetBuilderKitController@index');