<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ProjectInfoSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(TransactionSeeder::class);
    }
}
