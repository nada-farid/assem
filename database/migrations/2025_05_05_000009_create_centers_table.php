<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentersTable extends Migration
{
    public function up()
    {
        Schema::create('centers', function (Blueprint $table) {
        $table->bigIncrements('id');
            $table->string('name');
            $table->string('specialization');
            $table->integer('experience_years')->nullable();
            $table->integer('beneficiar_count')->nullable();
            $table->longText('description');
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linked_in')->nullable();
            $table->string('location')->nullable();
            $table->string('website')->nullable();
            $table->string('license_number')->nullable();
            $table->date('end_date')->nullable();
            $table->string('director_name')->nullable();
            $table->integer('director_phone')->nullable();
            $table->string('director_email')->nullable();
            $table->string('coordinator_name')->nullable();
            $table->integer('coordinator_phone')->nullable();
            $table->string('coordinator_email')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
