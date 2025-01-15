<x-app-layout>
    <!-- Background Image Section -->
    <div class="h-[600px] bg-cover bg-center" style="background-image: url('{{ asset('images/movies/location.jpg') }}');">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-60">
            <div class="text-white text-center animate-fadeIn">
                <h1 class="text-4xl md:text-5xl font-bold leading-tight">Discover Our Location</h1>
                <p class="mt-4 text-lg md:text-xl">Poblacion, Banaybanay, Davao Oriental</p>
            </div>
        </div>
    </div>

    <!-- Street Foods Section -->
    <div class="container mx-auto px-6 py-8 space-y-8">
        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 animate-slideUp">
                <div class="flex items-center space-x-3">
                    <svg class="w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18c4.418 0 8-3.582 8-8S16.418 2 12 2 4 5.582 4 10s3.582 8 8 8z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l2 2m0 0l2-2m-2 2H8"></path>
                    </svg>
                    <span class="text-lg font-semibold text-gray-800">Savor Street Foods</span>
                </div>
                <p class="mt-4 text-gray-600 leading-relaxed">Poblacion, Banaybanay, Davao Oriental is renowned for its vibrant street food culture. From tantalizing grilled skewers to sweet local snacks, our streets offer a diverse culinary adventure perfect for enhancing your movie-going experience. Grab a bite of local delicacies while you immerse yourself in the magic of cinema. Let the flavors of our street foods ignite your taste buds and brighten your day.</p>
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <img src="{{ asset('images/movies/s1.jpg') }}" alt="Street Food 1" class="w-full rounded-lg shadow-md hover:scale-105 transform transition duration-500">
                    <img src="{{ asset('images/movies/s2.jpg') }}" alt="Street Food 2" class="w-full rounded-lg shadow-md hover:scale-105 transform transition duration-500">
                    <img src="{{ asset('images/movies/s3.jpg') }}" alt="Street Food 3" class="w-full rounded-lg shadow-md hover:scale-105 transform transition duration-500">
                    <img src="{{ asset('images/movies/s4.webp') }}" alt="Street Food 4" class="w-full rounded-lg shadow-md hover:scale-105 transform transition duration-500">
                </div>
            </div>

            <div class="bg-gray-100 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 animate-slideUp">
                <div class="flex items-center space-x-3">
                    <svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18c4.418 0 8-3.582 8-8S16.418 2 12 2 4 5.582 4 10s3.582 8 8 8z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l2 2m0 0l2-2m-2 2H8"></path>
                    </svg>
                    <span class="text-lg font-semibold text-gray-800">Experience with Images</span>
                </div>
                <p class="mt-4 text-gray-600 leading-relaxed">Enhance your street food adventure with visuals! Below are some images capturing the essence of street foods in Poblacion, Banaybanay. Dive into the flavors and the vibrant culture through these mouth-watering visuals. Let these pictures remind you of the beauty in simplicity and the joy that comes from sharing a meal with others.</p>
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <img src="{{ asset('images/movies/s1.jpg') }}" alt="Street Food 1" class="w-full rounded-lg shadow-md hover:scale-105 transform transition duration-500">
                    <img src="{{ asset('images/movies/s2.jpg') }}" alt="Street Food 2" class="w-full rounded-lg shadow-md hover:scale-105 transform transition duration-500">
                    <img src="{{ asset('images/movies/s3.jpg') }}" alt="Street Food 3" class="w-full rounded-lg shadow-md hover:scale-105 transform transition duration-500">
                    <img src="{{ asset('images/movies/s4.webp') }}" alt="Street Food 4" class="w-full rounded-lg shadow-md hover:scale-105 transform transition duration-500">
                </div>
            </div>
        </div>
    </div>

    <!-- People's Experience and Film Quality Section -->
    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 animate-fadeInUp">
        <div class="flex items-center space-x-3">
            <svg class="w-6 h-6 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18c4.418 0 8-3.582 8-8S16.418 2 12 2 4 5.582 4 10s3.582 8 8 8z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l2 2m0 0l2-2m-2 2H8"></path>
            </svg>
            <span class="text-lg font-semibold text-gray-800">People's Experience & Film Quality</span>
        </div>
        <p class="mt-4 text-gray-600 leading-relaxed">The filming site in Poblacion, Banaybanay, Davao Oriental has left a lasting impression on both the local community and visiting filmmakers. The stunning natural beauty, combined with the rich cultural backdrop, has provided an authentic and captivating setting for numerous films. Locals have shared heartwarming stories of how the vibrant location has inspired them and boosted their creativity.</p>

        <div class="mt-6 space-y-4">
            <div class="text-gray-600 animate-slideLeft">
                <p><strong>John Doe:</strong> “The peaceful surroundings and friendly community made my time here incredibly inspiring. Filming here felt like capturing real stories with genuine people.”</p>
            </div>
            <div class="text-gray-600 animate-slideLeft">
                <p><strong>Maria Santos:</strong> “I’ve never experienced such vibrant culture while working on a film. The locals welcomed us warmly and were always eager to share their stories.”</p>
            </div>
            <div class="text-gray-600 animate-slideLeft">
                <p><strong>Tommy Lee:</strong> “The natural scenery here adds an extra layer to any film. The mountains and rivers make it so picturesque—it’s like stepping into a dream.”</p>
            </div>
            <div class="text-gray-600 animate-slideLeft">
                <p><strong>Sophia Chen:</strong> “The cultural traditions here blend perfectly with modern filmmaking techniques. It was an eye-opener to see such harmony.”</p>
            </div>
            <div class="text-gray-600 animate-slideLeft">
                <p><strong>Carlos Rivera:</strong> “Filming here was not just about capturing beautiful landscapes, but also connecting with real people and learning from their everyday lives.”</p>
            </div>
            <div class="text-gray-600 animate-slideLeft">
                <p><strong>Emily Wilson:</strong> “The film quality achieved with this location is incredible. The light, the atmosphere—everything adds a touch of magic to every scene.”</p>
            </div>
        </div>
    </div>
    @include('customer.footer')
</x-app-layout>
