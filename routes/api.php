<?php

use Illuminate\Http\Request;

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

Route::get('/version', function () {
    $version = new PHLAK\SemVer\Version(\App\ApplicationVersion::API);

    return $version;
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('stripe/webhook', '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook');

//Route::group(['prefix' => 'mailgun', 'middleware' => ['mailgun.webhook']], function () {
Route::post('mailgun/widgets', 'MailgunWidgetsController@store')->name('mailgun.store');
//});

Route::fallback(function () {
    return response()->json(['message' => 'Not Found.'], 404);
})->name('api.fallback.404');
