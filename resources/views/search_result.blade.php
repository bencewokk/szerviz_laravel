<!-- resources/views/search_result.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100 p-4">

    <h1 class="text-2xl font-bold mb-4">Search Result</h1>

    <div>
        <strong>Client ID:</strong> {{ $client->id }}<br>
        <strong>Client Name:</strong> {{ $client->name }}<br>
        <strong>Card Number:</strong> {{ $client->idcard }}<br>
        <strong>Number of Cars:</strong> {{ $carCount }}<br>
        <strong>Total Service Logs:</strong> {{ $serviceLogsCount }}
    </div>

</body>
</html>
