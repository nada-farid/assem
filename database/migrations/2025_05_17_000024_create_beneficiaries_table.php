<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariesTable extends Migration
{
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('birth_date')->nullable();
            $table->string('identity_number');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10573079')->references('id')->on('users');
            $table->timestamps();
        });
    }
}
