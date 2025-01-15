<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Your Purchases</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($purchases as $purchase)
                <div 
                    class=" hover-glow bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 hover:scale-105 transition-transform duration-300 ease-in-out hover:shadow-2xl"
                >
                    <img 
                        class="w-full h-48 object-cover hover:opacity-90 transition-opacity duration-300 ease-in-out" 
                        src="{{ asset($purchase->img_url) }}" 
                        alt="{{ $purchase->name }}"
                    >
                    <div class="p-4">
                        <h2 class="text-xl font-bold text-gray-800">{{ $purchase->name }}</h2>
                        {{-- <p class="text-gray-600 text-sm mt-2">{{ $purchase->description }}</p> --}}
                        <p class="text-gray-600 text-sm mt-2"><strong>Genre:</strong> {{ $purchase->genre }}</p>
                        <p class="text-gray-600 text-sm mt-2"><strong>Show Day:</strong> {{ $purchase->day_film }}</p>
                        <p class="text-gray-600 text-sm"><strong>Show Time:</strong> {{ $purchase->time_film }}</p>
                        <p class="text-gray-600 text-sm"><strong>Actors:</strong> {{ $purchase->actors }}</p>
                        <p class="text-gray-800 font-semibold mt-2"><strong>Tickets:</strong> {{ $purchase->number_of_tickets }}</p>
                        <p class="text-gray-800 font-semibold"><strong>Total Price:</strong> ${{ $purchase->total_price }}</p>
                        <p class="text-gray-500 text-sm mt-2"><strong>Purchased On:</strong> {{ $purchase->date_purchased }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center">
                    <p class="text-gray-600">No purchases found.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
<style>
    .hover-glow:hover {
        box-shadow: 0 4px 20px rgba(255, 215, 0, 0.7);
    }
</style>
