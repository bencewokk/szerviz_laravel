@extends('layouts.app')

@section('title', $car->car_id . '-es autó szervízei')

@section('content')
    <h1 class="mt-5">{{ $car->car_id }}-es autó szervízei</h1>

    <table class="table">
        <thead>
            <tr>
                <th class="col">alkalom sorszáma</th>
                <th class="col">esemény neve</th>
                <th class="col">esemény időpontja</th>
                <th class="col">munkalap azonosító</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td class="col">{{ $service->lognumber }}</td>
                    <td class="col">{{ $service->event }}</td>
                    <td class="col">
                        @if ($service->event == 'regisztralt')
                            {{ $car->registered }}
                        @else
                            {{ $service->eventtime ?? 'N/A' }}
                        @endif
                    </td>
                    <td class="col">{{ $service->document_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
