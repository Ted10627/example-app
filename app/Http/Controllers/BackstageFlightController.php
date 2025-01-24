<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BackstageFlightController extends Controller
{
    public function fetchFlightData(Request $request)
    {
        // 從請求中分別提取 departures 和 arrivals
        $departures = $request->input('flight.departures', []);
        $arrivals = $request->input('flight.arrivals', []);
        
        // 處理出境航班資料
        foreach ($departures as $flight) {
            $this->saveFlight($flight);
        }

        // 處理入境航班資料
        foreach ($arrivals as $flight) {
            $this->saveFlight($flight);
        }

        return response()->json(['message' => '航班資料儲存成功']);
    }

    private function saveFlight($flight)
    {
        Flight::updateOrCreate(
            [
                'flight_date' => $flight['FlightDate'],
                'flight_number' => $flight['FlightNumber'],
            ],
            [
                'airline_code' => $flight['AirlineID'],
                'departure_airport_code' => $flight['DepartureAirportID'],
                'arrival_airport_code' => $flight['ArrivalAirportID'],
                'schedule_departure_time' => $flight['ScheduleDepartureTime'],
                'actual_departure_time' => $flight['ActualDepartureTime'],
                'departure_remark' => $flight['ArrivalRemark'],
            ]
        );
    }
}