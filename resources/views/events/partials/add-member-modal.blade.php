<div class="container p-5">
    <h1 class="ms-1 mb-2 text-lg font-semibold">Search a member name</h1>
    <form id="searchForm" class="flex" method="GET" action="{{ route('events.search-name') }}">
        @csrf
        <div class="flex border rounded-lg">
            <input
                id="searchInput"
                name="search"
                placeholder="Search Name"
                class="w-full border-none focus:ring-0 focus:border-gray-300 rounded-s-md"
                required
            />
            <div class="flex justify-end border-e rounded-lg">
                <button
                    type="button"
                    id="searchButton"
                    class="flex justify-center items-center bg-blue-500 text-sm px-5 text-white h-full rounded-e-md hover:bg-blue-600 transition-colors duration-200">
                    <img class="h-5 w-5 me-1" src="{{ asset('images/search.svg') }}" alt="">
                    <span>Search</span>
                </button>
            </div>
        </div>
        <span id="search-warning" class="mt-1 text-sm font-light text-red-500"></span>
    </form>
    <section id="search-result-table" class="w-full mt-4">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="border bg-slate-100 w-2/5">Name</th>
                    <th class="border bg-slate-100 w-2/5">Purok</th>
                    <th class="border bg-slate-100 w-1/5">Actions</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </section>
</div>

<script>
    // Get the form and input elements
    const searchWarning = document.getElementById('search-warning');
    const searchResultTable = document.getElementById('search-result-table');
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');
    const tbody = document.querySelector('#search-result-table tbody');

    searchResultTable.style.display = 'none';
    searchWarning.style.display = 'none';

    // Add an event listener to the button
    document.getElementById('searchButton').addEventListener('click', function() {
        // Check if the input is empty
        if (searchInput.value === '') {
            searchWarning.style.display = 'block';
            searchWarning.innerHTML = 'Please enter a name';
        } else {
            searchWarning.style.display = 'none';
            axios.get('api/search-name', {
                params: {
                    search: searchInput.value
                }
            })
            .then(function (response) {
                if(response.data.length === 0){
                    searchWarning.style.display = 'block';
                    searchWarning.innerHTML = 'No results found';
                } else {
                    // Clear existing rows in the table body
                    tbody.innerHTML = '';

                    // Iterate over the response data and append rows to the table
                    response.data.forEach(member => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td class="border">${member.name}</td>
                            <td class="border">${member.purok}</td>
                            <td class="border">
                                <!-- Add actions here if needed TODO-->
                            </td>
                        `;
                        tbody.appendChild(row);
                    });

                    // Display the table
                    searchResultTable.style.display = 'block';
                }
            })
            .catch(function (error) {
                console.error('Error fetching data:', error);
            });
        }
    });
</script>
