
INSERT INTO `menu` (`id`, `parent_id`, `permission_id`, `title`, `url`, `enable`, `order`, `icon`, `created_at`, `updated_at`) VALUES
(1,	0,	28,	'Dashboard',	'dashboard.home',	1,	0,	'fa fa-dashboard fa-5x',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(2,	0,	15,	'Pegawai',	'dashboard.pegawai',	1,	1,	'fa fa-users fa-5x',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(3,	0,	27,	'Administrator',	'#',	1,	2,	'fa fa-cogs',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(4,	3,	27,	'Roles',	'dashboard.roles',	1,	0,	'fa fa-user',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(5,	3,	27,	'Users',	'dashboard.users',	1,	1,	'fa fa-users',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(6,	3,	27,	'Permision',	'dashboard.permissions',	1,	2,	'fa fa-lock',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(7,	0,	0,	'Master Data',	'#',	1,	3,	'fa fa-wrench',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(8,	7,	2,	'Pangkat dan Golongan',	'dashboard.golongan',	1,	0,	'fa fa-pencil',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(9,	7,	3,	'Jabatan Struktural',	'dashboard.jabatan_struktural',	1,	1,	'fa fa-pencil',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(10,	7,	4,	'Formasi Unit Kerja',	'dashboard.unit_kerja',	1,	2,	'fa fa-pencil',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(11,	0,	13,	'Validasi Data',	'dashboard.validasi_data',	1,	4,	'fa fa-check-square-o',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(12,	0,	29,	'Frontend Settings',	'#',	1,	5,	'fa fa-cogs',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(13,	12,	29,	'Pengumuman',	'dashboard.pengumuman',	1,	0,	'fa fa-pencil',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(14,	12,	29,	'Slider',	'dashboard.sliders',	1,	1,	'fa fa-pencil',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(15,	12,	29,	'Settings',	'dashboard.settings',	1,	2,	'fa fa-pencil',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(16,	0,	0,	'Laporan',	'#',	1,	6,	'fa fa-file-text',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(17,	16,	6,	'Laporan DUK',	'dashboard.laporan.duk',	1,	0,	'fa fa-pencil',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(18,	16,	7,	'Laporan Nominatif',	'dashboard.laporan.nominatif',	1,	1,	'fa fa-pencil',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(19,	16,	8,	'Laporan Konfirgurasi Pendidikan',	'dashboard.laporan.pendidikan',	1,	2,	'fa fa-pencil',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(20,	16,	9,	'Laporan Konfirgurasi Jabatan',	'dashboard.laporan.jabatan',	1,	3,	'fa fa-pencil',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(21,	16,	10,	'Laporan Konfirgurasi Golongan',	'dashboard.laporan.golongan',	1,	4,	'fa fa-pencil',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(22,	16,	11,	'Laporan Konfirgurasi Usia',	'dashboard.laporan.usia',	1,	5,	'fa fa-pencil',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(23,	16,	12,	'Laporan Konfirgurasi Jenis Kelamin',	'dashboard.laporan.jenis_kelamin',	1,	6,	'fa fa-pencil',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15'),
(24,	16,	30,	'Laporan Alert Pensiun',	'dashboard.laporan.alert_pensiun',	1,	7,	'fa fa-pencil',	'2017-01-15 06:11:15',	'2017-01-15 06:11:15');


