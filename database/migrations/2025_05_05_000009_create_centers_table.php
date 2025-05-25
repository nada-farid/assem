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
            $table->integer('experience_years');
            $table->integer('beneficiar_count');
            $table->longText('description');
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linked_in')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
