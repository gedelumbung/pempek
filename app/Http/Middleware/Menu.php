<?php

namespace Simpeg\Http\Middleware;

use Auth;
use Closure;
use Simpeg\Model\RoleUser;
use Simpeg\Model\PermissionRole;
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

            if (!Auth::guest()) {
                $roleUser = RoleUser::where('user_id', Auth::user()->id)->first();
                $permission_id_list = PermissionRole::where('role_id',$roleUser->role_id)->pluck('permission_id')->toArray();
                array_push($permission_id_list, 0);
                $allMenu = MenuModel::where('parent_id', 0)->whereIn('permission_id', $permission_id_list)->get();

                foreach ($allMenu as $key => $parent) {

                    $childMenu = MenuModel::where('parent_id', $parent->id)->whereIn('permission_id', $permission_id_list)->get();
                    if ($parent->url === '#') {
                        $menu->add($parent->title, array('url'  => $parent->url, 'class'  => $parent->icon));
                    }
                    else {
                        $menu->add($parent->title, array('route'  => $parent->url, 'class'  => $parent->icon));
                    }

                    if ($childMenu->count() > 0) {
                        foreach ($childMenu as $child) {
                            $menu->{str_replace(" ", "", lcfirst(ucwords($parent->title)))}->add($child->title, array('route'  => $child->url, 'class' => $child->icon));
                        }
                    }
                }
            }

        });

        return $next($request);
    }
}
