<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportersTable extends Migration
{
    public function up()
    {
        Schema::create('supporters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('phone')->unique();
            $table->string('email')->unique();
            $table->string('official_name')->nullable();
            $table->integer('official_phone')->nullable();
            $table->string('official_email')->nullable();
            $table->timestamps();
        });
    }
}
