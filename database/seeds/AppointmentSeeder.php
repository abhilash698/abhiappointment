<?php

use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Customer::class, 100)->create()->each(function($u) {
            $u->Appointments()->saveMany(factory(App\Appointment::class,4)->make());
        });
    }
}
