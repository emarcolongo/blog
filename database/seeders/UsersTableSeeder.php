<?php

namespace Database\Seeders;

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
        /*
        \DB::table('users')->insert([
            'name'=>'Primeiro Usuario',
            'email'=>'email@email',
            'password'=>bcrypt('secret')
        ]);
        */
        //factory(\App\User::class, 9)->create();
        \App\Models\User::factory()->count(9)->create();
    }
}
