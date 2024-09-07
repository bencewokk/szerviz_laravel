@extends('layouts.app') 

@section('content')
    <div class="container">
        <h2>Search Result</h2>

        <div class="card">
            <div class="card-header">
                Client Information
            </div>
            <div class="card-body">
                <p><strong>ügyfél azonosítója:</strong> {{ $client->id }}</p>
                <p><strong>ügyfél neve:</strong> {{ $client->name }}</p>
                <p><strong>ügyfél okmányazonosítója:</strong> {{ $client->idcard }}</p>
                <p><strong>autóinak darabszáma:</strong> {{ $carCount }}</p>
                <p><strong>szerviznapló bejegyzések száma:</strong> {{ $serviceLogsCount }}</p>
            </div>
        </div>

        {{-- Display additional information if needed --}}
    </div>
@endsection
