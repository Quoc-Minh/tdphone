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
        Schema::create('phieunhan', function (Blueprint $table) {
            $table->id();
            $table->string('tenkhachhang', 255);
            $table->string('sdtkhachhang', 11);
            $table->string('diachi', 255)->nullable();
            $table->string('loaimay', 255);
            $table->string('imei', 100);
            $table->string('tinhtrangmay')->nullable();
            $table->text('ghichu')->nullable();
            $table->dateTime('thoigiannhan')->default(date('y-m-d H:i:s'));
            $table->dateTime('thoigianhentra');
            $table->dateTime('thoigiantra')->nullable();
            $table->bigInteger('nguoinhan')->unsigned();
            $table->foreign('nguoinhan')->references('id')->on('nhanvien')->onDelete('cascade');
        });

        Schema::create('phieusua', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('maphieunhan')->unsigned();
            $table->foreign('maphieunhan')->references('id')->on('phieunhan')->onDelete('cascade');
            $table->integer('trangthai')->default(0);
            $table->dateTime('thoigianbatdau')->default(date('y-m-d H:i:s'));
            $table->dateTime('thoigiansuaxong')->nullable();
            $table->bigInteger('nguoisua')->unsigned();
            $table->foreign('nguoisua')->references('id')->on('nhanvien')->onDelete('cascade');
        });

        Schema::create('phieusua_linhkien', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('maphieu')->unsigned()->comment('mã phiếu sửa');
            $table->foreign('maphieu')->references('id')->on('phieusua')->onDelete('cascade');
            $table->bigInteger('malk')->unsigned()->comment('mã linh kiện');
            $table->foreign('malk')->references('id')->on('linhkien')->onDelete('cascade');
            $table->integer('soluong')->default(1);
        });

        Schema::create('phieunhan_dichvu', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('maphieu')->unsigned();
            $table->foreign('maphieu')->references('id')->on('phieunhan')->onDelete('cascade');
            $table->bigInteger('madv')->unsigned();
            $table->foreign('madv')->references('id')->on('dichvu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieunhan');
        Schema::dropIfExists('phieusua');
        Schema::dropIfExists('phieunhan_dichvu');
    }
};
