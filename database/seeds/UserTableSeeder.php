<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'name' =>'kamal Uddin',
            'email'=>'admin@gmail.com',
            'contactNo'=>'01766789890',
            'password'=>bcrypt('admin123'),
            'status' =>'Active'

        ]);
    }
}
