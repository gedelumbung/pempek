<?php

namespace Simpeg\Services\Widget\Menu\Factory;

interface MenuFactoryContract {
	
	public function getTree();

	public function getPath($id = null);

	public function renderBreadcrumb();
}