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
                $this->master();
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
        $this->router->get('/pegawai', ['as' => 'dashboard.pegawai', 'middleware' => 'role:pegawai-all', 'uses' => 'PegawaiController@index']);
        $this->router->get('/pegawai/add', ['as' => 'dashboard.pegawai.add', 'middleware' => 'role:pegawai-add', 'uses' => 'PegawaiController@add']);
        $this->router->post('/pegawai/store', ['as' => 'dashboard.pegawai.store', 'uses' => 'PegawaiController@store']);
        $this->router->post('/pegawai/update', ['as' => 'dashboard.pegawai.update', 'middleware' => 'role:pegawai-edit', 'uses' => 'PegawaiController@update']);
        $this->router->get('/pegawai/{id}/edit', ['as' => 'dashboard.pegawai.edit', 'middleware' => 'role:pegawai-edit', 'uses' => 'PegawaiController@edit']);
        $this->router->get('/pegawai/{id}/delete', ['as' => 'dashboard.pegawai.delete', 'middleware' => 'role:pegawai-delete', 'uses' => 'PegawaiController@delete']);
        $this->router->get('/pegawai/{id}/show', ['as' => 'dashboard.pegawai.show', 'middleware' => 'role:pegawai-show', 'uses' => 'PegawaiController@show']);
        $this->router->get('/pegawai/{id}/prints', ['as' => 'dashboard.pegawai.prints', 'middleware' => 'role:pegawai-show', 'uses' => 'PegawaiController@prints']);

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

        $this->router->get('/users', ['as' => 'dashboard.users', 'uses' => 'UserController@index']);
        $this->router->get('/users/add', ['as' => 'dashboard.users.add', 'uses' => 'UserController@create']);
        $this->router->get('/users/{id}/edit', ['as' => 'dashboard.users.edit', 'uses' => 'UserController@edit']);
        $this->router->get('/users/{id}/delete', ['as' => 'dashboard.users.delete', 'uses' => 'UserController@delete']);
        $this->router->post('/users/store', ['as' => 'dashboard.users.store', 'uses' => 'UserController@store']);
        
        $this->router->get('/permissions', ['as' => 'dashboard.permissions', 'uses' => 'PermissionController@index']);
        $this->router->post('/permissions', ['as' => 'dashboard.permissions.save', 'uses' => 'PermissionController@store']);
    }

    public function master()
    {
        $this->router->get('/golongan', ['as' => 'dashboard.golongan', 'uses' => 'GolonganController@index']);
        $this->router->get('/golongan/add', ['as' => 'dashboard.golongan.add', 'uses' => 'GolonganController@create']);
        $this->router->get('/golongan/{id}/edit', ['as' => 'dashboard.golongan.edit', 'uses' => 'GolonganController@edit']);
        $this->router->get('/golongan/{id}/delete', ['as' => 'dashboard.golongan.delete', 'uses' => 'GolonganController@delete']);
        $this->router->post('/golongan/store', ['as' => 'dashboard.golongan.store', 'uses' => 'GolonganController@store']);

        $this->router->get('/struktural', ['as' => 'dashboard.jabatan_struktural', 'uses' => 'JabatanStrukturalController@index']);
        $this->router->get('/struktural/status/{id}/{status}', ['as' => 'dashboard.jabatan.status', 'uses' => 'JabatanStrukturalController@status']);
        $this->router->get('/struktural/add', ['as' => 'dashboard.jabatan.add', 'uses' => 'JabatanStrukturalController@create']);
        $this->router->get('/struktural/{id}/edit', ['as' => 'dashboard.jabatan.edit', 'uses' => 'JabatanStrukturalController@edit']);
        $this->router->get('/struktural/{id}/delete', ['as' => 'dashboard.jabatan.delete', 'uses' => 'JabatanStrukturalController@delete']);
        $this->router->post('/struktural/store', ['as' => 'dashboard.jabatan.store', 'uses' => 'JabatanStrukturalController@store']);

        $this->router->get('/unit-kerja', ['as' => 'dashboard.unit_kerja', 'uses' => 'UnitKerjaController@index']);
        $this->router->get('/unit-kerja/add', ['as' => 'dashboard.unit_kerja.add', 'uses' => 'UnitKerjaController@create']);
        $this->router->get('/unit-kerja/{id}/edit', ['as' => 'dashboard.unit_kerja.edit', 'uses' => 'UnitKerjaController@edit']);
        $this->router->get('/unit-kerja/{id}/delete', ['as' => 'dashboard.unit_kerja.delete', 'uses' => 'UnitKerjaController@delete']);
        $this->router->post('/unit-kerja/store', ['as' => 'dashboard.unit_kerja.store', 'uses' => 'UnitKerjaController@store']);
    }

    public function validasi_data()
    {
        $this->router->get('/validasi-data', ['as' => 'dashboard.validasi_data', 'uses' => 'ValidasiController@index']);
        $this->router->get('/validasi-data/{pegawai}/show', ['as' => 'dashboard.validasi_data.show', 'uses' => 'ValidasiController@show']);
        $this->router->get('/validasi-data/{pegawai}/approve/{status}/pegawai', ['as' => 'dashboard.validasi_data.approve.pegawai', 'uses' => 'ValidasiController@approvePegawai']);

        $this->router->get('/validasi-data/{pegawai}/approve/{id}/pendidikan', ['as' => 'dashboard.validasi_data.approve.pendidikan', 'uses' => 'ValidasiController@approvePendidikan']);
        $this->router->get('/validasi-data/{pegawai}/remove/{id}/pendidikan', ['as' => 'dashboard.validasi_data.remove.pendidikan', 'uses' => 'ValidasiController@removePendidikan']);

        $this->router->get('/validasi-data/{pegawai}/approve/{id}/diklat', ['as' => 'dashboard.validasi_data.approve.diklat', 'uses' => 'ValidasiController@approveDiklat']);
        $this->router->get('/validasi-data/{pegawai}/remove/{id}/diklat', ['as' => 'dashboard.validasi_data.remove.diklat', 'uses' => 'ValidasiController@removeDiklat']);

        $this->router->get('/validasi-data/{pegawai}/approve/{id}/kursus', ['as' => 'dashboard.validasi_data.approve.kursus', 'uses' => 'ValidasiController@approveKursus']);
        $this->router->get('/validasi-data/{pegawai}/remove/{id}/kursus', ['as' => 'dashboard.validasi_data.remove.kursus', 'uses' => 'ValidasiController@removeKursus']);

        $this->router->get('/validasi-data/{pegawai}/approve/{id}/penghargaan', ['as' => 'dashboard.validasi_data.approve.penghargaan', 'uses' => 'ValidasiController@approvePenghargaan']);
        $this->router->get('/validasi-data/{pegawai}/remove/{id}/penghargaan', ['as' => 'dashboard.validasi_data.remove.penghargaan', 'uses' => 'ValidasiController@removePenghargaan']);

        $this->router->get('/validasi-data/{pegawai}/approve/{status}', ['as' => 'dashboard.validasi_data.approve', 'uses' => 'ValidasiController@approve']);
        $this->router->get('/validasi-data/{pegawai}/approve-all', ['as' => 'dashboard.validasi_data.approve_all', 'uses' => 'ValidasiController@checkNonApproved']);
    }

    public function setting()
    {
        $this->router->get('/pengumuman', ['as' => 'dashboard.pengumuman', 'uses' => 'PengumumanController@index']);
        $this->router->get('/pengumuman/add', ['as' => 'dashboard.pengumuman.add', 'uses' => 'PengumumanController@create']);
        $this->router->get('/pengumuman/{id}/edit', ['as' => 'dashboard.pengumuman.edit', 'uses' => 'PengumumanController@edit']);
        $this->router->get('/pengumuman/{id}/delete', ['as' => 'dashboard.pengumuman.delete', 'uses' => 'PengumumanController@delete']);
        $this->router->post('/pengumuman/store', ['as' => 'dashboard.pengumuman.store', 'uses' => 'PengumumanController@store']);

        $this->router->get('/sliders', ['as' => 'dashboard.sliders', 'uses' => 'SliderController@index']);
        $this->router->get('/sliders/add', ['as' => 'dashboard.sliders.add', 'uses' => 'SliderController@create']);
        $this->router->get('/sliders/{id}/edit', ['as' => 'dashboard.sliders.edit', 'uses' => 'SliderController@edit']);
        $this->router->get('/sliders/{id}/delete', ['as' => 'dashboard.sliders.delete', 'uses' => 'SliderController@delete']);
        $this->router->post('/sliders/store', ['as' => 'dashboard.sliders.store', 'uses' => 'SliderController@store']);

        $this->router->get('/settings', ['as' => 'dashboard.settings', 'uses' => 'SettingController@index']);
        $this->router->get('/settings/add', ['as' => 'dashboard.settings.add', 'uses' => 'SettingController@create']);
        $this->router->get('/settings/{id}/edit', ['as' => 'dashboard.settings.edit', 'uses' => 'SettingController@edit']);
        $this->router->get('/settings/{id}/delete', ['as' => 'dashboard.settings.delete', 'uses' => 'SettingController@delete']);
        $this->router->post('/settings/store', ['as' => 'dashboard.settings.store', 'uses' => 'SettingController@store']);
    }

    public function laporan()
    {
        $this->router->get('/laporan-duk', ['as' => 'dashboard.laporan.duk', 'uses' => 'LaporanDukController@index']);
        $this->router->get('/laporan-duk/cetak/{type}', ['as' => 'dashboard.laporan.duk.cetak', 'uses' => 'LaporanDukController@prints']);
        $this->router->get('/laporan-duk/fetch', ['as' => 'dashboard.laporan.duk.fetch', 'uses' => 'LaporanDukController@fetchNewData']);
        
        $this->router->get('/laporan-nominatif', ['as' => 'dashboard.laporan.nominatif', 'uses' => 'LaporanNominatifController@index']);
        $this->router->get('/laporan-nominatif/cetak', ['as' => 'dashboard.laporan.nominatif.cetak', 'uses' => 'LaporanNominatifController@prints']);
        $this->router->get('/laporan-nominatif/fetch', ['as' => 'dashboard.laporan.nominatif.fetch', 'uses' => 'LaporanNominatifController@fetchNewData']);

        $this->router->get('/laporan-pendidikan', ['as' => 'dashboard.laporan.pendidikan', 'uses' => 'LaporanPendidikanController@index']);
        $this->router->get('/laporan-pendidikan/cetak', ['as' => 'dashboard.laporan.pendidikan.cetak', 'uses' => 'LaporanPendidikanController@prints']);

        $this->router->get('/laporan-jabatan', ['as' => 'dashboard.laporan.jabatan', 'uses' => 'LaporanJabatanController@index']);
        $this->router->get('/laporan-jabatan/cetak', ['as' => 'dashboard.laporan.jabatan.cetak', 'uses' => 'LaporanJabatanController@prints']);

        $this->router->get('/laporan-golongan', ['as' => 'dashboard.laporan.golongan', 'uses' => 'LaporanGolonganController@index']);
        $this->router->get('/laporan-golongan/cetak', ['as' => 'dashboard.laporan.golongan.cetak', 'uses' => 'LaporanGolonganController@prints']);

        $this->router->get('/laporan-usia', ['as' => 'dashboard.laporan.usia', 'uses' => 'LaporanUsiaController@index']);
        $this->router->get('/laporan-usia/cetak', ['as' => 'dashboard.laporan.usia.cetak', 'uses' => 'LaporanUsiaController@prints']);
        
        $this->router->get('/laporan-jenis-kelamin', ['as' => 'dashboard.laporan.jenis_kelamin', 'uses' => 'LaporanJenisKelaminController@index']);
        $this->router->get('/laporan-jenis-kelamin/cetak', ['as' => 'dashboard.laporan.jenis_kelamin.cetak', 'uses' => 'LaporanJenisKelaminController@prints']);

        $this->router->get('/laporan-alert-pensiun', ['as' => 'dashboard.laporan.alert_pensiun', 'uses' => 'LaporanAlertPensiunController@index']);
    }

    public function ajax()
    {
        $this->router->post('/ajax/sub-unit-kerja', ['as' => 'dashboard.ajax.sub_unit_kerja', 'uses' => 'Ajax\AjaxController@postSubUnitKerja']);
        $this->router->post('/ajax/satuan-kerja', ['as' => 'dashboard.ajax.satuan_kerja', 'uses' => 'Ajax\AjaxController@postSatuanKerja']);
        $this->router->post('/ajax/jabatan-struktural', ['as' => 'dashboard.ajax.jabatan_struktural', 'uses' => 'Ajax\AjaxController@postJabatanStruktural']);
        $this->router->post('/ajax/jabatan-struktural-detail', ['as' => 'dashboard.ajax.jabatan_struktural_detail', 'uses' => 'Ajax\AjaxController@postJabatanStrukturalDetail']);
        $this->router->post('/ajax/pegawai', ['as' => 'dashboard.ajax.pegawai', 'uses' => 'Ajax\AjaxController@postPegawai']);
    }
}
