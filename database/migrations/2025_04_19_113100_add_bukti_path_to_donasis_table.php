<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('donasis', function (Blueprint $table) {
            $table->string('bukti_path')->nullable()->after('keterangan');
        });
    }

    public function down(): void
    {
        Schema::table('donasis', function (Blueprint $table) {
            $table->dropColumn('bukti_path');
        });
    }
};
