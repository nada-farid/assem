<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCoursesTable extends Migration
{
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_10556535')->references('id')->on('categories');
            $table->unsignedBigInteger('center_id')->nullable();
            $table->foreign('center_id', 'center_fk_10556554')->references('id')->on('centers');
        });
    }
}
