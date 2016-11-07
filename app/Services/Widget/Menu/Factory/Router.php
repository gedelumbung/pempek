<?php

namespace Simpeg\Services\Widget\Menu\Factory;

use Simpeg\Services\Widget\Menu\Menu;
use Simpeg\Services\Widget\Menu\MenuItem;
use Simpeg\Services\Widget\WidgetContract;
use Html;
use Request;
use Illuminate\Support\Collection;

class Router implements MenuFactoryContract, WidgetContract {
	
	/**
	 * menu collection
	 * @var array
	 */
	protected $collection = [];

	/**
	 * index number from current accessed menu
	 * @var integer
	 */
	protected $current; 

	/**
	 * index number from current accessed menu
	 * @var integer
	 */
	protected $currentTmp; 
	
	/**
	 * auto increment for indexing collection
	 * @var integer
	 */
	private $increment;

	/**
	 * parent index number
	 * @var integer
	 */
	private $parent;

	/**
	 * Add Menu Item to collection
	 * 
	 * @param string $title
	 * @param string $url
	 * @param string $icon
	 * @param Closure $callback
	 * @return MenuItem
	 */
	public function add($title, $url = null, $icon = null, $callback = null) {
		$data = new MenuItem();
		$data->parent = $this->parent!==null ? $this->parent : null;
		$data->title = $title;
		$data->url = removeSlash($url);
		$data->icon = $icon;
		$data->isValid = $callback;

		$id = ++$this->increment;
		$currentUrl = removeSlash(str_replace(url("/"), "", Request::url()));

		// determine which menu is currently accessed
		if ($this->current === null && !empty($currentUrl)) {
			// current url is excatly same
			if ($currentUrl == removeSlash($data->url)) {
				$this->current = $id;
				$this->currentTmp = null;
				$data->active = true;
			}
			// some url part is same
			else if (strpos($currentUrl, $data->url) !== false) {
				// set currentTmp
				// data->url is more detail
				if ($this->currentTmp === null || strlen($this->collection[$this->currentTmp]->url) < strlen($data->url))
					$this->currentTmp = $id;
			}
		}

		return $this->collection[$id] = $data;
	}

	/**
	 * set parent to last incremented for all added menu 
	 * before clearParent method invoked
	 *  
	 * @param string $url
	 * @param string $icon
	 * @param Closure $callback
	 * @return MenuItem
	 */
	public function addGroup($title, $url = null, $icon = null, $callback = null) {
		$menu = $this->add($title, $url, $icon, $callback);
		$this->parent = $this->increment;

		return $menu;
	}

	/**
	 * stop parent grouping mode
	 */
	public function clearParent() {
		$this->parent = null;
	}

	/**
	 * return menu collection
	 * @return array
	 */
	public function getCollection() {
		return $this->collection;
	}

	/**
	 * return tree structured menu
	 * @return array
	 */
	public function getTree() {
		return $this->buildTree($this->collection);
	}

	/**
	 * convert menu collection into menu tree
	 * 
	 * @param  array $collection
	 * @param  integer $parent
	 * @return array
	 */
	public function buildTree($collection, $parent = null) {
		$tree = [];

		foreach ($collection as $id => $menu) {
			if ($menu->parent==$parent) {
				$child = $this->buildTree($collection, $id);

				if (count($child) > 0)
					$menu->child = $child;

				$tree[] = $menu;
			}
		}

		return $tree;
	}

	/**
	 * wrap HTML menu
	 * @return View
	 */
	public function render() {
		// set active menu
		if ($this->currentTmp !== null) {
			$this->current = $this->currentTmp;
			$this->currentTmp = null;
			$this->collection[$this->current]->active = true;
		}

		return view("layout.menu", [
			"menu" => $this->renderTree($this->getTree()),
		]);
	}

	/**
	 * render menu collection into HTML format
	 * 
	 * @param  array $collection
	 * @return string
	 */
	protected function renderTree($collection) {
		$html = "";

		foreach ($collection as $id => $menu) {
			if ($menu->isValid !== null) {
				$validate = $menu->isValid;

				if ($validate() == false)
					continue;
			}

			if (isset($menu->child))
				$menu->childView = $this->renderTree($menu->child);

			$html .= view("layout.menu-tree", [
				"active" => $id===$this->current,
				"menu" => $menu,
			])->render();
		}

		return $html;
	}

	/**
	 * render current menu path into breadcrumb
	 * 
	 * @return string
	 */
	public function renderBreadcrumb() {
		return view("layout.breadcrumb", [
			"path" => isset($this->current) ? array_reverse($this->getPath($this->current)) : [],
		])->render();
	}

	/**
	 * Find Menu path by menu collection index
	 * 
	 * @param  integer  $id
	 * @return array
	 */
	public function getPath($id = null) {
		$item = $this->collection[$id];
		$data = [$id => $item];

		if ($item->parent !== null)
			$data += $this->getPath($item->parent);

		return $data;
	}
}