<div x-data="{ showForm: false }" x-init="init()">

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
    <div x-show="!showForm" class="container w-full flex items-center justify-center">
        <h1>Scan Your Card</h1>
        <img class="h-[300px] w-auto" src="{{ asset('images/scan-card.gif') }}" alt="scan-card">
    </div>

    <script>
        function init() {
            // Listen for the custom event from Laravel
            window.addEventListener('show-redeem-form', (event) => {
                // Update the showForm variable based on the event data
                this.showForm = event.detail.showForm;
            });

            // Function to close the modal and emit the event to Laravel
            this.closeModal = () => {
                this.showForm = false;
                this.$dispatch('close-modal', 'redeem-item-{{ $itemID }}');
            };
        }
    </script>

</div>
