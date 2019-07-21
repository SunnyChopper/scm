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

Route::get('/clients/email/check', function() {
	$email = $_GET['email'];
	if (Client::where('email', strtolower($email))->where('is_active', '!=', 0)->count() > 0){
		return response()->json(false, 200);
	} else {
		return response()->json(true, 200);
	}
});
