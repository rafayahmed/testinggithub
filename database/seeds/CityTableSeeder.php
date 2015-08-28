<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		DB::table('city')->delete();
 
		$city = array(
		array('id' => 1, 'code' => '1', 'name' => 'karachi', 'country_id' => 163 ),
		array('id' => 2, 'code' => '2', 'name' => 'lahore', 'country_id' => 163 ),
		array('id' => 3, 'code' => '2', 'name' => 'Islamabad', 'country_id' => 163 ),
		array('id' => 4, 'code' => '3', 'name' => 'Peshawr', 'country_id' => 163 ),
		array('id' => 5, 'code' => '3', 'name' => 'Kohat', 'country_id' => 163 ),
		array('id' => 6, 'code' => '3', 'name' => 'Mardan', 'country_id' => 163 ),
		array('id' => 7, 'code' => '2', 'name' => 'Dubai', 'country_id' => 163 ),
		array('id' => 8, 'code' => '2', 'name' => 'Liyari', 'country_id' => 163 ),
		array('id' => 9, 'code' => '2', 'name' => 'Defence', 'country_id' => 163 ),
		array('id' => 10, 'code' => '2', 'name' => 'United States', 'country_id' => 163 ),
		array('id' => 11, 'code' => '2', 'name' => 'United States', 'country_id' => 163 ),
		);
 
		DB::table('city')->insert($city);
    }
}
