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
            $table->timestamps();
            $table->string('firstname', 255)->nullable();
            $table->string('surname', 500)->nullable();
            $table->string('email', 500)->nullable();
            $table->decimal('age', 22)->nullable()->default(0);
            $table->string('about', 500)->nullable();
            $table->string('category', 255)->nullable();
            $table->string('file', 500)->nullable();
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
