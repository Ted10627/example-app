<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    // 主鍵
    protected $primaryKey = 'id';

    // 定義 Flights 表單的 AirlineID 與 Airlines 的 id 之間的關聯：表示航班所屬的航空公司
    public function airline()
    {
        return $this->belongsTo(Airline::class, 'airline_id', 'id');
    }

    // 定義 Flights 表單的 DepartureAirportID 與 Airports 表單的 AirportID 之間的關聯：表示航班的起飛機場
    public function departureAirport()
    {
        return $this->belongsTo(Airport::class, 'departure_airport_id', 'airport_id');
    }

    // 定義 Flights 表單的 ArrivalAirportID 與 Airports 表單的 AirportID 之間的關聯：表示航班的抵達機場
    public function arrivalAirport()
    {
        return $this->belongsTo(Airport::class, 'arrival_airport_id', 'airport_id');
    }
}
