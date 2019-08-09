<?php

use Illuminate\Http\Request;

use App\Client;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Client functions
Route::get('/clients/email/check', function() {
	$email = $_GET['email'];
	if (Client::where('email', strtolower($email))->where('is_active', '!=', 0)->count() > 0){
		return response()->json(false, 200);
	} else {
		return response()->json(true, 200);
	}
});
Route::post('/clients/create', 'ClientsController@create');

// Product functions
Route::get('/products', 'ProductsController@get');
Route::post('/products/create', 'ProductsController@create');
Route::post('/products/delete', 'ProductsController@delete');

// Lead magnet functions
Route::get('/lead-ideas', 'LeadMagnetBuilderKitController@get');
Route::post('/baa/create', 'LeadMagnetBuilderKitController@create_baa');
Route::post('/baa/update', 'LeadMagnetBuilderKitController@update_baa');
Route::post('/lead-idea/create', 'LeadMagnetBuilderKitController@create_idea');
Route::get('/lead-idea/read', 'LeadMagnetBuilderKitController@read_idea');
Route::post('/lead-idea/update', 'LeadMagnetBuilderKitController@update_idea');
Route::post('/lead-idea/delete', 'LeadMagnetBuilderKitController@delete_idea');

// Premium content functions
Route::get('/premium', 'PremiumContentsController@get');
Route::post('/premium/create', 'PremiumContentsController@create');
Route::get('/premium/read', 'PremiumContentsController@read');
Route::post('/premium/update', 'PremiumContentsController@update');
Route::post('/premium/delete', 'PremiumContentsController@delete');

// Order functions
Route::post('/orders/create', 'InvoicesController@create');
Route::get('/orders/get', 'InvoicesController@get');

// Revenue functions
Route::get('/revenue', 'RevenuesController@get_revenue');