<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('report_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();
            $table->string('name');
            $table->timestamps();
        });
    }
}
