<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('clients.clients', compact('clients'));
    }

    public function showCars($clientId)
    {
        $client = Client::findOrFail($clientId);
        $cars = $client->cars;

        return view('clients.show_cars', compact('client', 'cars'));
    }
    public function isTableEmpty()
    {
        return Client::count() === 0;
    }

    public function importClients()
    {
        $jsonFilePath = public_path('clients.json');

        if (!File::exists($jsonFilePath) || !is_readable($jsonFilePath)) {
            return response()->json(['error' => 'JSON file not found or not readable'], 404);
        }

        $jsonContents = File::get($jsonFilePath);
        $data = json_decode($jsonContents, true);

        foreach ($data as $clientData) {
            $validator = Validator::make($clientData, [
                'name' => 'required|string|max:255',
                'idcard' => 'required|unique:clients,idcard|between:1,16',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            Client::create($clientData);
        }

        return response()->json(['success' => true, 'message' => 'Clients imported successfully']);
    }
}
