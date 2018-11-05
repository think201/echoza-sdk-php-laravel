<?php
namespace Think201\Echoza\Classes;

class Echoza {

	public function error($error, $custom_data = [], $echo_slug = 'error') {

		if (!self::isValidConfiguration()) {

			return;
		}

		EchozaHandler::sendData($error, $custom_data, $echo_slug);
	}

	public function info($message, $custom_data = [], $echo_slug = 'info') {

		if (!self::isValidConfiguration()) {

			return;
		}

		EchozaHandler::sendData($error, $custom_data, $echo_slug);
	}

	public function isValidConfiguration() {

		if (false == config('echoza.echoza_enabled') ||
			empty(config('echoza.echoza_app_id')) ||
			empty(config('echoza.echoza_app_secret'))) {

			return false;
		}

		return true;
	}

}
