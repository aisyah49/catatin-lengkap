<?php

use App\Support\CatatinTriggers;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Kolom baru di barang: selling_price_box = "Harga Jual Per Dus" (opsional).
 * Trigger riwayat dibuat ulang supaya snapshot "Urungkan" ikut menyimpan kolom ini.
 */
return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('products', 'selling_price_box')) {
            Schema::table('products', fn (Blueprint $t) => $t->unsignedBigInteger('selling_price_box')->nullable()->after('selling_price'));
        }
        if (DB::getDriverName() === 'mysql') {
            CatatinTriggers::install();
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('products', 'selling_price_box')) {
            Schema::table('products', fn (Blueprint $t) => $t->dropColumn('selling_price_box'));
        }
    }
};
