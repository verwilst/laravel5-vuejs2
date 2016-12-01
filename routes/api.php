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

/**
 * @SWG\Swagger(
 *   @SWG\Info(
 *     title="Laravel-JWT API",
 *     version="1.0.0"
 *   )
 * )
 */

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [], function ($api) {

    $api->post('auth/token', 'App\Http\Controllers\Auth\LoginController@login');

    $api->group(['middleware' => 'api.auth'], function ($api) {

        /**
         * @SWG\Get(
         *     path="/",
         *     operationId="token",
         *     summary="Example.",
         *     description="",
         *     consumes={"application/json", "application/xml"},
         *     produces={"application/xml", "application/json"},
         *     @SWG\Response(
         *         response=200,
         *         description="Example successful",
         *     )
         * )
         */
        $api->get('/', function (Request $request) {
            return '';
        });
    });

});


