<div class="container">
    <form method="GET" action="{{ route('events.search-name') }}">
        <div class="flex justify-center items-center my-2">
            <input type="text" name="name" id="search-form" class="w-1/2 border border-gray-300 rounded-md p-2"
                placeholder="Search for a member">
            <button type="submit"
                class="px-3 py-2 ms-2 rounded-lg font-semibold text-white bg-blue-500 hover:bg-blue-600 transition-colors duration-200">
                <span>Search</span>
            </button>
        </div>
        <table>

        </table>
    </form>
</div>
<script type="module">
    import axios from 'axios';

    document.addEventListener('DOMContentLoaded', function() {
        const formData = document.getElementById('search-form');
        const table = document.querySelector('table');

        form.addEventListener('submit', async function(event) {
            event.preventDefault(); // Prevent the default form submission

            const nameInput = document.getElementById('name');
            const name = nameInput.value;

            try {
                const response = await axios.get(`{{ route('events.search-name') }}?name=${name}`);
                // Handle the response data and update the table
                updateTable(response.data);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        });

        function updateTable(data) {
            // Implement the logic to update the table with the received data
            console.log(data);
        }
    });
</script>
