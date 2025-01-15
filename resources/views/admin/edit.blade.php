<x-app-layout>
    <a href="/home"><button 
        class="m-10 bg-green-500 text-white px-6 py-2 rounded shadow-lg hover:bg-green-600 hover:scale-105 transform transition-all ease-in-out duration-200"
    >
        BACK
    </button></a>
    <div class="container mx-auto p-10">
        <!-- Animated Heading -->
        <h1 class="text-4xl font-extrabold mb-8 animate-bounce text-gradient bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 bg-clip-text text-transparent">
            Edit Movie: {{ $movie->name }}
        </h1>
    
        <!-- Movie Edit Form -->
        <form action="{{ route('movieed.update', $movie->id) }}" method="POST" enctype="multipart/form-data" class="animate-fadeIn">
            @csrf
            @method('PUT')
    
            <!-- Input Fields with Hover and Focus Effects -->
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-semibold text-lg">Movie Name:</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="w-full border rounded px-4 py-3 transition-transform transform hover:scale-105 focus:ring-4 focus:ring-purple-500 focus:outline-none" 
                    value="{{ $movie->name }}" 
                    required
                >
            </div>
    
            <div class="mb-6">
                <label for="description" class="block text-gray-700 font-semibold text-lg">Description:</label>
                <textarea 
                    name="description" 
                    id="description" 
                    class="w-full border rounded px-4 py-3 transition-transform transform hover:scale-105 focus:ring-4 focus:ring-pink-500 focus:outline-none" 
                    required
                >{{ $movie->description }}</textarea>
            </div>
            
            <div class="mb-6">
                <label for="genre" class="block text-gray-700 font-semibold text-lg">Genre:</label>
                <input 
                    type="text" 
                    name="genre" 
                    id="genre" 
                    class="w-full border rounded px-4 py-3 transition-transform transform hover:scale-105 focus:ring-4 focus:ring-blue-500 focus:outline-none" 
                    value="{{ $movie->genre }}"
                >
            </div>
    
            <div class="mb-6">
                <label for="ticket" class="block text-gray-700 font-semibold text-lg">Ticket Price:</label>
                <input 
                    type="number" 
                    name="ticket" 
                    id="ticket" 
                    class="w-full border rounded px-4 py-3 transition-transform transform hover:scale-105 focus:ring-4 focus:ring-green-500 focus:outline-none" 
                    value="{{ $movie->ticket }}" 
                    required
                >
            </div>
    
            <div class="mb-6">
                <label for="day_film" class="block text-gray-700 font-semibold text-lg">Day of Film:</label>
                <input 
                    type="date" 
                    name="day_film" 
                    id="day_film" 
                    class="w-full border rounded px-4 py-3 transition-transform transform hover:scale-105 focus:ring-4 focus:ring-yellow-500 focus:outline-none" 
                    value="{{ $movie->day_film }}" 
                    required
                >
            </div>
    
            <div class="mb-6">
                <label for="time_film" class="block text-gray-700 font-semibold text-lg">Time of Film:</label>
                <input 
                    type="time" 
                    name="time_film" 
                    id="time_film" 
                    class="w-full border rounded px-4 py-3 transition-transform transform hover:scale-105 focus:ring-4 focus:ring-orange-500 focus:outline-none" 
                    value="{{ \Carbon\Carbon::parse($movie->time_film)->format('H:i') }}" 
                    required
                >
            </div>
            
            @if($actors->count() > 0)
                <h2 class="text-2xl font-bold mb-6 animate-pulse">Associated Actors</h2>
                @foreach ($actors as $actor)
                    <div class="mb-6">
                        <label for="actors" class="block text-gray-700 font-semibold text-lg">Actors:</label>
                        <textarea 
                            name="actors" 
                            id="actors" 
                            class="w-full border rounded px-4 py-3 transition-transform transform hover:scale-105 focus:ring-4 focus:ring-teal-500 focus:outline-none" 
                            required
                        >{{ $actor->actors }}</textarea>
                    </div>
                @endforeach
            @else
                <div class="mb-6">
                    <label for="actors" class="block text-gray-700 font-semibold text-lg">Actors:</label>
                    <textarea 
                        name="actors" 
                        id="actors" 
                        class="w-full border rounded px-4 py-3 transition-transform transform hover:scale-105 focus:ring-4 focus:ring-teal-500 focus:outline-none" 
                        required
                    ></textarea>
                </div>
            @endif
    
            <!-- Update Button with Animation -->
            <div class="mt-8">
                <button 
                    type="submit" 
                    class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-6 py-3 rounded shadow-lg hover:from-blue-500 hover:to-green-500 hover:scale-105 transform transition-all ease-in-out duration-200"
                >
                    Update Movie
                </button>
            </div>
        </form>
    
        <!-- Delete Movie Form with Animation -->
        <form action="{{ route('movie.delete', $movie->id) }}" method="POST" class="mt-8 animate-fadeIn">
            @csrf
            @method('DELETE')
            <button 
                type="submit" 
                class="bg-gradient-to-r from-red-400 to-orange-500 text-white px-6 py-3 rounded shadow-lg hover:from-orange-500 hover:to-red-500 hover:scale-105 transform transition-all ease-in-out duration-200 focus:outline-none"
                onclick="return confirm('Are you sure you want to delete this movie?')"
            >
                REMOVE
            </button>
        </form>
    </div>
    
    <!-- Tailwind Custom Animations -->
    <style>
        @keyframes wiggle {
            0%, 100% {
                transform: rotate(-3deg);
            }
            50% {
                transform: rotate(3deg);
            }
        }
        .animate-wiggle {
            animation: wiggle 1s ease-in-out infinite;
        }
    
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .animate-fadeIn {
            animation: fadeIn 1s ease-in-out;
        }
    </style>
    
</x-app-layout>
