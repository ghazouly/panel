<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Client;

class ClientsTableSeeder extends Seeder
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

  		foreach( range(1, 100) as $item )
  		{
  	        Client::create(array(
              'title' => $faker->name,
              'description' => $faker->realText(100),
              'status' => $faker->boolean,
              'contact_phone' => $faker->e164PhoneNumber,
              'contract_start_date' => $faker->date($format = 'Y-m-d', $max = '2016-08-05 08:37:17'),
              'contract_end_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
  	        ));
  		}
    }
}
