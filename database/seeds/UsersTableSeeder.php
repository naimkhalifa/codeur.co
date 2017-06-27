<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

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
    		'name' => env('ADMIN_USERNAME', 'admin'),
			'email' => env('ADMIN_EMAIL', 'admin@example.com'),
			'password' => bcrypt(env('ADMIN_PWD', '1234')),
			'type' => 'admin',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
    	]);
    }
}
