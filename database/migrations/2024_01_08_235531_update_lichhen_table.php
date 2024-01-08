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
        Schema::table('phieunhan', function (Blueprint $table) {
            $table->bigInteger('malh')->unsigned()->nullable()->comment('mã lịch hẹn');
            $table->foreign('malh')->references('id')->on('lichhen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('phieunhan', function (Blueprint $table) {
            $table->dropForeign('phieunhan_malh_foreign');
            $table->removeColumn('malh');
        });
    }
};
