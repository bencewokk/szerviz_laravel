@extends('layouts.app')

@section('title', $client->name . " autói")

@section('content')
    <h1 class="mt-5">{{ $client->name }} autói</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">autó sorszáma</th>
                <th scope="col">autó típusa</th>
                <th scope="col">regisztrálás időpontja</th>
                <th scope="col">saját márkás-e</th>
                <th scope="col">balesetek száma</th>
                <th scope="col">Legutolsó szervíz neve</th>
                <th scope="col">Legutolsó szervíz időpontja</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
                <tr>
                    <th scope="row">
                        <a href="{{ route('clients.car_services', ['clientId' => $client->id, 'carId' => $car->id]) }}">{{ $car->id }}</a>
                    </th>
                    <td>{{ $car->type }}</td>
                    <td>{{ $car->registered }}</td>
                    <td>{{ $car->ownbrand ? 'Yes' : 'No' }}</td>
                    <td>{{ $car->accident }}</td>
                    <td>
                        @if(isset($latestServices[$car->id]))
                            {{ $latestServices[$car->id]->event }}
                        @endif
                    </td>
                    <td>
                        @if(isset($latestServices[$car->id]))
                            {{ $latestServices[$car->id]->eventtime }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
