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
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->id();
            $table->string('manv', 10)->unique();
            $table->string('ten', 50);
            $table->string('email', 100)->unique();
            $table->string('sodienthoai', 11)->unique();
            $table->string('diachi', 255)->nullable();
            $table->text('avatar')->nullable();
            $table->string('password', 60);
            $table->integer('trangthai')->default(1)->comment('0: khóa; 1: hoạt động; 2: nghỉ việc');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('thongtinnhanvien', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('manv')->unsigned();
            $table->foreign('manv')->references('id')->on('nhanvien');
            $table->date('ngaysinh');
            $table->date('ngaythamgia');
            $table->integer('luong');
            $table->timestamps();
        });

        Schema::create('khachhang', function (Blueprint $table) {
            $table->id();
            $table->string('makh', 8);
            $table->string('ten', 50);
            $table->string('email', 100)->unique();
            $table->string('sodienthoai', 11)->unique();
            $table->string('diachi', 255)->nullable();
            $table->text('avatar')->nullable();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhanvien');
        Schema::dropIfExists('khachhang');
    }
};
