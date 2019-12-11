<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create(["name"=>"Eduardo","email"=>"jesus@gmail.com","password"=>"password"]);
        // User::create(["name"=>"Karely","email"=>"karely@gmail.com","password"=>"password"]);
        factory(\App\User::class)->times(40)->create();

    }
}
