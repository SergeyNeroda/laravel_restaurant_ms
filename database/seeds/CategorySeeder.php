<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert(
          [
            [
              'name'=>'Випічка',
            ],
            [
              'name'=>'Гарніри',
            ],
            [
              'name'=>'Десерти',
            ],
            [
              'name'=>'Закуски',
            ],
            [
              'name'=>'Каші',
            ],
            [
              'name'=>"М'ясні страви",
            ],
            [
              'name'=>'Овочеві страви',
            ],
            [
              'name'=>'Рибні страви',
            ],
            [
              'name'=>'Салати',
            ],
            [
              'name'=>'Фруктові страви',
            ]
          ]
        );
    }
}
