<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function showForm()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'clientName' => 'nullable|string',
            'idcard' => 'nullable|alpha_num',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Please fix the errors below.');
        }

        $clientName = $request->input('clientName');
        $idcard = $request->input('idcard');

        $clients = Client::when($clientName, function ($query) use ($clientName) {
            $query->where('name', 'like', "%{$clientName}%");
        })->when($idcard, function ($query) use ($idcard) {
            $query->where('idcard', $idcard);
        })->get();

        if ($clients->count() === 0) {
            return back()->with('error', 'No matching clients found.');
        }

        if ($clients->count() > 1) {
            return back()->with('error', 'Multiple matching clients found. Please provide more specific search criteria.');
        }

        $client = $clients->first();
        $carCount = $client->cars->count();
        $serviceLogsCount = $client->services->count();

        return view('search_result', compact('client', 'carCount', 'serviceLogsCount'));
    }
}
