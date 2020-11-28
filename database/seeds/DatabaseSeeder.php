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
        \App\User::insert([
            [
             
              'name'  			=> 'Arsya',
              
              'email' 			=> 'arsya@gmail.com',
              'password'		=> bcrypt('arsya123'),
              'status'          => 1,
              'role'			=> 'admin',
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ]
            // ,
            // [
              
            //   'name'  			=> 'ridwan muhammad',
             
            //   'email' 			=> 'ridwan@gmail.com',
            //   'password'		=> bcrypt('ridwan123'),
           
            //   'role'			=> 'karyawan',
            //   'remember_token'	=> NULL,
            //   'created_at'      => \Carbon\Carbon::now(),
            //   'updated_at'      => \Carbon\Carbon::now()
            // ],
            // [
              
            //     'name'  			=> 'Muja',
               
            //     'email' 			=> 'muja@gmail.com',
            //     'password'		=> bcrypt('muja123'),
             
            //     'role'			=> 'anggota',
            //     'remember_token'	=> NULL,
            //     'created_at'      => \Carbon\Carbon::now(),
            //     'updated_at'      => \Carbon\Carbon::now()
            //   ]
        ]);
    }
 }

