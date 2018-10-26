<?php

use Illuminate\Database\Seeder;

class m_DosensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      m_dosens::truncate();

      $faker = \Faker\Factory::create();

      // And now, let's create a few articles in our database:
      for ($i = 0; $i < 50; $i++) {
          m_dosens::create([
            'body' => $faker-> paragraph,
            'id'=> $faker -> rand(),
            'nama_dosen'=> $faker -> sentence,
            'matkul'=> $faker -> sentence,
            'ruang kelas' => $faker -> sentence,
            $table->timestamps(),
          ]);
      }
    }
}
