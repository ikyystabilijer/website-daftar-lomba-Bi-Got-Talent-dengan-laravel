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
        Schema::table('pendaftarans', function (Blueprint $table) {
            // Kolom text opsional (nullable) untuk feedback/alasan juri
            $table->text('catatan_juri')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->dropColumn('catatan_juri');
        });
    }
};
