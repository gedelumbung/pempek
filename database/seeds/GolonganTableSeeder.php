<?php

use Illuminate\Database\Seeder;

use Simpeg\Model\Golongan;

class GolonganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('golongan')->truncate();

        $params = [
        	[
        		'title'	=> 'I/a',
        		'description'	=>	'Juru Muda'
        	],
        	[
        		'title'	=> 'I/b',
        		'description'	=>	'Juru Muda Tk. I'
        	],
        	[
        		'title'	=> 'I/c',
        		'description'	=>	'Juru'
        	],
        	[
        		'title'	=> 'I/d',
        		'description'	=>	'Juru Tk. I'
        	],
        	[
        		'title'	=> 'II/a',
        		'description'	=>	'Pengatur Muda'
        	],
        	[
        		'title'	=> 'II/b',
        		'description'	=>	'Pengatur Muda Tk. I'
        	],
        	[
        		'title'	=> 'II/c',
        		'description'	=>	'Pengatur'
        	],
        	[
        		'title'	=> 'II/d',
        		'description'	=>	'Pengatur Tk. I'
        	],
        	[
        		'title'	=> 'III/a',
        		'description'	=>	'Penata Muda'
        	],
        	[
        		'title'	=> 'III/b',
        		'description'	=>	'Penata Muda Tk. I'
        	],
        	[
        		'title'	=> 'III/c',
        		'description'	=>	'Penata'
        	],
        	[
        		'title'	=> 'III/d',
        		'description'	=>	'Penata Tk. I'
        	],
        	[
        		'title'	=> 'IV/a',
        		'description'	=>	'Pembina'
        	],
        	[
        		'title'	=> 'IV/b',
        		'description'	=>	'Pembina Tk. I'
        	],
        	[
        		'title'	=> 'IV/c',
        		'description'	=>	'Pembina Utama Muda'
        	],
        	[
        		'title'	=> 'IV/d',
        		'description'	=>	'Pembina Utama Madya'
        	],
        	[
        		'title'	=> 'IV/e',
        		'description'	=>	'Pembina Utama'
        	],
        ];

        foreach ($params as $param) {
            Golongan::create([
                'title' => $param['title'],
                'description' => $param['description']
            ]);
        }
    }
}
