<x-app-layout>
    <div class="container mx-auto px-4 pt-10">
        <div class="flex items-center justify-center mb-6">
            <input 
                type="text" 
                id="search" 
                placeholder="Search for movies..." 
                class="border border-gray-300 rounded-lg px-4 py-2 w-full md:w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            />
        </div>

        <h1 class="text-2xl font-bold mb-4 text-blue-500 text-center animate-bounce">Movie Lists</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
            @foreach ($movies as $movie)
                <div 
                    class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 hover:scale-105 transition-transform duration-300 ease-in-out hover:shadow-2xl hover:shadow-blue-500/50"
                    data-name="{{ $movie->name }}" 
                >
                    <img 
                        class="w-full h-40 object-cover hover:opacity-90 transition-opacity duration-300 ease-in-out" 
                        src="{{ asset($movie->img_url) }}" 
                        alt="{{ $movie->name }}"
                    >
                    <div class="p-3">
                        <h2 class="text-lg font-semibold text-gray-800 hover:text-blue-500 transition-colors duration-300 ease-in-out">{{ $movie->name }}</h2>
                        <p class="mt-3 text-gray-600"><strong>Genre:</strong> {{ $movie->genre }}</p>
                        <p class="mt-1 text-gray-600"><strong>Tickets Available:</strong> {{ $movie->tickets }}</p>
                        <p class="mt-1 text-gray-600"><strong>Date:</strong> {{ $movie->day_film }}</p>
                        <p class="mt-1 text-gray-600"><strong>Time:</strong> {{ $movie->time_film }}</p>
                        <a 
                            href="/movie/details/{{ $movie->id }}" 
                            class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded transform hover:scale-110 transition-transform duration-300 ease-in-out hover:bg-blue-600 hover:shadow-lg hover:shadow-blue-400"
                        >
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <p class="mt-10 text-center text-blue-500 animate-pulse font-bold text-2xl">
            🎬 Thanks for dropping by! We hope you find your next cinematic adventure here!
        </p>
    </div>
    @include('customer.footer')
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('search');
        const movies = document.querySelectorAll('[data-name]');

        searchInput.addEventListener('input', () => {
            const query = searchInput.value.toLowerCase();

            movies.forEach(movie => {
                const movieName = movie.getAttribute('data-name').toLowerCase();
                if (movieName.includes(query)) {
                    movie.style.display = 'block';
                } else {
                    movie.style.display = 'none';
                }
            });
        });
    });
</script>
