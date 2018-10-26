<?php

use Illuminate\Database\Seeder;

class m_MahasiswasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      m_mahasiswas::truncate();

      $faker = \Faker\Factory::create();

      // And now, let's create a few articles in our database:
      for ($i = 0; $i < 50; $i++) {
          m_mahasiswas::create([
            'id' => $faker->rand(),
            'nim' => $faker->sentence,
            'matkul' =>$faker->sentence,
            'semester'=>$faker->rand(),
            'imei'=>$faker->rand(),
          ]);
      }
    }
}
