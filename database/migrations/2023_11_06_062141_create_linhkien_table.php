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
        Schema::create('linhkien', function (Blueprint $table) {
            $table->id();
            $table->string('ten', 100);
            $table->text('hinh')->nullable();
            $table->integer('gia')->default(0);
            $table->integer('soluong')->default(0);
            $table->string('mota', 255)->nullable();
            $table->integer('trangthai')->comment('0: ngung hoat dong; 1: con hang; 2: het hang')->default(0);
            $table->timestamps();
        });

        Schema::create('linhkien_dichvu', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('madv')->unsigned()->comment('mã dịch vụ');
            $table->foreign('madv')->references('id')->on('dichvu')->onDelete('cascade');
            $table->bigInteger('malk')->unsigned()->comment('mã linh kiện');
            $table->foreign('malk')->references('id')->on('linhkien')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linhkien');
        Schema::dropIfExists('linhkien_dichvu');
    }
};
