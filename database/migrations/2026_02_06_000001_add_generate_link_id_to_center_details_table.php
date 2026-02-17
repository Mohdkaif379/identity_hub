<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('center_details', function (Blueprint $table) {
            $table->unsignedBigInteger('generate_link_id')->nullable()->after('approved_by');
            $table->index('generate_link_id', 'center_details_generate_link_id_index');
        });
    }

    public function down(): void
    {
        Schema::table('center_details', function (Blueprint $table) {
            $table->dropIndex('center_details_generate_link_id_index');
            $table->dropColumn('generate_link_id');
        });
    }
};
