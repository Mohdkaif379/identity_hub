<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('center_details', function (Blueprint $table) {
            $table->id();

            $table->string('alias')->nullable();
            $table->string('ecn')->nullable();
            $table->date('doj')->nullable(); // date of joining
            $table->string('centername')->nullable();
            $table->string('name')->nullable();
            $table->string('projectscode')->nullable();
            $table->string('crmid')->nullable();

            $table->string('password'); // encrypted password
            $table->string('email')->unique();

            $table->enum('gender', ['male', 'female', 'other'])->nullable();

            $table->enum('kyc_status', ['pending', 'done', 'rekyc', 'not_done'])
                ->default('pending');

            $table->string('created_by_my_side')->nullable();
            $table->string('created_by')->nullable();
            $table->string('approved_by')->nullable();

            $table->string('ip_address')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('center_details');
    }
};
