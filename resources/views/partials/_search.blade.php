<!-- resources/views/partials/_search.blade.php -->

<form action="{{ route('search') }}" method="post" class="flex items-center space-x-4">
    @csrf

    <div class="mb-4">
        <label for="clientName" class="block text-gray-700 text-sm font-bold mb-2">Client Name:</label>
        <input type="text" name="clientName" id="clientName" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Client Name">
    </div>

    <div class="mb-4">
        <label for="cardNumber" class="block text-gray-700 text-sm font-bold mb-2">Card Number:</label>
        <input type="text" name="cardNumber" id="cardNumber" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Card Number">
    </div>

    <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Search
    </button>
</form>
