<?php

namespace Simpeg\Services\Widget\Menu;

class MenuItem {

	public $parent, $title, $url, $icon, $isValid;
	public $active = false;

	public function on($callback) {
		$this->isValid = $callback;
	}
}