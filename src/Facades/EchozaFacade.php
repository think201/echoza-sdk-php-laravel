<?php
namespace Think201\Echoza\Facades;

use Illuminate\Support\Facades\Facade;

class EchozaFacade extends Facade {

	protected static function getFacadeAccessor() {

		return 'echoza';

	}

}