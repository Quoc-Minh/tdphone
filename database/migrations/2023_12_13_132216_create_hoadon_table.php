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
        Schema::create('hoadon', function (Blueprint $table) {
            $table->id();
            $table->string('tenkhachhang', 255);
            $table->string('sdtkhachhang', 11);
            $table->string('diachi', 255)->nullable();
            $table->string('loaimay', 255);
            $table->string('imei', 100);
            $table->integer('trangthai')->default(0)->comment('0: chưa thanh toán; 1: đã thanh toán');
            $table->json('dichvu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoadon');
    }
};
