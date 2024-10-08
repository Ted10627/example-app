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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            // 外鍵約束
            $table->foreign('airline_code')->references('airline_code')->on('airlines')->onDelete('cascade');
            $table->foreign('departureAirport_code')->references('airport_code')->on('airports')->onDelete('cascade');
            $table->foreign('arrival_airport_code')->references('airport_code')->on('airports')->onDelete('cascade');
            //欄位
            $table->date('flight_date')->comment('航班日期');
            $table->string('flight_number', 10)->comment('航班編號');
            $table->string('airline_code', 10)->comment('航空公司代號');
            $table->string('departureAirport_code', 10)->comment('起飛機場代號');
            $table->string('arrival_airport_code', 10)->comment('抵達機場代號');
            $table->dateTime('schedule_departure_time')->comment('預計出發時間');
            $table->dateTime('actual_departure_time')->nullable()->comment('實際出發時間');
            $table->string('departure_remark', 30)->nullable()->comment('出發狀態備註');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
