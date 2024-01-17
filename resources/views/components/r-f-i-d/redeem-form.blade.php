<div x-data="{ showForm: false }">
    <!-- Form section -->
    <div x-show="showForm">
        @include('components.r-f-i-d.redeem-item-form.redeem-form')
    </div>

    <!-- Back button -->
    <div class="flex items-center justify-start mt-5 ms-5 ease-in-out">
        <button x-on:click.prevent="$dispatch('close-modal', 'redeem-item-{{ $itemID }}')">
            <span>
                <img class="h-6 w-auto hover" src="{{ asset('images/back.svg') }}" alt="back">
            </span>
        </button>
    </div>

    <!-- Scan card section -->
    <div x-show="!showForm" class="text-center container w-full flex flex-col items-center justify-center">
        <div class="flex flex-col justify-center">
            <h1 class="text-center">Scan Your Card</h1>
            <img class="ms-5 h-[150px] w-auto" src="{{ asset('images/scan-card.gif') }}" alt="scan-card">
            <h1 class="font-bold">OR</h1>
            <form x-on:submit.prevent="submitForm">
                <x-text-input placeholder="enter card number" id="card_number" class="block mt-1 w-full mb-2" type="number" name="card_number" :value="old('card_number')" required autofocus />
                <x-input-error :messages="$errors->get('card_number')" class="mt-2" />
                <button
                    type="submit"
                    class="justify-center mb-4 w-full inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-400 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition"
                    >
                        Check ID
                </button>
            </form>
        </div>
    </div>
    <script>
        function submitForm() {
            const card_number = document.getElementById('card_number').value;
            axios.post('/api/check-rfid', {
                card_number: card_number
            })
            .then((response) => {
                if(response.data.message == 'success') {
                    
                } else {
                    alert('Card not found');
                }
            })
        }
    </script>
</div>