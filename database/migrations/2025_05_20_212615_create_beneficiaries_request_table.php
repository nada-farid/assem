<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('course_request_beneficiary', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_request_id')->constrained()->onDelete('cascade');
            $table->foreignId('beneficiary_id')->constrained()->onDelete('cascade');
            $table->float('evaluation_score')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_request_beneficiary');
    }
}
;
