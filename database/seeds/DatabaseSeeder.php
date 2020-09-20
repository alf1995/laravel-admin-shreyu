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
    	$this->call(PermissionTableSeed::class);
        $this->call(RoleTableSeed::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
