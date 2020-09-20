<?php

use App\Model\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Alfredo',
            'last_name' => 'Lopez',
            'email' => 'admin@gmail.com',
            'phone' => '999999999',
            'image' => '',
            'password' => Hash::make('admin2020'),
            'created_at' => Carbon::now(),
            'is_actived' => 1,
        ]);
        $user->assignRole('administrador');

        $user = User::create([
            'name' => 'Jhon',
            'last_name' => 'Doe',
            'email' => 'editor@gmail.com',
            'phone' => '999999999',
            'image' => '',
            'password' => Hash::make('editor2020'),
            'created_at' => Carbon::now(),
            'is_actived' => 0,
        ]);
        $user->assignRole('editor');
    }
}
