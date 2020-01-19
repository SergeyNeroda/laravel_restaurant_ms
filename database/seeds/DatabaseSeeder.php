<?php

use Illuminate\Database\Seeder;
//php artisan make:seeder ArticlesSeeder -- приклад
//php artisan db:seed
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(CategorySeeder::class);
        $this->call(ProductsSeeder::class);
        //$this->call(RoleSeeder::class);
        //$this->call(UserSeeder::class);
        //$this->call(StatusesSeeder::class);
    }
}
