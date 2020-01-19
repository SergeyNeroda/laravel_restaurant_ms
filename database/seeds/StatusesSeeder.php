<?php

use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('statuses')->insert(
          [
            [
              'name'=>'Відправлено на кухню',
            ],
            [
              'name'=>'Готується',
            ],
            [
              'name'=>'Готове',
            ],
            [
              'name'=>'Отримано клієнтом',
            ],

          ]
        );
    }
}
