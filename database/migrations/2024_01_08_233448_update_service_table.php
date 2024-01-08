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
        Schema::drop('linhkien_dichvu');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('linhkien_dichvu', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('madv')->unsigned()->comment('mã dịch vụ');
            $table->foreign('madv')->references('id')->on('dichvu')->onDelete('cascade');
            $table->bigInteger('malk')->unsigned()->comment('mã linh kiện');
            $table->foreign('malk')->references('id')->on('linhkien')->onDelete('cascade');
        });
    }
};
