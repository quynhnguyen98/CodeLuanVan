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
       		'tendangnhap'=>'user123',
       		'password'=>bcrypt('user123'),
       		'vaitro'=>'{"4":"4","6":"6","3":"3","0":"0"}',
          'id'=>111,
          'email'=>'abc@gmail.com',
       ];
       DB::table('taikhoan')->insert($data);
    }
}
