<x-app-layout>
    <div class="container mx-auto px-4 pt-10">
        <!-- "Add Movie" Button -->
        <div class="flex justify-center mt-6 mb-6">
            <button 
                id="addMovieBtn" 
                class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 focus:outline-none"
            >
                Add Movie
            </button>
        </div>
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
                        <!-- Details Button -->
                        <a 
                            href="/movies/details/{{$movie->id}}" 
                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none mt-4 inline-block"
                        >
                            Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        
    </div>
    <!-- Modal for Adding Movie -->
    <div id="addMovieModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg w-full max-w-md max-h-[80vh] overflow-auto p-8 transform">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800">Add New Movie</h2>
                <button id="closeModal" class="text-gray-500 hover:text-gray-800">&times;</button>
            </div>
    
            <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Movie Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="4" 
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    ></textarea>
                </div>
                <div class="mb-4">
                    <label for="img_url" class="block text-gray-700">Upload Movie Image</label>
                    <input 
                        type="file" 
                        name="img_url" 
                        id="img_url" 
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                </div>
                <div class="mb-4">
                    <label for="genre" class="block text-gray-700">Genre</label>
                    <input 
                        type="text" 
                        name="genre" 
                        id="genre" 
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                </div>
                <div class="mb-4">
                    <label for="tickets" class="block text-gray-700">Tickets Available</label>
                    <input 
                        type="number" 
                        name="tickets" 
                        id="tickets" 
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                </div>
                <div class="mb-4">
                    <label for="day_film" class="block text-gray-700">Film Date</label>
                    <input 
                        type="date" 
                        name="day_film" 
                        id="day_film" 
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                </div>
                <div class="mb-4">
                    <label for="time_film" class="block text-gray-700">Film Time</label>
                    <input 
                        type="time" 
                        name="time_film" 
                        id="time_film" 
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                </div>
    
                <div class="flex justify-end space-x-4">
                    <button 
                        type="button" 
                        id="closeModalBtn" 
                        class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                    >
                        Add Movie
                    </button>
                </div>
            </form>
        </div>
    </div>
    
</x-app-layout>

<script>
    
    const addMovieBtn = document.getElementById('addMovieBtn');
    const addMovieModal = document.getElementById('addMovieModal');
    const closeModalBtn = document.getElementById('closeModal');
    const closeModalBtnForm = document.getElementById('closeModalBtn');
    
    addMovieBtn.addEventListener('click', () => {
        addMovieModal.classList.remove('hidden');
    });

    closeModalBtn.addEventListener('click', () => {
        addMovieModal.classList.add('hidden');
    });
    closeModalBtnForm.addEventListener('click', () => {
        addMovieModal.classList.add('hidden');
    });
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
