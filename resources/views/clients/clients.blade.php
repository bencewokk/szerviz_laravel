<!-- resources/views/clients.blade.php -->

@extends('layouts.app')

@section('title', 'Clients List')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Clients List</h1>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Client ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Card Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('client.cars', ['clientId' => $client->id]) }}" class="text-blue-500 hover:underline">
                                {{ $client->id }}
                            </a>
                        </td>
                        <td class="py-2 px-4 border-b">{{ $client->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $client->idcard }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
