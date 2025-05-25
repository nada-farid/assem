<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('course_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('beneficiar_count')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
