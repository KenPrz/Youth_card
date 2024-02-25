<div class="container">
    <x-select
        label="Search a User"
        wire:model.defer="model"
        placeholder="Select some user"
        :async-data="route('events.search-name')"
        option-label="name"
        option-value="id"
    />
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
