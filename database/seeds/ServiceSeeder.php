<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('services')->insert([
        	[
            'name' => 'Skin',
            'description' => '',
        	] ,
        	[
            'name' => 'Hair',
            'description' => '',
        	] ,
        	[
            'name' => 'Weight Loss',
            'description' => '',
        	] 
        	 
        ]);
    }
}
