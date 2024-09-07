<?php

namespace App\Http\Controllers;

// app/Http/Controllers/CarController.php

use App\Models\Car;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Builder;

class CarController extends Controller
{
    public function isTableEmpty()
    {
        return Car::count() === 0;
    }
    public function importCars()
    {
        $jsonFilePath = public_path('cars.json');

        if (File::exists($jsonFilePath)) {
            $jsonContents = File::get($jsonFilePath);
            $data = json_decode($jsonContents, true);

            foreach ($data as $carData) {
                $validator = Validator::make($carData, [
                    'client_id' => 'required|exists:clients,id',
                    'type' => 'required|string',
                    'registered' => 'required|date',
                    'ownbrand' => 'required|boolean',
                    'accident' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors()], 422);
                }

                Car::create($carData);
            }

            return response()->json(['success' => true, 'message' => 'Cars imported successfully']);
        } else {
            return response()->json(['error' => 'JSON file not found']);
        }
    }
}
