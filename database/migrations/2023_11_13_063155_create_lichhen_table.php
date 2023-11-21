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
        Schema::create('lichhen', function (Blueprint $table) {
            $table->id();
            $table->string('tenkhachhang', 255);
            $table->string('sodienthoai', 11);
            $table->string('email', 100);
            $table->date('ngayhen');
            $table->time('thoigianhen');
            $table->string('ghichu', 255)->nullable();
            $table->integer('trangthai')->default(0)->comment('0: khách chưa đến; 1: khách đã đến');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lichhen');
    }
};
