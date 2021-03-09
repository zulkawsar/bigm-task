<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThanaUpzilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thana_upzilas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('district_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thana_upzilas');
    }
}
