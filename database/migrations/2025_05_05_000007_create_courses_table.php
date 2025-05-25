<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('start_at');
            $table->date('end_at');
            $table->longText('description');
            $table->string('title');
            $table->longText('short_description')->nullable();
            $table->string('type')->nullable();
            $table->string('trainer')->nullable();
            $table->string('video_url');
            $table->string('duration');
            $table->string('duration_weekly');
            $table->integer('beneficiary_count')->nullable();
            $table->longText('goals');
            $table->boolean('avaliable')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
