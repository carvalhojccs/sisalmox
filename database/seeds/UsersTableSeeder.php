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
            'local_id'      => null,
            'name'          => 'Administrador', 
            'email'         => 'admin@fab.mil.br', 
            'password'      => bcrypt(123456),
            'created_at'    => Carbon::now()
            ]);
        User::insert([
            'local_id'      => null,
            'name'          => '1T Dyego', 
            'email'         => 'dyegodos@fab.mil.br', 
            'password'      => bcrypt(123456),
            'created_at'    => Carbon::now()
            ]);
        User::insert([
            'local_id'      => null,
            'name'          => '1S Casanova', 
            'email'         => 'casanovarcos@fab.mil.br', 
            'password'      => bcrypt(123456),
            'created_at'    => Carbon::now()
            ]);
        User::insert([
            'local_id'      => null,
            'name'          => '2S Dilson', 
            'email'         => 'dilson@fab.mil.br', 
            'password'      => bcrypt(123456),
            'created_at'    => Carbon::now()
            ]);
    }
}
