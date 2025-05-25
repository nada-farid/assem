<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeedsTable extends Migration
{
    public function up()
    {
        Schema::create('needs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('reason');
            $table->timestamps();
        });
    }
}
