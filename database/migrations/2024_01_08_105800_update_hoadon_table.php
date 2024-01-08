<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('hoadon', function (Blueprint $table) {
            $table->bigInteger('maps')->unsigned()->comment('mã phiếu sửa');
            $table->foreign('maps')->references('id')->on('phieusua');
            $table->bigInteger('manv')->unsigned()->comment('mã nhân viên');
            $table->foreign('manv')->references('id')->on('nhanvien');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hoadon', function (Blueprint $table) {
            $table->dropForeign('hoadon_maps_foreign');
            $table->removeColumn('maps');
            $table->dropForeign('hoadon_manv_foreign');
            $table->removeColumn('manv');
        });
    }
};
