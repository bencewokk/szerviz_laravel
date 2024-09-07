<!-- resources/views/search.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Clients</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100 p-4">

    <h1 class="text-2xl font-bold mb-4">Search Clients</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('search') }}">
        @csrf
        <label for="clientName">Client Name:</label>
        <input type="text" name="clientName" value="{{ old('clientName') }}" />
        <label for="idCard">ID Card:</label>
        <input type="text" name="idCard" value="{{ old('idCard') }}" />
        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Search</button>
    </form>

</body>
</html>
