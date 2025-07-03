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
            $table->longText('description');
            $table->string('title');
            $table->longText('short_description')->nullable();
            $table->string('type')->nullable();
            $table->string('trainer')->nullable();
            $table->string('video_url');
            $table->string('duration');
            $table->string('duration_weekly');
            $table->boolean('avaliable')->default(0)->nullable();
            $table->datetime('start_at')->nullable();
            $table->datetime('end_at')->nullable();
            $table->string('assistant')->nullable();
            $table->decimal('support_value', 15, 2);
            $table->integer('number_supported');
            $table->string('location')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}