<?php
namespace Think201\Echoza\Classes;

class EchozaHandler {

	public static function callEchozaApi($body) {

		$endpoint = config('echoza.echoza_endpoint', 'http://app.echoza.com');

		if (trim($endpoint) == '') {
			$endpoint = 'https://app.echoza.com';
		}

		$url = $endpoint . '/v1/echo-laravel';

		$api_secret_key = config('echoza.echoza_app_secret');

		// Headers

		$headers = [
			'Authorization' => 'Bearer ' . $api_secret_key,
			'Accept' => 'application/json',
		];

		$client = new \GuzzleHttp\Client();

		$request = $client->post($url, array(
			'json' => $body,
			'headers' => $headers,
		));

		$response = $request->getBody();

		return;
	}

	private static function apiBody() {

		$request = request();

		$body = [];

		// Body for the Request

		$body['echoza_app_key'] = config('echoza.echoza_app_key');

		$body['echo_slug'] = 'error';

		$body['title'] = "Not Defined";

		$body['headers'] = $request->header();

		$body['metadata'] = EchozaMetadata::metaInfo();

		$body['customdata'] = '';

		$body['data'] = '';

		$body['stack_trace'] = [];

		$body['type'] = 'error';

		$body['priority'] = 'medium';

		return $body;
	}

	public static function sendData($body) {

		$defaultBody = self::apiBody();

		$body = array_merge($defaultBody, $body);

		self::callEchozaApi($body);
	}
}
