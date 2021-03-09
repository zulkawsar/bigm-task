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
        $user = array(
                'email'=>'admin@bigm.com',
                'password'=>'$2y$12$Z5eO9kb92Q1iScECFMiIOuFx5zd20tyrb1mRbe0CvhNdJd2KpnLoa', //123123
                'name'	=> 'Admin',
                'remember_token'=>'0zY0oKxRmm5cdgLdUHzNZ4tRwzaZl5rqqkXA2EYx2tjcs11D9tbDajIwfht2'
        );
        DB::table('users')->truncate();
		App\User::create($user);
    }
}
