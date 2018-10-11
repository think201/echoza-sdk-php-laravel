<?php
namespace Think201\Echoza;

use Illuminate\Support\Facades\Facade;

class EchozaFacade extends Facade {

	protected static function getFacadeAccessor() {

		return 'echoza';

	}

}