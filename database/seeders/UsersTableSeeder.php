<?php

namespace Database\Seeders;


use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            //admin
            [
                'name' => 'Admin',
                'username'=>'admin',
                'email'=>  'admin@gmail.com',
                'password'=> Hash::make('111'),
                'role'=>'Admin',
                'status' => 'Active',
            ],



            //agent
            [
                'name' => 'Agent',
                'username'=>'agent',
                'email'=>  'agent@gmail.com',
                'password'=> Hash::make('111'),
                'role'=>'agent',
                'status' => 'Active',
            ],


            //user
            [
                'name' => 'User',
                'username'=>'user',
                'email'=>  'user@gmail.com',
                'password'=> Hash::make('111'),
                'role'=>'user',
                'status' => 'Active',
            ]
            ]);
           
    }
}
