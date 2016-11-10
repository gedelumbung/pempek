<?php

namespace Simpeg\Http\Routes;

use Illuminate\Routing\Router;

class FrontendRoutes implements RoutesInterface
{
    /**
     * @var \Illuminate\Routing\Router
     */
    protected $router;

    /**
     * @var array
     */
    protected $options;

    /**
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->options = [
            'domain' => env('APP_HOST'),
            'namespace' => 'Simpeg\Http\Controllers\Frontend',
            'middleware' => 'web',
        ];
    }

    /**
     * Register Routes
     */
    public function register()
    {
        $this->router->group($this->options, function () {
            $this->router->get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
            $this->router->get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
            $this->auth();
        });
    }

    public function auth()
    {
        // Authentication Routes...
        $this->router->get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
        $this->router->post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);
        $this->router->get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    }
}
