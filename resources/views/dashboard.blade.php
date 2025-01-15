<x-app-layout>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">Movie Listings</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($movies as $movie)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <img class="w-full h-48 object-cover" src="{{ $movie->img_url }}" alt="{{ $movie->name }}">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold">{{ $movie->name }}</h2>
                        <p class="text-gray-600 mt-2">{{ $movie->description }}</p>
                        <p class="mt-4 font-bold">Genre: {{ $movie->genre }}</p>
                        <p class="mt-2">Tickets Available: {{ $movie->tickets }}</p>
                        <p class="mt-2">Date: {{ $movie->day_film }}</p>
                        <p class="mt-2">Time: {{ $movie->time_film }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
