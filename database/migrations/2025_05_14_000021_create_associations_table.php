<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociationsTable extends Migration
{
    public function up()
    {
        Schema::create('associations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('manager')->nullable();
            $table->integer('license_number')->nullable();;
            $table->string('beneficiaries_count')->nullable();
            $table->string('phone')->nullable();;
            $table->string('address')->nullable();;
            $table->longText('bref')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linked_in')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
