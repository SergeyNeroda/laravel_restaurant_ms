<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name_ingredient');
            $table->integer('supplier_id')->unsigned();
            //зовнішній ключ
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onUpdate('cascade')->onDelete('cascade');
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
      Schema::table('ingredients', function (Blueprint $table) {
        $table->dropForeign('ingredients_supplier_id_foreign');
      });
        Schema::dropIfExists('ingredients');
    }
}
