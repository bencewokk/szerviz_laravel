<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Car;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{

    public function isTableEmpty()
    {
        return Service::count() === 0;
    }

    public function getCarServices($clientId, $carId)
    {
        $car = Car::where('client_id', $clientId)
            ->where('car_id', $carId)
            ->firstOrFail();

        $services = Service::where('client_id', $clientId)
            ->where('car_id', $carId)
            ->orderBy('lognumber', 'asc')
            ->get();

        return view('clients.show_car_services', compact('car', 'services'));
    }
    public function importServices()
    {

        

        $jsonFilePath = public_path('services.json');

        if (file_exists($jsonFilePath)) {
            $jsonContents = file_get_contents($jsonFilePath);
            $data = json_decode($jsonContents, true);

            $failedEntries = [];

            foreach ($data as $serviceData) {
                $validator = Validator::make($serviceData, [
                    'id'=> 'unique:services,id',
                    'client_id' => 'required|exists:clients,id',
                    'car_id' => 'required|exists:cars,id',
                    'lognumber' => 'required',
                    'event' => 'required|string',
                    'eventtime' => 'nullable|date_format:Y-m-d H:i:s',
                    'document_id' => 'required|between:1,16',
                ]);

                if ($validator->fails()) {
                    $failedEntries[] = [
                        'data' => $serviceData,
                        'errors' => $validator->errors(),
                    ];
                    continue;
                }

                Service::create($serviceData);
            }

            if (!empty($failedEntries)) {
                return response()->json(['error' => 'Some entries failed validation', 'failed_entries' => $failedEntries], 422);
            }

            return response()->json(['success' => true, 'message' => 'Services imported successfully']);
        } else {
            return response()->json(['error' => 'JSON file not found']);
        }
    }
}
