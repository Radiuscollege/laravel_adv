<?php

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
        factory(\App\User::class, 40)->create()->each( function($user) {
            $user->todos()->saveMany( factory(\App\Todo::class, rand(0, 15))->make() );
        });

        // make a test account
        $user = \App\User::create([
           'name' => 'test2',
           'email' => 'test2@gmail.com',
           'password' => bcrypt('Welkom123')
        ]);

        // add to do items to test account
        $user->todos()->saveMany( factory(\App\Todo::class, rand(0, 15))->make() );



    }
}
