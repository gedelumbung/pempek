<?php

namespace Simpeg\Services\Widget\Menu\Factory;

use Simpeg\Services\Widget\WidgetContract;
use Simpeg\Models\Model;
use DB as Query;
use Request;

class DB extends Model implements MenuFactoryContract, WidgetContract {
	
	protected $table = "menu";

	protected $connection;

	public $timestamps = false;

    private $current;

	public function __construct(array $attributes = []) {
		parent::__construct($attributes);
		$this->connection = config("menu.drivers.db");

        // set current menu id
        $current = Query::select(
            "with recursive r as (
                select * from menu where id=(
                    select id from menu
                    where strpos(?, url)>0 and length(url)>0
                    order by length(url) desc limit 1
                )
                union all
                select m.* from menu m
                inner join r on r.parent=m.id
            )
            select id from r
            where parent is null limit 1", [Request::path()]
        );

        if (count($current) > 0)
            $this->current = current($current)->id;
	}

	/**
	 * Delete menu instance
	 * also it's child if any
	 * 
	 * @return boolean
	 */
	public function delete() {
		// delete tree
		Query::delete(
			"DELETE from menu where id in (
                with recursive r as (
                    select id, parent from menu where parent=?
                    union all
                    select m.id, m.parent from menu m
                    inner join r on r.id=m.parent
                )
                select id from r
            )", [$this->id]
        );

        return parent::delete();
	}

	/**
	 * Check invalid order value
	 * update if necessary
	 */
	public function initOrder() {
		$count = Query::select(
			"with recursive r as (
                select *, array[id] as path, array[\"order\"] as order_path, 0 as level from menu where parent is null
                union all
                select m.*, path || m.id, order_path || m.\"order\", level+1 from menu m
                inner join r on r.id=m.parent
            )
            select count(*) from r 
            group by order_path having count(*)>1 
            order by order_path"
        );

		// don't need to reorder
        if ($count === 0)
        	return;

        Query::update(
        	"UPDATE menu m set \"order\"=num-1 from ( 
                with recursive r as (
                    select row_number() over(order by id) as num, id from menu where parent is null
                        union all
                    select row_number() over(partition BY m.parent order by m.parent, m.id), m.id from menu m
                    inner join r on r.id=m.parent
                )
                select * from r
            ) as r
            where r.id=m.id"
        );
	}

    /**
     * Update list order
     * 
     * @param  int $order
     * @param  int $parent 
     * @return boolean
     */
	public function setOrder($parent, $order) {
        $parent = empty($parent) || $parent==false ? null : $parent;

        if ($this->parent==$parent && $this->order==$order)
            return false;

        // old & new parent was differ
        if ($this->parent != $parent) {
            # old parent group
            $param = ["order" => $this->order];

            // menu has parent
            if (!($is_root = $this->parent==null)) 
                $param["parent"] = $this->parent;

            Query::update(
                "menu", ["order" => Query::raw('"order" - 1')], 
                "parent ".($is_root ? "is null" : "=:parent").' and "order">:order', $param
            )
            ->execute();

            # new parent group
            $param = ["order" => $order];

            // menu has parent
            if (!($is_root = $parent==null)) 
                $param["parent"] = $parent;

            Query::update(
                "menu", ["order" => Query::raw('"order" + 1')], 
                "parent ".($is_root ? "is null" : "=:parent").' and "order">=:order', $param
            )
            ->execute();
        }
        // sorting on same parent group
        else {
            // the new position order is less than the old one
            if ($order < $this->order) {
                $expr = '"order" + 1';
                $condition = " and \"order\" between :new_order and :old_order-1";
            }
            else {
                $expr = '"order" - 1';
                $condition = " and \"order\" between :old_order and :new_order";
            }

            // execute update
            $param = [
                "old_order" => $this->order,
                "new_order" => $order,
            ];

            // menu has parent
            if (!($is_root = $parent==null)) 
                $param["parent"] = $parent;

            Query::update(
                "menu", ["order" => Query::raw($expr)],
                "parent ".($is_root ? "is null" : "=:parent").$condition, $param
            )
            ->execute();
        }

        $this->parent = $parent;
        $this->order = $order;

        return $this->save();
	}

	/**
	 * Render tree branches
	 * 
	 * @param  array $tree
	 * @return String
	 */
	protected function renderTree(array $tree) {
		$html = "";

		foreach ($tree as $menu) {
			if (isset($menu->child))
				$menu->childView = $this->renderTree($menu->child);

			$html .= view("layout.menu-tree", [
				"active" => $menu->id===$this->current,
				"menu" => $menu,
			])->render();
		}

		return $html;
	}

	/**
	 * Get current menu path
	 * 
	 * @param  integer $id
	 * @return array
	 */
	public function getPath($id = null) {
		return Query::select(
            "with recursive r as (
                select * from menu where id=?
                    union all
                select m.* from menu m
                inner join r on r.parent=m.id
            )
            select url, title from r", [$id==null ? $this->current : $id]
        );
	}

	/** MenuFactoryContract Implementations */

	/**
	 * @inheritDocs
	 */
	public function getTree() {
		return $this->buildTree(self::get());
	}

	/**
	 * Retrieving menu as tree of array
	 * 
	 * @param  array  $list
	 * @param  integer $parent
	 * @return array
	 */
	public function buildTree($list, $parent = null) {
		$branch = [];

        foreach ($list as $menu) {
            if ($menu->parent == $parent) {
                if ($children = $this->buildTree($list, $menu->id))
                    $menu->child = $children;

                $branch[] = $menu;
            }
        }

        return $branch;
	}

	/**
	 * Render menu as HTML
	 * 
	 * @return View
	 */
	public function render() {
		return view("layout.menu", [
			"menu" => $this->renderTree($this->getTree()),
		]);
	}

	/**
	 * Render Menu path as breadcrumb
	 * 
	 * @return View
	 */
	public function renderBreadcrumb() {
		return view("layout.breadcrumb", [
			"path" => isset($this->current) ? $this->getPath() : [],
		])->render();
	}
}