<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('products')->insert(
          [
            [
              'name'=>'Яєшня з помідорами та грибами',
              'code'=>'1',
              'price'=>'345',
              'info'=>'Напої',
              'id_category'=>'3',
              'image'=>'img-1203-50-.jpg',
              'spl_price'=>'345',
            ],
            [
              'name'=>'Деруни з сиром',
              'code'=>'2',
              'price'=>'345',
              'info'=>'Напої',
              'id_category'=>'5',
              'image'=>'6437tigyuek.jpg',
              'spl_price'=>'345',
            ],
            [
              'name'=>"Млинці з м'ясом",
              'code'=>'3',
              'price'=>'467',
              'info'=>'Напої',
              'id_category'=>'2',
              'image'=>'754787007675254.png',
              'spl_price'=>'345',
            ],
            [
              'name'=>'Вінегрет овочевий',
              'code'=>'4',
              'price'=>'467',
              'info'=>'Напої',
              'id_category'=>'3',
              'image'=>'Кошерная-еда.jpg',
              'spl_price'=>'345',
            ]
          ]
        );
    }
}
