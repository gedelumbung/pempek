
INSERT INTO `permissions` (`id`, `parent_id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1,	0,	'Master Data',	'master',	'Mengatur master data',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(2,	1,	'Golongan',	'golongan',	'Melakukan seluruh perintah di golongan',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(3,	1,	'Jabatan',	'jabatan',	'Melakukan seluruh perintah di jabatan',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(4,	1,	'Formasi Unit Kerja',	'unitkerja-master',	'Mengatur data master unit kerja',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(5,	0,	'Laporan',	'laporan',	'Melakukan seluruh perintah di laporan',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(6,	5,	'Duk',	'duk',	'Melakukan seluruh perintah di duk',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(7,	5,	'Nominatif',	'nominatif',	'Melakukan seluruh perintah di Nominatif',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(8,	5,	'Konfigurasi Pendidikan',	'konfigurasi-pendidikan',	'Melakukan seluruh perintah di Konfigurasi Pendidikan',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(9,	5,	'Konfigurasi Jabatan',	'konfigurasi-jabatan',	'Melakukan seluruh perintah di konfigurasi jabatan',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(10,	5,	'Konfigurasi Golongan',	'konfigurasi-golongan',	'Melakukan seluruh perintah di Konfigurasi Golongan',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(11,	5,	'Konfigurasi Usia',	'konfigurasi-usia',	'Melakukan seluruh perintah di Konfigurasi Usia',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(12,	5,	'Konfigurasi Jenis Kelamin',	'konfigurasi-jenis-kelamin',	'Melakukan seluruh perintah di Konfigurasi Jenis Kelamin',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(13,	0,	'Validasi',	'validasi',	'Melakukan seluruh perintah di validasi',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(14,	0,	'Pegawai',	'pegawai',	'Melakukan seluruh perintah di Pegawai',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(15,	14,	'List Pegawai',	'pegawai-all',	'Melihat List Pegawai',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(16,	14,	'Edit Pegawai',	'pegawai-edit',	'Dapat mengedit pegawai',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(17,	14,	'Tambah Pegawai',	'pegawai-add',	'Dapat menambahkan pegawai',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(18,	14,	'Detail Pegawai',	'pegawai-show',	'Dapat melihat detai pegawai',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(19,	14,	'Hapus Pegawai',	'pegawai-delete',	'Menghapus Pegawai',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(20,	0,	'Unit Kerja',	'unitkerja',	'Mengatur unit kerja',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(21,	20,	'Unit Kerja Ditjen dan Setditjen',	'unitkerja-ditjen-setditjen',	'Melakukan manajemen data untuk unit kerja DITJEN dan Setditjen',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(22,	20,	'Unit Kerja Bina Potensi',	'unitkerja-bina-potensi',	'Melakukan manajemen data untuk unit kerja Bina Potensi',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(23,	20,	'Unit Kerja P3KT',	'unitkerja-p3kt',	'Melakukan manajemen data untuk unit kerja P3KT',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(24,	20,	'Unit Kerja PTT',	'unitkerja-ptt',	'Melakukan manajemen data untuk unit kerja PTT',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(25,	20,	'Unit Kerja P2T',	'unitkerja-p2t',	'Melakukan manajemen data untuk unit kerja P2T',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(26,	20,	'Unit Kerja P3',	'unitkerja-p3',	'Melakukan manajemen data untuk unit kerja P3',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(27,	0,	'Permission',	'permission',	'Mengatur Permssion seluruh user',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(28,	0,	'Dashboard',	'dashboard',	'View Dashboard',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(29,	0,	'Front End',	'frontend',	'Melakukan seluruh perintah untuk mengubah front-end',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27'),
(30,	5,	'Alert Pensiun',	'alert-pensiun',	'Melakukan seluruh perintah di Alert Pensiun',	'2016-12-13 07:08:27',	'2016-12-13 07:08:27');

