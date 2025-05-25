<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewssTable extends Migration
{
    public function up()
    {
        Schema::create('newss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('short_description');
            $table->longText('description');
            $table->longText('description_2');
            $table->integer('views')->nullable();
            $table->string('video_url')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }
}