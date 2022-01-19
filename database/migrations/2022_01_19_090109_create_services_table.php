<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('dso_id')->nullable()->constrained('d_s_o_s')->onDelete('cascade');
            $table->foreignId('witel1_id')->nullable()->constrained('witel1s')->onDelete('cascade');
            $table->foreignId('witel2_id')->nullable()->constrained('witel2s')->onDelete('cascade');
            $table->foreignId('witel3_id')->nullable()->constrained('witel3s')->onDelete('cascade');
            $table->foreignId('witel4_id')->nullable()->constrained('witel4s')->onDelete('cascade');
            $table->foreignId('witel5_id')->nullable()->constrained('witel5s')->onDelete('cascade');
            $table->foreignId('witel6_id')->nullable()->constrained('witel6s')->onDelete('cascade');
            $table->foreignId('witel7_id')->nullable()->constrained('witel7s')->onDelete('cascade');
            $table->foreignId('witel8_id')->nullable()->constrained('witel8s')->onDelete('cascade');
            $table->foreignId('witel9_id')->nullable()->constrained('witel9s')->onDelete('cascade');
            $table->foreignId('witel10_id')->nullable()->constrained('witel10s')->onDelete('cascade');
            $table->foreignId('witel11_id')->nullable()->constrained('witel11s')->onDelete('cascade');
            $table->foreignId('witel12_id')->nullable()->constrained('witel12s')->onDelete('cascade');
            $table->foreignId('witel13_id')->nullable()->constrained('witel13s')->onDelete('cascade');
            $table->foreignId('mso_id')->nullable()->constrained('m_s_o_s')->onDelete('cascade');
            $table->foreignId('rno_id')->nullable()->constrained('r_n_o_s')->onDelete('cascade');
            $table->foreignId('sigma_id')->nullable()->constrained('sigmas')->onDelete('cascade');
            $table->foreignId('dss_id')->nullable()->constrained('d_s_s')->onDelete('cascade');
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
        Schema::dropIfExists('services');
    }
}
