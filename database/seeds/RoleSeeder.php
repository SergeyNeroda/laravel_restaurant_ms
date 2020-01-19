<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert(
          [
            // [
            //   'name'=>'client',
            // ],
            // [
            //   'name'=>'cashier',
            // ],
            [
              'name'=>'cook',
            ],
            [
              'name'=>'waiter',
            ],
            [
              'name'=>'admin',
            ]
          ]
        );
    }
}
