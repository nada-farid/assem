<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCourseRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('course_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_10573073')->references('id')->on('courses');
            $table->unsignedBigInteger('association_id')->nullable();
            $table->foreign('association_id', 'association_fk_10573074')->references('id')->on('associations');
        });
    }
}
