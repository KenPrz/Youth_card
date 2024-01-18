<div>
    <div class="container w-full">
        <img class="h-[300px] w-auto" src="{{asset('images/scan-card.gif')}}" alt="scan-card">
    </div>
    <button x-on:click.prevent="$dispatch('close-modal', 'wait-for-scan')"
        class="w-full px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
        Cancel
    </button>
</div>