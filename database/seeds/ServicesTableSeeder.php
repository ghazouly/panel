<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Create a Faker object
  		$faker = Faker\Factory::create();

  		foreach( range(1, 200) as $item )
  		{
  	        Service::create(array(
              'title' => $faker->realText(25),
              'type' => $faker->randomElement($array = array('Facebook','Youtube','Twitter','Instagram')),
              'client_id' => $faker->numberBetween($min = 1, $max = 100),
              'description' => $faker->realText(100),
              'link' => $faker->url,
  	        ));
  		}
    }
}
