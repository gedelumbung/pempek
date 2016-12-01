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
        $this->router->post('/pegawai/update', ['as' => 'dashboard.pegawai.update', 'uses' => 'PegawaiController@update']);
        $this->router->get('/pegawai/{id}/edit', ['as' => 'dashboard.pegawai.edit', 'uses' => 'PegawaiController@edit']);
        $this->router->get('/pegawai/{id}/delete', ['as' => 'dashboard.pegawai.delete', 'uses' => 'PegawaiController@delete']);
        $this->router->get('/pegawai/{id}/show', ['as' => 'dashboard.pegawai.show', 'uses' => 'PegawaiController@show']);
        $this->router->get('/pegawai/{id}/prints', ['as' => 'dashboard.pegawai.prints', 'uses' => 'PegawaiController@prints']);

        $this->router->get('/pegawai/{pegawai}/riwayat-golongan', ['as' => 'dashboard.pegawai.riwayat_golongan', 'uses' => 'RiwayatGolonganController@index']);
        $this->router->get('/pegawai/{pegawai}/riwayat-golongan/create', ['as' => 'dashboard.pegawai.riwayat_golongan.create', 'uses' => 'RiwayatGolonganController@create']);
        $this->router->post('/pegawai/{pegawai}/riwayat-golongan', ['as' => 'dashboard.pegawai.riwayat_golongan.store', 'uses' => 'RiwayatGolonganController@store']);
        $this->router->get('/pegawai/{pegawai}/riwayat-golongan/{id}/delete', ['as' => 'dashboard.pegawai.riwayat_golongan.delete', 'uses' => 'RiwayatGolonganController@delete']);

        $this->router->get('/pegawai/{pegawai}/riwayat-pendidikan', ['as' => 'dashboard.pegawai.riwayat_pendidikan', 'uses' => 'RiwayatPendidikanController@index']);
        $this->router->get('/pegawai/{pegawai}/riwayat-pendidikan/create', ['as' => 'dashboard.pegawai.riwayat_pendidikan.create', 'uses' => 'RiwayatPendidikanController@create']);
        $this->router->post('/pegawai/{pegawai}/riwayat-pendidikan', ['as' => 'dashboard.pegawai.riwayat_pendidikan.store', 'uses' => 'RiwayatPendidikanController@store']);
        $this->router->get('/pegawai/{pegawai}/riwayat-pendidikan/{id}/delete', ['as' => 'dashboard.pegawai.riwayat_pendidikan.delete', 'uses' => 'RiwayatPendidikanController@delete']);

        $this->router->get('/pegawai/{pegawai}/riwayat-jabatan', ['as' => 'dashboard.pegawai.riwayat_jabatan', 'uses' => 'RiwayatJabatanController@index']);
        $this->router->get('/pegawai/{pegawai}/riwayat-jabatan/create', ['as' => 'dashboard.pegawai.riwayat_jabatan.create', 'uses' => 'RiwayatJabatanController@create']);
        $this->router->post('/pegawai/{pegawai}/riwayat-jabatan', ['as' => 'dashboard.pegawai.riwayat_jabatan.store', 'uses' => 'RiwayatJabatanController@store']);
        $this->router->get('/pegawai/{pegawai}/riwayat-jabatan/{id}/delete', ['as' => 'dashboard.pegawai.riwayat_jabatan.delete', 'uses' => 'RiwayatJabatanController@delete']);

        $this->router->get('/pegawai/{pegawai}/riwayat-diklat', ['as' => 'dashboard.pegawai.riwayat_diklat', 'uses' => 'RiwayatDiklatController@index']);
        $this->router->get('/pegawai/{pegawai}/riwayat-diklat/create', ['as' => 'dashboard.pegawai.riwayat_diklat.create', 'uses' => 'RiwayatDiklatController@create']);
        $this->router->post('/pegawai/{pegawai}/riwayat-diklat', ['as' => 'dashboard.pegawai.riwayat_diklat.store', 'uses' => 'RiwayatDiklatController@store']);
        $this->router->get('/pegawai/{pegawai}/riwayat-diklat/{id}/delete', ['as' => 'dashboard.pegawai.riwayat_diklat.delete', 'uses' => 'RiwayatDiklatController@delete']);

        $this->router->get('/pegawai/{pegawai}/orang-tua', ['as' => 'dashboard.pegawai.orang_tua', 'uses' => 'OrangTuaController@index']);
        $this->router->post('/pegawai/{pegawai}/orang-tua', ['as' => 'dashboard.pegawai.orang_tua.store', 'uses' => 'OrangTuaController@store']);

        $this->router->get('/pegawai/{pegawai}/pasangan', ['as' => 'dashboard.pegawai.pasangan', 'uses' => 'PasanganController@index']);
        $this->router->post('/pegawai/{pegawai}/pasangan', ['as' => 'dashboard.pegawai.pasangan.store', 'uses' => 'PasanganController@store']);

        $this->router->get('/pegawai/{pegawai}/anak', ['as' => 'dashboard.pegawai.anak', 'uses' => 'AnakController@index']);
        $this->router->get('/pegawai/{pegawai}/anak/create', ['as' => 'dashboard.pegawai.anak.create', 'uses' => 'AnakController@create']);
        $this->router->post('/pegawai/{pegawai}/anak', ['as' => 'dashboard.pegawai.anak.store', 'uses' => 'AnakController@store']);
        $this->router->get('/pegawai/{pegawai}/anak/{id}/delete', ['as' => 'dashboard.pegawai.anak.delete', 'uses' => 'AnakController@delete']);

        $this->router->get('/pegawai/{pegawai}/riwayat-kursus', ['as' => 'dashboard.pegawai.riwayat_kursus', 'uses' => 'RiwayatKursusController@index']);
        $this->router->get('/pegawai/{pegawai}/riwayat-kursus/create', ['as' => 'dashboard.pegawai.riwayat_kursus.create', 'uses' => 'RiwayatKursusController@create']);
        $this->router->post('/pegawai/{pegawai}/riwayat-kursus', ['as' => 'dashboard.pegawai.riwayat_kursus.store', 'uses' => 'RiwayatKursusController@store']);
        $this->router->get('/pegawai/{pegawai}/riwayat-kursus/{id}/delete', ['as' => 'dashboard.pegawai.riwayat_kursus.delete', 'uses' => 'RiwayatKursusController@delete']);

        $this->router->get('/pegawai/{pegawai}/riwayat-penghargaan', ['as' => 'dashboard.pegawai.riwayat_penghargaan', 'uses' => 'RiwayatPenghargaanController@index']);
        $this->router->get('/pegawai/{pegawai}/riwayat-penghargaan/create', ['as' => 'dashboard.pegawai.riwayat_penghargaan.create', 'uses' => 'RiwayatPenghargaanController@create']);
        $this->router->post('/pegawai/{pegawai}/riwayat-penghargaan', ['as' => 'dashboard.pegawai.riwayat_penghargaan.store', 'uses' => 'RiwayatPenghargaanController@store']);
        $this->router->get('/pegawai/{pegawai}/riwayat-penghargaan/{id}/delete', ['as' => 'dashboard.pegawai.riwayat_penghargaan.delete', 'uses' => 'RiwayatPenghargaanController@delete']);
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
        $this->router->get('/laporan-duk', ['as' => 'dashboard.laporan.duk', 'uses' => 'LaporanDukController@index']);
        $this->router->get('/laporan-duk/cetak', ['as' => 'dashboard.laporan.duk.cetak', 'uses' => 'LaporanDukController@prints']);
        $this->router->get('/laporan-duk/fetch', ['as' => 'dashboard.laporan.duk.fetch', 'uses' => 'LaporanDukController@fetchNewData']);
        
        $this->router->get('/laporan-nominatif', ['as' => 'dashboard.laporan.nominatif', 'uses' => 'LaporanNominatifController@index']);
        $this->router->get('/laporan-nominatif/cetak', ['as' => 'dashboard.laporan.nominatif.cetak', 'uses' => 'LaporanNominatifController@prints']);
        $this->router->get('/laporan-nominatif/fetch', ['as' => 'dashboard.laporan.nominatif.fetch', 'uses' => 'LaporanNominatifController@fetchNewData']);

        $this->router->get('/laporan-pendidikan', ['as' => 'dashboard.laporan.pendidikan', 'uses' => 'LaporanPendidikanController@index']);
        $this->router->get('/laporan-pendidikan/cetak', ['as' => 'dashboard.laporan.pendidikan.cetak', 'uses' => 'LaporanPendidikanController@prints']);

        $this->router->get('/laporan-jabatan', ['as' => 'dashboard.laporan.jabatan', 'uses' => 'LaporanJabatanController@index']);
        $this->router->get('/laporan-golongan', ['as' => 'dashboard.laporan.golongan', 'uses' => 'LaporanGolonganController@index']);
        $this->router->get('/laporan-usia', ['as' => 'dashboard.laporan.usia', 'uses' => 'LaporanUsiaController@index']);
        $this->router->get('/laporan-jenis-kelamin', ['as' => 'dashboard.laporan.jenis_kelamin', 'uses' => 'LaporanJenisKelaminController@index']);
    }

    public function ajax()
    {
        $this->router->post('/ajax/sub-unit-kerja', ['as' => 'dashboard.ajax.sub_unit_kerja', 'uses' => 'Ajax\AjaxController@postSubUnitKerja']);
        $this->router->post('/ajax/satuan-kerja', ['as' => 'dashboard.ajax.satuan_kerja', 'uses' => 'Ajax\AjaxController@postSatuanKerja']);
        $this->router->post('/ajax/jabatan-struktural', ['as' => 'dashboard.ajax.jabatan_struktural', 'uses' => 'Ajax\AjaxController@postJabatanStruktural']);
        $this->router->post('/ajax/jabatan-struktural-detail', ['as' => 'dashboard.ajax.jabatan_struktural_detail', 'uses' => 'Ajax\AjaxController@postJabatanStrukturalDetail']);
    }
}
