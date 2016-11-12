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
                $this->pegawai();
                $this->administrator();
                $this->formasi();
                $this->validasi_data();
                $this->setting();
                $this->laporan();
            });
        });
    }

    public function home()
    {
        $this->router->get('/', ['as' => 'dashboard.home', 'uses' => 'HomeController@index']);
    }

    public function pegawai()
    {
        $this->router->get('/pegawai', ['as' => 'dashboard.pegawai', 'uses' => 'PegawaiController@index']);
    }

    public function administrator()
    {
        $this->router->get('/roles', ['as' => 'dashboard.roles', 'uses' => 'RoleController@index']);
        $this->router->get('/users', ['as' => 'dashboard.users', 'uses' => 'PegawaiController@index']);
        $this->router->get('/permissions', ['as' => 'dashboard.permissions', 'uses' => 'PegawaiController@index']);
    }

    public function formasi()
    {
        $this->router->get('/golongan', ['as' => 'dashboard.golongan', 'uses' => 'PegawaiController@index']);
        $this->router->get('/struktural', ['as' => 'dashboard.jabatan_struktural', 'uses' => 'PegawaiController@index']);
        $this->router->get('/unit-kerja', ['as' => 'dashboard.unit_kerja', 'uses' => 'PegawaiController@index']);
    }

    public function validasi_data()
    {
        $this->router->get('/validasi-data', ['as' => 'dashboard.validasi_data', 'uses' => 'HomeController@index']);
    }

    public function setting()
    {
        $this->router->get('/pengumuman', ['as' => 'dashboard.pengumuman', 'uses' => 'HomeController@index']);
        $this->router->get('/sliders', ['as' => 'dashboard.sliders', 'uses' => 'HomeController@index']);
    }

    public function laporan()
    {
        $this->router->get('/laporan-duk', ['as' => 'dashboard.laporan.duk', 'uses' => 'HomeController@index']);
        $this->router->get('/laporan-nominatif', ['as' => 'dashboard.laporan.nominatif', 'uses' => 'HomeController@index']);
        $this->router->get('/laporan-pendidikan', ['as' => 'dashboard.laporan.pendidikan', 'uses' => 'HomeController@index']);
        $this->router->get('/laporan-jabatan', ['as' => 'dashboard.laporan.jabatan', 'uses' => 'HomeController@index']);
        $this->router->get('/laporan-golongan', ['as' => 'dashboard.laporan.golongan', 'uses' => 'HomeController@index']);
        $this->router->get('/laporan-konfigurasi', ['as' => 'dashboard.laporan.konfigurasi', 'uses' => 'HomeController@index']);
    }
}
