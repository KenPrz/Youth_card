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
            <div class="flex w-full item-center justify-center">
                <img class="ms-5 h-[150px] w-[150px]" src="{{ asset('images/scan-card.gif') }}" alt="scan-card">
            </div>
            <h1 class="font-bold mb-2">OR</h1>
            <form x-on:submit.prevent="submitForm">
                <input
                    type="text"
                    id="card_number"
                    name="card_number"
                    class="w-3/4 px-3 py-2 mb-4 border border-gray-300 rounded-md"
                    placeholder="Card Number"
                    required>

                <button
                    type="submit"
                    class=" w-3/4 justify-center mb-4 inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-400 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition"
                    >
                        Check ID
                </button>
            </form>
        </div>
    </div>
    <script type="module">
        $(document).ready(function(){
            let intervalId;
            function fetchLatestRFIDData(){
                $.ajax({
                    url: '{{ route('get.latest.rfid') }}',
                    method: 'get',
                    success: function(response){
                        console.log(response.rfid);
                        $('#card_number').val(response.rfid);
                    },
                });
            }
            intervalId = setInterval(fetchLatestRFIDData, 2500);
        });
    </script>
</div>