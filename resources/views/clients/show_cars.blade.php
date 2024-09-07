<!-- resources/views/clients/show_cars.blade.php -->

@extends('layouts.app')

@section('title', 'Cars for ' . $client->name)

@section('content')
    <h1 class="text-2xl font-bold mb-4">Cars for {{ $client->name }}</h1>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Car ID</th>
                <th class="py-2 px-4 border-b">Car ID2</th>
                <th class="py-2 px-4 border-b">Type</th>
                <th class="py-2 px-4 border-b">Registered</th>
                <th class="py-2 px-4 border-b">Own Brand</th>
                <th class="py-2 px-4 border-b">Accidents</th>
                <th class="py-2 px-4 border-b">Services</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
                <tr>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('car.services', ['clientId' => $client->id, 'carId' => $car->car_id]) }}"
                            class="text-blue-500 hover:underline">
                            {{ $car->id }}
                        </a>
                    </td>
                    <td class="py-2 px-4 border-b">{{ $car->car_id }}</td>
                    <td class="py-2 px-4 border-b">{{ $car->type }}</td>
                    <td class="py-2 px-4 border-b">{{ $car->registered }}</td>
                    <td class="py-2 px-4 border-b">{{ $car->ownbrand ? 'Yes' : 'No' }}</td>
                    <td class="py-2 px-4 border-b">{{ $car->accident }}</td>
                    <td class="py-2 px-4 border-b">
                        <ul>
                            @php
                                $latestService = $client->services
                                    ->where('client_id', $client->id)
                                    ->where('car_id', $car->car_id)
                                    ->sortByDesc('lognumber') // Assuming 'created_at' is the timestamp field for service creation
                                    ->first();
                            @endphp
                    
                            @if ($latestService)
                                <li>
                                    <strong>Log Number:</strong> {{ $latestService->lognumber }},
                                    <strong>Event:</strong> {{ $latestService->event }},
                                    <strong>Event Time:</strong> {{ $latestService->eventtime ?? 'N/A' }},
                                    <strong>Document ID:</strong> {{ $latestService->document_id }}
                                </li>
                            @else
                                <li>No services available</li>
                            @endif
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
