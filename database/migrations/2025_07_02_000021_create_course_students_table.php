<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('course_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('identity_num')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('registered')->nullable();
            $table->string('certificate')->nullable();
            $table->longText('description')->nullable();
            $table->string('relevance')->nullable();
            $table->string('attend_course')->nullable();
            $table->string('course_name')->nullable();
            $table->string('course_trainer')->nullable();
            $table->string('transportaion')->nullable();
            $table->string('prev_exper')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('request_certificate')->default(0);
            $table->string('email_certificate')->nullable();
            $table->text('courses_before')->nullable();
            $table->boolean('approved')->default(false);
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_8821564')->references('id')->on('courses');
            $table->unsignedBigInteger('association_id')->nullable();
            $table->foreign('association_id', 'association_fk_10573079')->references('id')->on('associations');
            $table->unsignedBigInteger('course_request_id')->nullable();
            $table->foreign('course_request_id','course_reques_fk_10573088')->references('id')->on('course_requests')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
