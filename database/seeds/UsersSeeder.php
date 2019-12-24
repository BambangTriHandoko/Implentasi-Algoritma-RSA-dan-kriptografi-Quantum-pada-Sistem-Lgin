<?php

use Illuminate\Database\Seeder;

//menambahkan faker
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // data faker indonesia
        $faker = Faker::create('id_ID');
 
        // membuat data dummy sebanyak 10 record
        for($x = 1; $x <= 10; $x++){
 
        	// insert data dummy users dengan faker
        	DB::table('users')->insert([
        		'nik' => $faker->p->unique(),
        		'username' => $faker->userName,
        		'password' => md5($faker->password),
        		'email' => $faker->email,
        		'user_level' => 1,
        		'created_at' => now(),
        		'updated_at' => now(),
        	]);
 
        }
    }
}
