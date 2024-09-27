<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TrafficController;
use App\Http\Controllers\HomePageController;

// 首頁
Route::get('/', [IndexController::class,'index'])->name('home');

//00-homepage
Route::get('announcement1', [HomePageController::class, 'announcement1'])->name('announcement1');
Route::get('announcement2', [HomePageController::class, 'announcement2'])->name('announcement2');
Route::get('sitemap', [HomePageController::class, 'sitemap'])->name('sitemap');
Route::get('faq', [HomePageController::class, 'FAQ'])->name('faq');

//01-flight
Route::get('InternationalFlights', [FlightController::class, 'InternationalFlights'])->name('InternationalFlights');
Route::get('InternationalScheduled', [FlightController::class, 'InternationalScheduled'])->name('InternationalScheduled');
Route::get('DomesticFlights', [FlightController::class, 'DomesticFlights'])->name('DomesticFlights');
Route::get('DomesticScheduled', [FlightController::class, 'DomesticScheduled'])->name('DomesticScheduled');
Route::get('flight', [FlightController::class, 'FlightForm'])->name('FlightForm');
Route::get('airline', [FlightController::class, 'Airline'])->name('Airline');
Route::get('Flight-standby-information', [FlightController::class, 'FlightStandbyInformation'])->name('FlightStandbyInformation');

//02-guide
Route::get('flight-process', [GuideController::class, 'flightProcess'])->name('flight-process');
Route::get('check-in', [GuideController::class, 'checkIn'])->name('check-in');
Route::get('security-notice', [GuideController::class, 'securityNotice'])->name('security-notice');
Route::get('concession-ticket', [GuideController::class, 'concessionTicket'])->name('concession-ticket');
Route::get('relevant-regulation', [GuideController::class, 'relevantRegulation'])->name('relevant-regulation');
Route::get('tax-refund', [GuideController::class, 'taxRefund'])->name('tax-refund');

//03-service
Route::get('floor-plan', [ServiceController::class, 'floorPlan'])->name('floor-plan-1f');
Route::get('service-facilities', [ServiceController::class, 'serviceFacilities'])->name('service-facilities');
// 服務設施內頁
Route::get('facility-information', [ServiceController::class, 'facilityInformation'])->name('facility-information');
Route::get('financial-service', [ServiceController::class, 'financialService'])->name('financial-service');
Route::get('insurance-service', [ServiceController::class, 'insuranceService'])->name('insurance-service');
Route::get('telecommunication-network', [ServiceController::class, 'telecommunicationNetwork'])->name('telecommunication-network');
Route::get('cars-rental-service', [ServiceController::class, 'carsRentalService'])->name('cars-rental-service');
Route::get('food-stores', [ServiceController::class, 'foodStores'])->name('food-stores');
Route::get('tourist-counter', [ServiceController::class, 'touristCounter'])->name('tourist-counter');
Route::get('baggage-packing', [ServiceController::class, 'baggagePacking'])->name('baggage-packing');
Route::get('storage-services', [ServiceController::class, 'storageServices'])->name('storage-services');
Route::get('medical-service', [ServiceController::class, 'medicalService'])->name('medical-service');
// 無障礙服務
Route::get('accessible-transportation', [ServiceController::class, 'accessibleTransportation'])->name('accessible-transportation');
Route::get('accessible-service', [ServiceController::class, 'accessibleService'])->name('accessible-service');
Route::get('accessible-passengers', [ServiceController::class, 'accessiblePassengers'])->name('accessible-passengers');
Route::get('baby-stroller', [ServiceController::class, 'babyStroller'])->name('baby-stroller');
Route::get('lost-property', [ServiceController::class, 'lostProperty'])->name('lost-property');
// 旅客申訴
Route::get('passenger-complaints', [ServiceController::class, 'passengerComplaints'])->name('passenger-complaints');
Route::get('complaint-regulations', [ServiceController::class, 'complaintRegulations'])->name('complaint-regulations');

//04-traffic
// 機場交通路由
Route::get('google-map', [TrafficController::class, 'googleMap'])->name('google-map');
Route::get('parking-lot', [TrafficController::class, 'parkingLot'])->name('parking-lot');
Route::get('taxi-service', [TrafficController::class, 'taxiService'])->name('taxi-service');
Route::get('car-rental-service', [TrafficController::class, 'carRentalService'])->name('car-rental-service');
Route::get('bus-information', [TrafficController::class, 'busInformation'])->name('bus-information');
Route::get('sightseeing-guide', [TrafficController::class, 'sightseeingGuide'])->name('sightseeing-guide');