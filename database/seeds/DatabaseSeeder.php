<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $data=[
       		'tendangnhap'=>'asdasdasd',
       		'password'=>bcrypt('123456'),
       		'vaitro'=>'tanhvien',
            'id_nguoi'=>1,
            'email'=>'asdasd@gmail.com',
       ];
       DB::table('taikhoan')->insert($data);
    }
}
