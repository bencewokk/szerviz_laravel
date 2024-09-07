<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


Route::get('/load', function () {
    $clientController = app(ClientController::class);
    $carController = app(CarController::class);
    $serviceController = app(ServiceController::class);
 
    if ($clientController->isTableEmpty()) {
        $clientController->importClients();
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Data import incomplete, clients table was not empty'
        ]);
    }

    if ($carController->isTableEmpty()) {
        $carController->importCars();
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Data import incomplete, cars table was not empty'
        ]);
    }
    if ($serviceController->isTableEmpty()) {
        $serviceController->importServices();
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Data import incomplete, services table was not empty'
        ]);
    }

    return response()->json([
        'success' => true,
        'message' => 'Data import completed.',
    ]);
});

Route::get('/clients', [ClientController::class, 'index']);
Route::get('/clients/{clientId}/cars', [ClientController::class, 'showCars'])->name('client.cars');
Route::get('/clients/{clientId}/cars/car-services/{carId}', [ServiceController::class, 'getCarServices'])->name('car.services');
Route::get('/search', [SearchController::class, 'showForm'])->name('search.form');
Route::post('/search', [SearchController::class, 'search'])->name('search');