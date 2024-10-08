<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;
    
    // 主鍵
    protected $primaryKey = 'id';

    // 定義 Airlines 表與 Flights 表的關聯：一個航空公司可以有多個航班
    public function flights()
    {
        return $this->hasMany(Flight::class, 'airline_id', 'id');
    }
}
