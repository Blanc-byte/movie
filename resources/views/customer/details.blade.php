<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        <div class="bg-white rounded-lg shadow-lg p-6 space-y-6">
            <!-- Header Section with Background -->
            <div class="p-10 flex flex-col md:flex-column items-start space-y-4 md:space-y-0 md:space-x-6 bg-cover bg-center relative rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-500 ease-in-out"
                style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 1) 100%), url('{{ asset($movie->img_url) }}');">
                <div class="flex items-center space-x-6 z-10 mt-60">
                    <img class="w-full md:w-1/2 h-60 object-cover rounded-lg transform hover:scale-110 transition-transform duration-500 ease-in-out" src="{{ asset($movie->img_url) }}" alt="{{ $movie->name }}">
                    <div>
                        <h1 class="text-3xl font-bold mb-6 text-white relative z-10 animate-bounce">{{ $movie->name }}</h1>
                        <h2 class="text-xl font-semibold text-white">Description</h2>
                        <p class="mt-2 text-gray-200">{{ $movie->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Movie Details Section -->
            <div class="ml-6">
                <h2 class="text-xl font-semibold">Actors</h2>
                <p class="mt-2 text-gray-700">
                    @foreach ($movie->actors as $actor)
                        {{ $actor->actors }}{{ !$loop->last ? ',' : '' }}
                    @endforeach
                </p>
                <h3 class="text-xl font-semibold mt-4">Genre</h3>
                <p class="mt-1 text-gray-700">{{ $movie->genre }}</p>
                
                <h4 class="text-xl font-semibold mt-4">Available</h3>
                <p class="mt-1 text-gray-700">{{ $movie->ticket }}</p>
            </div>

            <!-- Ticket Section -->
            <div class="ml-6">
                <h3 class="text-xl font-semibold">Price per Ticket</h3>
                <p class="mt-1 text-gray-700">Price: ${{ $movie->ticket }}</p>
                <button id="buy-ticket" class="mt-4 bg-blue-500 text-white px-6 py-2 rounded transform hover:scale-110 hover:bg-blue-600 transition-transform duration-300 ease-in-out shadow-lg">
                    Buy Tickets
                </button>
            </div>
        </div>
    </div>
    <div id="ticket-modal" class="hidden fixed z-10 inset-0 overflow-y-auto bg-black bg-opacity-50 flex items-center justify-center transition-opacity duration-300 ease-in-out">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 transform scale-90 transition-transform duration-300 ease-in-out">
            <h2 class="text-2xl font-bold mb-4">Select Number of Tickets</h2>
            <div class="flex items-center space-x-4">
                <label for="ticket-count" class="text-lg font-semibold">Number of Tickets:</label>
                <input type="number" id="ticket-count" min="1" value="1" class="border rounded px-2 py-1 w-16">
            </div>
            <p class="mt-4 text-gray-700">Total Price: $<span id="total-price">{{ $movie->ticket }}</span></p>
    
            <h3 class="text-xl font-semibold mt-4">Select Payment Method</h3>
            <div class="mt-2">
                <select id="payment-type" class="border rounded px-2 py-1 w-full">
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="bank_transfer">Bank Transfer</option>
                    <option value="google_pay">Google Pay</option>
                    <option value="apple_pay">Apple Pay</option>
                    <option value="razorpay">Razorpay</option>

                </select>
            </div>
    
            <div class="mt-6 flex items-center justify-between">
                <button id="close-modal" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition duration-300 ease-in-out">Cancel</button>
                <form id="ticket-form" action="{{ route('movies.purchase', ['movieId' => $movie->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="ticketCount" id="ticket-count-hidden" value="1">
                    <input type="hidden" name="totalPrice" id="total-price-hidden" value="{{ $movie->ticket }}">
                    <input type="hidden" name="paymentType" id="payment-type-hidden" value="">
                    <button type="submit" id="confirm-purchase" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition duration-300 ease-in-out">
                        Purchase Tickets
                    </button>
                </form>
            </div>
        </div>
    </div>
    

    <script>
        
        const buyTicketBtn = document.getElementById('buy-ticket');
        const modal = document.getElementById('ticket-modal');
        const closeModalBtn = document.getElementById('close-modal');
        const ticketCountInput = document.getElementById('ticket-count');
        const ticketCountHidden = document.getElementById('ticket-count-hidden');
        const totalPriceHidden = document.getElementById('total-price-hidden');
        const totalPriceDisplay = document.getElementById('total-price');
        
        buyTicketBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modal.classList.add('opacity-100');
        });
        
        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        ticketCountInput.addEventListener('input', () => {
            const ticketPrice = {{ $movie->ticket }};
            let ticketCount = parseInt(ticketCountInput.value);

            const availableTickets = {{ $movie->ticket }};
            if (isNaN(ticketCount) || ticketCount < 1) {
                ticketCount = 1;
            } else if (ticketCount > availableTickets) {
                ticketCount = availableTickets;
            }

            const totalPrice = ticketPrice * ticketCount;
            totalPriceDisplay.textContent = totalPrice.toFixed(2);
            ticketCountHidden.value = ticketCount;
            totalPriceHidden.value = totalPrice.toFixed(2);
            ticketCountInput.value = ticketCount;
        });

        // Handle payment type selection
        const paymentTypeSelect = document.getElementById('payment-type');
        const paymentTypeHidden = document.getElementById('payment-type-hidden');

        paymentTypeSelect.addEventListener('change', () => {
            paymentTypeHidden.value = paymentTypeSelect.value;
        });
    </script>
</x-app-layout>
