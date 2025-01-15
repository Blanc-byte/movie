<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        <div class="bg-gradient-to-r from-purple-600 to-indigo-500 rounded-lg shadow-lg p-6 space-y-6">
            <h2 class="text-3xl font-bold mb-6 text-center text-white">Customer Purchases</h2>

            <div class="overflow-hidden rounded-lg border border-gray-300 shadow-lg">
                <table class="min-w-full table-auto">
                    <thead class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white">
                        <tr>
                            <th class="text-left px-4 py-3 border-b border-gray-300">Movie Name</th>
                            <th class="text-left px-4 py-3 border-b border-gray-300">Description</th>
                            <th class="text-left px-4 py-3 border-b border-gray-300">Genre</th>
                            <th class="text-left px-4 py-3 border-b border-gray-300">Date Film</th>
                            <th class="text-left px-4 py-3 border-b border-gray-300">Time Film</th>
                            <th class="text-left px-4 py-3 border-b border-gray-300">Number of Tickets</th>
                            <th class="text-left px-4 py-3 border-b border-gray-300">Total Price</th>
                            <th class="text-left px-4 py-3 border-b border-gray-300">Actors</th>
                            <th class="text-left px-4 py-3 border-b border-gray-300">Date Purchased</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($customers as $purchase)
                            <tr class="hover:bg-gray-100 border-b border-gray-300 transition duration-300">
                                <td class="px-4 py-3 text-black">{{ $purchase->name }}</td>
                                <td class="px-4 py-3 text-black">{{ $purchase->description }}</td>
                                <td class="px-4 py-3 text-black">{{ $purchase->genre }}</td>
                                <td class="px-4 py-3 text-black">{{ $purchase->day_film }}</td>
                                <td class="px-4 py-3 text-black">{{ $purchase->time_film }}</td>
                                <td class="px-4 py-3 text-black">{{ $purchase->number_of_tickets }}</td>
                                <td class="px-4 py-3 text-black">${{ $purchase->total_price }}</td>
                                <td class="px-4 py-3 text-black">{{ $purchase->actors }}</td>
                                <td class="px-4 py-3 text-black">{{ $purchase->date_purchased }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
