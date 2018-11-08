<?php
namespace Think201\Echoza\Classes;

use Symfony\Component\Debug\ExceptionHandler as SymfonyExceptionHandler;
use Symfony\Component\Debug\Exception\FlattenException;

class Echoza {

	private $UserDetails;

	public function setUser($data) {

		$this->UserDetails = $data;
	}

	public function error($title, $customdata = [], $echo_slug = 'error', $priority = 'high') {

		if (!self::isValidConfiguration()) {

			return;
		}

		$body = [];

		$body['echo_slug'] = $echo_slug;

		$body['title'] = $title;

		$body['customdata'] = $customdata;

		$body['stack_trace'] = "";

		$body['type'] = 'error';

		$body['priority'] = $priority;

		$body['user'] = $this->UserDetails;

		EchozaHandler::sendData($body);

		$this->UserDetails = NULL;
	}

	public function info($title, $customdata = [], $echo_slug = 'info', $priority = 'medium') {

		if (!self::isValidConfiguration()) {

			return;
		}

		$body = [];

		$body['echo_slug'] = $echo_slug;

		$body['title'] = $title;

		$body['customdata'] = $customdata;

		$body['stack_trace'] = "";

		$body['type'] = 'info';

		$body['priority'] = $priority;

		$body['user'] = $this->UserDetails;

		EchozaHandler::sendData($body);

		$this->UserDetails = NULL;
	}

	public function exception($exception) {

		$body = [];

		$body['echo_slug'] = "error";

		$body['title'] = $exception->getMessage();

		// Using Laravel methods to make it look pretty

		$e = FlattenException::create($exception);

		$handler = new SymfonyExceptionHandler();

		// Data
		$body['data'] = $handler->getHtml($e);

		$body['customdata'] = [

			"type" => get_class($exception),
			"file" => $exception->getFile(),
			"line" => $exception->getLine(),
		];

		$body['stack_trace'] = $exception->getTraceAsString();

		$body['type'] = "exception";

		$body['priority'] = "high";

		$body['user'] = $this->UserDetails;

		EchozaHandler::sendData($body);

		$this->UserDetails = NULL;
	}

	public function isValidConfiguration() {

		if (false == config('echoza.echoza_enabled') ||
			empty(config('echoza.echoza_app_key')) ||
			empty(config('echoza.echoza_app_secret'))) {

			return false;
		}

		return true;
	}

}
