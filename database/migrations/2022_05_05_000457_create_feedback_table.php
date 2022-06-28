<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id")->unsigned();
            $table->integer("product_id")->unsigned();
            $table->longText("feedback");
            $table->integer("rating");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")
            ->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("product_id")->references("id")->on("products")
            ->onDelete("cascade")->onUpdate("cascade");
        });
    }


    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
};
