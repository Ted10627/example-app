<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    // 主鍵
    protected $primaryKey = 'id';

    // 定義 Airports 表與 Flights 表的關聯：一個機場可以有多個起飛航班
    public function departureFlights()
    {
        return $this->hasMany(Flight::class, 'departure_airport_id', 'airport_id');
    }
    // 定義 Airports 表與 Flights 表的關聯：一個機場可以有多個抵達航班
    public function arrivalFlights()
    {
        return $this->hasMany(Flight::class, 'arrival_airport_id', 'airport_id');
    }
}
