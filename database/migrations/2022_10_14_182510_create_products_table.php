<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger("category_id");
            $table->string('name');
            $table->string('slug');
            $table->string('brand')->nullable();
            $table->mediumText("small_description")->nullable();
            $table->longText("description")->nullable();

            $table->integer("original_price");
            $table->integer("selling_price");
            $table->integer("quantity");
            $table->tinyInteger("trending")->default(0)->comment('1 => treanding, 0 => not trending');
            $table->tinyInteger("status")->default(0)->comment("1=hidden, 0=visible");


            $table->string('meta_title');
            $table->mediumText('meta_description');
            $table->mediumText('meta_keyword');


            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
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
        Schema::dropIfExists('products');
    }
}
