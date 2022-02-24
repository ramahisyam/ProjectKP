<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackroomStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backroom_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('backroom_id')->constrained('backrooms')->onDelete('cascade');
            $table->foreignId('customer_request_id')->constrained('customer_requests')->onDelete('cascade');
            $table->enum('name', ['Waiting to Process', 'Not Ready', 'Ready']);
            $table->string('image')->nullable();
            $table->string('information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('backroom_statuses');
    }
}
