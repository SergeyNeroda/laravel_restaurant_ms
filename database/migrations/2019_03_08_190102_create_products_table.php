<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('code');
            $table->integer('price');
            $table->text('info');
            $table->integer('id_category')->unsigned();
            //зовнішній ключ
            $table->foreign('id_category')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->integer('spl_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('products', function (Blueprint $table) {
      $table->dropForeign('products_id_category_foreign');
    });
        Schema::dropIfExists('products');
    }
}
