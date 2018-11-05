<?php
namespace Think201\Echoza\Classes;

class EchozaMetadata {
	/**
	 * Multiplies the two given numbers
	 * @param int $a
	 * @param int $b
	 * @return int
	 */

	public static function metaInfo() {

		$request = request();

		$info = [];

		// URL
		$info['url'] = $request->fullUrl();

		// HTTP Method
		$info['http_method'] = $request->method();

		// IP Address
		$info['ip'] = $request->ip();

		// HTTP User Agent
		$info['http_user_agent'] = $request->userAgent();

		$info['env'] = config('app.env');
		$info['host'] = $_SERVER['HTTP_HOST'];

		// App Envoirment

		// HTTP Params
		// HTTP Host
		// HTTP Referer

		//$info['http_referer'] =  isset() ? $request->server('HTTP_REFERER'):NULL; //$_SERVER['HTTP_REFERER'];

		return $info;
	}

}
