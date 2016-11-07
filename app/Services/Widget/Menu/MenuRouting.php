<?php 

namespace Simpeg\Services\Widget\Menu;

use Menu;
use Illuminate\Http\Request;

class MenuRouting {
	
	private $prefix, $lastMenu;

	public function __construct($url = null) {
		$this->setPrefix($url);
	}

	public function setPrefix($url) {
		$this->prefix = $url;
	}

	public function menu($title, $icon = null, $url = null, $callback = null) {
		$this->lastMenu = Menu::driver("router")->add($title, $this->getUrl($url), $icon, $callback);
		
		return $this;
	}

	public function on($callback) {
		if ($this->lastMenu === null)
			return false;

		$this->lastMenu->on($callback);

		return $this;
	}

	protected function getUrl($url = null) {
		return $this->prefix."/".$url;
	}
}