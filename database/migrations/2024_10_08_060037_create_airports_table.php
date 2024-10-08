<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->string('airport_code', 10)->unique()->comment('機場代號');
            $table->string('name_zh', 100)->comment('中文機場名稱');
            $table->string('name_en', 100)->nullable()->comment('英文機場名稱');
            $table->string('name_jp', 100)->nullable()->comment('日文機場名稱');
            $table->boolean('is_domestic')->comment('是否為台灣國內機場');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};
