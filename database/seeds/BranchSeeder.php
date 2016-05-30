<?php

use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('branches')->insert([
        	[
            'name' => 'vellore',
            'display_name' => 'Vellore',
            'address' => 'Beside Kp Cafe, Vellore',
            'description' => '',
        	] ,
        	[
            'name' => 'chennai',
            'display_name' => 'Chennai',
            'email' => 'Opp KFC , Chennai',
            'password' => bcrypt('secret'),
        	],
        	[
            'name' => 'tnagar',
            'display_name' => 'TNagar',
            'email' => 'Opp Chandana Bros , TNagar',
            'description' => '',
        	]
        ]);
    }
}
