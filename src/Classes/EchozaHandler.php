<?php
namespace Think201\Echoza\Classes;

class EchozaHandler {

	public static function sendData($error, $custom_data, $echo_slug) {

		$endpoint = config('echoza.echoza_endpoint', 'http://app.echoza.com');

		if (trim($endpoint) == '') {
			$endpoint = 'https://app.echoza.com';
		}

		$url = $endpoint . '/v1/echo-laravel';

		$api_secret_key = config('echoza.echoza_app_secret');

		$echoza_app_id = config('echoza.echoza_app_id');

		$body['echoza_app_id'] = $echoza_app_id;
		$body['echoza_slug'] = $echo_slug;

		$body['headers'] = "";

		$body['metadata'] = EchozaMetadata::metaInfo();

		$body['customdata'] = $custom_data;

		$body['data'] = $error;

		$body['stack_trace'] = " This is stack trace";

		$client = new \GuzzleHttp\Client([
			'headers' => [
				'Authorization' => 'Bearer ' . $api_secret_key,
			],
			'verify' => false,
		]);

		$response = $client->post($url, [
			'json' => $body,
			'verify' => false,
		]);

		$status = $response->getStatusCode();

		dd("Hello");

		return $status;
	}

}
