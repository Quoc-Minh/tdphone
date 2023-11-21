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
        Schema::create('phieu', function (Blueprint $table) {
            $table->id();
            $table->string('tenkhachhang', 255);
            $table->string('sdtkhachhang', 11);
            $table->string('diachi', 255)->nullable();
            $table->string('loaimay', 255);
            $table->string('imei', 100);
            $table->json('tinhtrangmay')->nullable();
            $table->text('ghichu')->nullable();
            $table->dateTime('thoigiannhan')->default(date('Y-d-m H:i'));
            $table->dateTime('thoigianhentra');
            $table->dateTime('thoigiansuaxong')->nullable();
            $table->dateTime('thoigiantra')->nullable();
        });

        Schema::create('phieu_dichvu', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('maphieu')->unsigned();
            $table->foreign('maphieu')->references('id')->on('phieu');
            $table->bigInteger('madv')->unsigned();
            $table->foreign('madv')->references('id')->on('dichvu');
        });

        Schema::create('xuliphieu', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('maphieu')->unsigned();
            $table->foreign('maphieu')->references('id')->on('phieu');
            $table->bigInteger('manv')->unsigned();
            $table->foreign('manv')->references('id')->on('nhanvien');
            $table->string('ghichu', 255)->nullable();
            $table->integer('trangthai')->default(0);
            $table->dateTime('updated_at')->default(date('Y-d-m H:i'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu');
        Schema::dropIfExists('xuliphieu');
        Schema::dropIfExists('phieu_dichvu');
    }
};
