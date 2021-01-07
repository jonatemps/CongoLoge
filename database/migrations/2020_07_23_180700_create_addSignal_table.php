<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddSignalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addSignals', function (Blueprint $table) {
            $table->id();
            $table->string('nameProp')->nullable();
            $table->integer('phoneProp')->nullable();
            $table->string('adressProp')->nullable();

            $table->unsignedBigInteger('userId')->nullable();
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');

            $table->string('category');
            $table->string('destination');
            $table->string('image');
            $table->string('ville');
            $table->string('commune');
            $table->integer('chambre');
            $table->integer('cuisine');
            $table->integer('baignoire');
            $table->integer('garage');
            $table->string('adress');
            $table->integer('prix');
            $table->string('detail');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
