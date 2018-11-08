<?php

return [

	/*
        |--------------------------------------------------------------------------
        | Echoza Enabled
        |--------------------------------------------------------------------------
        |
	| You can find your API key on your Echoza dashboard.
	|
	*/

	'echoza_enabled' => env('ECHOZA', false),

	/**
	|--------------------------------------------------------------------------
	| APP Key
	|--------------------------------------------------------------------------
	|
	| You can find your APP key on your Echoza dashboard.
	|
	 **/

	'echoza_app_key' => env('ECHOZA_APP_KEY', ''),

	/**
	|--------------------------------------------------------------------------
	| App Secret
	|--------------------------------------------------------------------------
	|
	| You can find your APP Secret on your Echoza dashboard.
	|
	 **/

	'echoza_app_secret' => env('ECHOZA_APP_SECRET', ''),

	/**
	|--------------------------------------------------------------------------
	| App Version
	|--------------------------------------------------------------------------
	|
	| Set the version of application executing the current code.
	|
	 **/

	'echoza_version' => env('ECHOZA_APP_VERSION'),

	/**
	|--------------------------------------------------------------------------
	| App End Point
	|--------------------------------------------------------------------------
	|
	| Don't change it unless using for development.
	|
	 **/

	'echoza_endpoint' => env('ECHOZA_ENDPOINT'),
];
