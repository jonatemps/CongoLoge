<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->integer('author_id')->nullable();
            $table->unsignedBigInteger('commune_id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('description');
            $table->integer('chambre');
            $table->integer('cuisine');
            $table->integer('baignoire');
            $table->string('adresse');
            $table->enum('status', ['PUBLIE', 'ATTENTE', 'ARCHIVE'])->default('PUBLIE');
            $table->boolean('En_vedette');
            $table->enum('destination', ['VENTE', 'LOCATION'])->default('location');
            $table->integer('price');
            $table->string('image');
            $table->timestamps();

            $table->foreign('commune_id')->references('id')->on('communes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biens');
    }
}
