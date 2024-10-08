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
        Schema::create('airlines', function (Blueprint $table) {
            $table->id();
            $table->string('airline_code', 10)->unique()->comment('航空公司代號');
            $table->string('name_zh', 100)->comment('航空公司中文名稱');
            $table->string('name_en', 100)->nullable()->comment('航空公司英文名稱');
            $table->string('name_jp', 100)->nullable()->comment('航空公司日文名稱');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airlines');
    }
};
