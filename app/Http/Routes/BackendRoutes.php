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
                $this->ajax();
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
        $this->router->get('/pegawai/add', ['as' => 'dashboard.pegawai.add', 'uses' => 'PegawaiController@add']);
        $this->router->post('/pegawai/store', ['as' => 'dashboard.pegawai.store', 'uses' => 'PegawaiController@store']);
        $this->router->get('/pegawai/edit/{id}', ['as' => 'dashboard.pegawai.edit', 'uses' => 'PegawaiController@edit']);
        $this->router->get('/pegawai/delete/{id}', ['as' => 'dashboard.pegawai.delete', 'uses' => 'PegawaiController@delete']);
        $this->router->get('/pegawai/show/{id}', ['as' => 'dashboard.pegawai.show', 'uses' => 'PegawaiController@show']);
        $this->router->get('/pegawai/riwayat/{id}', ['as' => 'dashboard.pegawai.riwayat', 'uses' => 'PegawaiController@riwayat']);
    }

    public function administrator()
    {
        $this->router->get('/roles', ['as' => 'dashboard.roles', 'uses' => 'RoleController@index']);
        $this->router->get('/roles/add', ['as' => 'dashboard.roles.add', 'uses' => 'RoleController@create']);
        $this->router->get('/roles/{id}/edit', ['as' => 'dashboard.roles.edit', 'uses' => 'RoleController@edit']);
        $this->router->get('/roles/{id}/delete', ['as' => 'dashboard.roles.delete', 'uses' => 'RoleController@delete']);
        $this->router->post('/roles/store', ['as' => 'dashboard.roles.store', 'uses' => 'RoleController@store']);

        $this->router->resource('/users', 'UserController',[
            'names' => [
                'index' => 'dashboard.users',
                'add' => 'dashboard.users.add',
                'edit' => 'dashboard.users.edit',
                'store' => 'dashboard.users.store',
                'delete' => 'dashboard.users.delete',
            ]
        ]);
        $this->router->resource('/permissions', 'PermissionController',[
            'names' => [
                'index' => 'dashboard.permissions',
                'add' => 'dashboard.permissions.add',
                'edit' => 'dashboard.permissions.edit',
                'store' => 'dashboard.permissions.store',
                'delete' => 'dashboard.permissions.delete',
            ]
        ]);
    }

    public function formasi()
    {
        $this->router->get('/golongan', ['as' => 'dashboard.golongan', 'uses' => 'GolonganController@index']);
        $this->router->get('/golongan/add', ['as' => 'dashboard.golongan.add', 'uses' => 'GolonganController@create']);
        $this->router->get('/golongan/{id}/edit', ['as' => 'dashboard.golongan.edit', 'uses' => 'GolonganController@edit']);
        $this->router->get('/golongan/{id}/delete', ['as' => 'dashboard.golongan.delete', 'uses' => 'GolonganController@delete']);
        $this->router->post('/golongan/store', ['as' => 'dashboard.golongan.store', 'uses' => 'GolonganController@store']);

        $this->router->get('/struktural', ['as' => 'dashboard.jabatan_struktural', 'uses' => 'PegawaiController@index']);

        $this->router->get('/unit-kerja', ['as' => 'dashboard.unit_kerja', 'uses' => 'UnitKerjaController@index']);
        $this->router->get('/unit-kerja/add', ['as' => 'dashboard.unit_kerja.add', 'uses' => 'UnitKerjaController@create']);
        $this->router->get('/unit-kerja/{id}/edit', ['as' => 'dashboard.unit_kerja.edit', 'uses' => 'UnitKerjaController@edit']);
        $this->router->get('/unit-kerja/{id}/delete', ['as' => 'dashboard.unit_kerja.delete', 'uses' => 'UnitKerjaController@delete']);
        $this->router->post('/unit-kerja/store', ['as' => 'dashboard.unit_kerja.store', 'uses' => 'UnitKerjaController@store']);
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

    public function ajax()
    {
        $this->router->post('/ajax/sub-unit-kerja', ['as' => 'dashboard.ajax.sub_unit_kerja', 'uses' => 'Ajax\AjaxController@postSubUnitKerja']);
        $this->router->post('/ajax/satuan-kerja', ['as' => 'dashboard.ajax.satuan_kerja', 'uses' => 'Ajax\AjaxController@postSatuanKerja']);
        $this->router->post('/ajax/jabatan-struktural', ['as' => 'dashboard.ajax.jabatan_struktural', 'uses' => 'Ajax\AjaxController@postJabatanStruktural']);
        $this->router->post('/ajax/jabatan-struktural-detail', ['as' => 'dashboard.ajax.jabatan_struktural_detail', 'uses' => 'Ajax\AjaxController@postJabatanStrukturalDetail']);
    }
}
