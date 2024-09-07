@extends('layouts.app')

@section('title', 'Services for Car ' . $car->car_id)

@section('content')
    <h1 class="text-2xl font-bold mb-4">Services for Car {{ $car->car_id }}</h1>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Log Number</th>
                <th class="py-2 px-4 border-b">Event</th>
                <th class="py-2 px-4 border-b">Event Time</th>
                <th class="py-2 px-4 border-b">Document ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $service->lognumber }}</td>
                    <td class="py-2 px-4 border-b">{{ $service->event }}</td>
                    <td class="py-2 px-4 border-b">
                        @if ($service->event == 'regisztralt')
                            {{ $car->registered }}
                        @else
                            {{ $service->eventtime ?? 'N/A' }}
                        @endif
                    </td>
                    <td class="py-2 px-4 border-b">{{ $service->document_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
