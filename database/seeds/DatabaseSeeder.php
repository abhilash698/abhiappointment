<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(RolesTableSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(AppointmentSeeder::class);

        Model::reguard();
    }
}
