<?php

use Illuminate\Database\Seeder;

class m_AbsensisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      m_absensis::truncate();

      $faker = \Faker\Factory::create();

      // And now, let's create a few articles in our database:
      for ($i = 0; $i < 50; $i++) {
          m_absensis::create([
            'body' => $faker->paragraph,
            'id' => $faker -> rand(),
            'idDosen' => $faker -> rand(),
            'idMahasiswa' => $faker -> rand(),
            'matkul' => $faker -> sentence,
            'ruang kelas' => $faker -> sentence,
          ]);
      }
    }
}
