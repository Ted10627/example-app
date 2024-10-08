<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
//用於取得API
use Illuminate\Support\Facades\Http;

class BackstageFlightController extends Controller
{
    public function fetchFlightsData()
    {
        // 1.取得API資料
        $response = Http::get('https://tdx.transportdata.tw/api/basic/v2/Air/FIDS/Airport/RMQ?%24top=30&%24format=JSON');
        $data = $response->json(); // 解析 JSON 數據
        
        //2.檢查所有的航班資料
        foreach($data as $airportData){
            //API出境航班資料
            foreach($airportData['FIDSDeparture'] as $departure){
                //將資料倒入資料庫
                $flightData = [
                    'FlightDate' => $departure['flight_date'],
                    'FlightNumber' => $departure['flight_number'],
                    'AirlineID' => $departure['airline_code'],
                    'DepartureAirportID' => $departure['departureAirport_code'],
                    'ArrivalAirportID' => $departure['arrival_airport_code'],
                    'ScheduleDepartureTime' => $departure['schedule_departure_time'],
                    'ActualDepartureTime' => $departure['actual_departure_time'],
                    'DepartureRemark' => $departure['departure_remark'],
                ];
                 // 3. 將出境航班資料存入資料庫
                Flight::updateOrCreate(
                    [
                        //檢查資料表內的兩個欄位判斷資料更新與否
                        'flight_number' => $flightData['flight_number'],
                        'flight_date' => $flightData['flight_date'],
                    ],
                $flightData
                );
            }

            //API入境航班資料
            foreach($airportData['FIDSArrival'] as $departure){
                //將資料倒入資料庫
                $flightData = [
                    'FlightDate' => $departure['flight_date'],
                    'FlightNumber' => $departure['flight_number'],
                    'AirlineID' => $departure['airline_code'],
                    'DepartureAirportID' => $departure['departureAirport_code'],
                    'ArrivalAirportID' => $departure['arrival_airport_code'],
                    'ScheduleDepartureTime' => $departure['schedule_departure_time'],
                    'ActualDepartureTime' => $departure['actual_departure_time'],
                    'DepartureRemark' => $departure['departure_remark'],
                ];
                 // 3. 將出境航班資料存入資料庫
                Flight::updateOrCreate(
                    [
                        //檢查資料表內的兩個欄位判斷資料更新與否
                        'flight_number' => $flightData['flight_number'],
                        'flight_date' => $flightData['flight_date'],
                    ],
                $flightData
                );
            }
        }
        return response()->json(['message' => '航班資料抓取成功']);
    }
}
