<?php

namespace Simpeg\Http\Middleware;

use Auth;
use Closure;
use Simpeg\Model\Menu as MenuModel;

class Menu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        \Menu::make('NavbarMenu', function($menu){

            $allMenu = MenuModel::where('parent_id', 0)->get();

            foreach ($allMenu as $key => $parent) {

                $childMenu = MenuModel::where('parent_id', $parent->id)->get();
                $menu->add($parent->title, array('url'  => $parent->url, 'class'  => $parent->icon));

                if ($childMenu->count() > 0) {
                    foreach ($childMenu as $child) {
                        $menu->{str_replace(" ", "", lcfirst(ucwords($parent->title)))}->add($child->title, array('url'  => $child->url, 'class' => $child->icon));
                    }
                }
            }

        });

        return $next($request);
    }
}
