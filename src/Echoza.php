<?php
namespace Think201\Echoza;

class Echoza {
	/**
	 * Multiplies the two given numbers
	 * @param int $a
	 * @param int $b
	 * @return int
	 */
	public function echo ($html) {

		if (false == config('echoza.echoza_enabled') ||
			empty(config('echoza.app_id')) ||
			empty(config('echoza.app_secret'))) {

			return;
		}

		$this->postEcho('all-exceptions', $html);
	}

	private function collectInfo() {

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

	private function postEcho($slug, $error) {

		//instead of sending an email.
		//Iam gonna try using
		//echoza platform to do the same

		$api_secret_key = config('echoza.app_secret');
		$app_id = config('echoza.app_id');

		$client = new \GuzzleHttp\Client([
			'headers' => [
				'Authorization' => 'Bearer ' . $api_secret_key,
			],
			'verify' => false,
		]);

		$body['info'] = $this->collectInfo();
		$body['app_id'] = $app_id;
		$body['slug'] = $slug;
		$body['log'] = $error;

		\Log::info($api_secret_key);

		$url = config('echoza.echoza_endpoint', 'https://app.echoza.com') . '/v1/echo';

		$response = $client->post($url, [
			'json' => $body,
			'verify' => false,
		]);

		$status = $response->getStatusCode();

		return $status;
	}

}