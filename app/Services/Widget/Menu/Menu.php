<?php

namespace Simpeg\Services\Widget\Menu;

use Simpeg\Services\Widget\Menu\Factory\DB;
use Simpeg\Services\Widget\Menu\Factory\Router;

class Menu {

	/**
	 * Driver that will be used by default
	 * @var String
	 */
	private $defaultDriver;

	/**
	 * Contain all instance Drivers
	 * @var array
	 */
	private $drivers = [];

	public function __construct() {
		$this->setDefaultDriver(config("menu.default", "router"));
	}

	/**
	 * Set Default Menu Driver
	 * @param string $driver
	 */
	public function setDefaultDriver($driver) {
		$this->defaultDriver = $driver;
	}

	/**
	 * Retrieving Driver instance
	 * or create a new one of not exists
	 * 
	 * @param  string $driver
	 * @return MenuFactoryContract
	 */
	public function driver($driver) {
		if (!isset($this->drivers[$driver]))
			$this->drivers[$driver] = $this->makeDriver($driver);

		return $this->drivers[$driver];
	}

	/**
	 * Create Driver instance
	 *
	 * @throws  Exception  driver not found
	 * @param  string $driver
	 * @return MenuFactoryContract
	 */
	protected function makeDriver($driver) {
		switch ($driver) {
			case 'db':
				return new DB;
			
			case 'router':
				return new Router;

			default:
				throw new \Exception("Driver '$driver' was not available");
		}
	}

	/**
	 * directing method to driver object
	 * @param  string $method
	 * @param  array $param
	 * @return mixed
	 */
	public function __call($method, $param) {
		return call_user_func_array([$this->driver($this->defaultDriver), $method], $param);
	}
}