<?php

return [

	/**
	|--------------------------------------------------------------------------
	| API Key
	|--------------------------------------------------------------------------
	|
	| You can find your API key on your Echoza dashboard.
	|
	 **/

	'echoza_enabled' => env('ECHOZA', false),

	/**
	|--------------------------------------------------------------------------
	| API Key
	|--------------------------------------------------------------------------
	|
	| You can find your API key on your Echoza dashboard.
	|
	 **/

	'app_id' => env('ECHOZA_APP_ID', ''),

	/**
	|--------------------------------------------------------------------------
	| App Type
	|--------------------------------------------------------------------------
	|
	| Set the type of application executing the current code.
	|
	 **/

	'app_secret' => env('ECHOZA_APP_SECRET', ''),

	/**
	|--------------------------------------------------------------------------
	| App Version
	|--------------------------------------------------------------------------
	|
	| Set the version of application executing the current code.
	|
	 **/

	'app_version' => env('ECHOZA_APP_VERSION', ''),

	/**
	|--------------------------------------------------------------------------
	| App End Point
	|--------------------------------------------------------------------------
	|
	| Don't change it unless using for development.
	|
	 **/

	'echoza_endpoint' => env('ECHOZA_ENDPOINT', ''),
];