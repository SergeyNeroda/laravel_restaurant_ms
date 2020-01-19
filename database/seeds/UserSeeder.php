<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert(
          [
            [
              'name'=>'admin',
              'email' => 'admin.admin@gmail.com',
              'password' => bcrypt('12345678'),
              'role_id' => 3,
            ],
            // [
            //   'name'=>'Cashier',
            //   'email' => 'anna.n@gmail.com',
            //   'password' => bcrypt('12345678'),
            //   'role_id' => 2,
            // ],
            [
              'name'=>'Cook',
              'email' => 'cook.cook@gmail.com',
              'password' => bcrypt('12345678'),
              'role_id' => 1,
            ],
            [
              'name'=>'Waiter',
              'email' => 'waiter.waiter@gmail.com',
              'password' => bcrypt('12345678'),
              'role_id' => 2,
            ],
            // [
            //   'name'=>'Client',
            //   'email' => 'client.c@gmail.com',
            //   'password' => bcrypt('12345678'),
            //   'role_id' => 1,
            // ]
          ]
        );
    }
}
