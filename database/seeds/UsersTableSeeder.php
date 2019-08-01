<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name'          => 'Administrador', 
            'email'         => 'admin@fab.mil.br', 
            'password'      => bcrypt(123456),
            'created_at'    => Carbon::now()
            ]);
    }
}
