<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanqsTable extends Migration
{
    public function up()
    {
        Schema::create('banqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bank_name');
            $table->string('bank_number');
            $table->string('iban');
            $table->timestamps();
        });
    }
}
