<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('url');
            $table->string('type')->nullable();
            $table->boolean('default')->default(0);
            $table->timestamps();
        });

        Schema::create('imageables', function (Blueprint $table) {
            $table->bigInteger('image_id')->unsigned();
            $table->morphs('imageable');
            $table->unique(['image_id', 'imageable_id', 'imageable_type']);
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imageables');
        Schema::dropIfExists('images');
    }
}
