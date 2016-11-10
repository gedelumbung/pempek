<?php

namespace Simpeg\Http\Routes;

use Illuminate\Routing\Router;

class BackendRoutes implements RoutesInterface
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
     * OfficeRoutes constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->options = [
            'domain' => env('APP_HOST'),
            'namespace' => 'Simpeg\Http\Controllers\Backend',
            'middleware' => 'web',
            'prefix' => 'dashboard'
        ];
    }

    /**
     * Register Routes
     */
    public function register()
    {
        $this->router->group($this->options, function () {
            $this->router->group(['middleware' => ['auth']], function () {
                $this->home();
            });
        });
    }

    public function home()
    {
        $this->router->get('/', ['as' => 'dashboard.home', 'uses' => 'HomeController@index']);
    }
}
