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
        Schema::create('loaidichvu', function (Blueprint $table) {
            $table->id();
            $table->string('ten', 100);
            $table->bigInteger('danhmuccha')->nullable()->default(null);
            $table->timestamps();
        });

        Schema::create('dichvu', function (Blueprint $table) {
            $table->id();
            $table->string('ten', 100);
            $table->double('giadv')->default(0);
            $table->double('giacong')->default(0);
            $table->integer('baohanh')->comment('số tháng')->default(0);
            $table->string('mota', 255)->nullable();
            $table->integer('trangthai')->comment('0: ngừng hoạt động; 1: hoạt động')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dichvu');
    }
};
