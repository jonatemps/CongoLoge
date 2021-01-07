<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BienLikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bien_like', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bien_id');
            $table->foreign('bien_id')
                  ->references('id')
                  ->on('biens')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('like_id');
            $table->foreign('like_id')
                  ->references('id')
                  ->on('likes')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('bien_like');
    }
}
