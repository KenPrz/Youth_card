<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-misc.card-component>
                <div class="p-6 text-gray-900">
                    {{ __('Create an Event') }}
                </div>
            </x-misc.card-component>
            <form action="" method="POST">
                @csrf
                <x-misc.card-component class="mt-5" id="primary-event-details-section">
                    @include('events.partials.event-creation-form.primary-event-details-section')
                </x-misc.card-component> 
                <x-misc.card-component class="mt-5" id="event-organizers-details-section">
                    @include('events.partials.event-creation-form.event-organizers-details-section')
                </x-misc.card-component>
                <x-misc.card-component class="mt-5" id="event-summary-section">
                    @include('events.partials.event-creation-form.event-summary-section')
                </x-misc.card-component>
            </form>
            <div class="flex items-center justify-between">
                <button
                    id="previous-button"
                    type="button"
                    class="mt-5 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-50 transition"
                    onclick="navigateSection('previous')"
                    :disabled="currentSectionIndex === 0"
                >
                    Previous
                </button>
                <button
                    id="next-button"
                    type="button"
                    class="mt-5 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-50 transition"
                    onclick="navigateSection('next')"
                    :disabled="currentSectionIndex === sections.length - 1"
                >
                    Next
                </button>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    let currentSectionIndex = 0;
    const sections = ['primary-event-details-section', 'event-organizers-details-section', 'event-summary-section'];

    function navigateSection(direction) {
        if (direction === 'next' && currentSectionIndex < sections.length - 1) {
            currentSectionIndex++;
        } else if (direction === 'previous' && currentSectionIndex > 0) {
            currentSectionIndex--;
        }

        showCurrentSection();
    }

    function showCurrentSection() {
        sections.forEach(section => {
            const element = document.getElementById(section);
            if (element) {
                element.style.display = 'none';
            }
        });

        const currentSection = document.getElementById(sections[currentSectionIndex]);
        if (currentSection) {
            currentSection.style.display = 'block';
        }

        updateButtonStates();
    }

    function updateButtonStates() {
        const previousButton = document.getElementById('previous-button');
        const nextButton = document.getElementById('next-button');

        if (previousButton) {
            previousButton.disabled = currentSectionIndex === 0;
        }

        if (nextButton) {
            nextButton.disabled = currentSectionIndex === sections.length - 1;
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        showCurrentSection();
    });
</script>
