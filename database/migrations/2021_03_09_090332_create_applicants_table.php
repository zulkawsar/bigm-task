<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('email')->unique();
            $table->text('mailing_address');
            $table->bigInteger('division_id')->unsigned();
            $table->bigInteger('district_id')->unsigned();
            $table->bigInteger('thana_upzila_id')->unsigned();
            $table->text('address_details');
            $table->string('language');
            $table->longText('education');
            $table->longText('training');
            $table->boolean('status')->default(1);

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
        Schema::dropIfExists('applicants');
    }
}
