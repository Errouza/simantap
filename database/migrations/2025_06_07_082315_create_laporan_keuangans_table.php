<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('laporan_keuangans', function (Blueprint $table) {
        $table->id();
        $table->enum('jenis', ['pemasukan', 'pengeluaran']);
        $table->date('tanggal');
        $table->string('keterangan');
        $table->decimal('jumlah', 15, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_keuangans');
    }
};
