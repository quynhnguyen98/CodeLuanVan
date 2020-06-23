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
       		'id_taikhoan'=>1,
       		'tendangnhap'=>'asd',
       		'matkhau'=>bcrypt('123456'),
       		'vaitro'=>'tanhvien',
       		'email'=>'asdasd@gmail.com',
       ];
       DB::table('taikhoan')->insert($data);
    }
}
