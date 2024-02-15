<div class="p-6 text-gray-900 w-full flex flex-col">
    <h1 class="mb-4 text-xl font-semibold">Event Organizers</h1>
    <table class="w-full" id="event-organizers-table">
        <thead class="border-2">
            <tr>
                <th class="w-1/4 border-2 p-2 bg-slate-100">Role</th>
                <th class="w-1/4 border-2 p-2 bg-slate-100">Name</th>
                <th class="w-1/4 border-2 p-2 bg-slate-100">Points</th>
                <th class="w-1/4 border-2 p-2 bg-slate-100">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr class="organizer-row" data-row-index="1">
                <td class="border-2">
                    <input placeholder="Role Name" class="focus-ring-0 border-none block mt-1 w-full" type="text" name="organizers[1][role_name]" required autofocus />
                </td>
                <td class="border-2">
                    <div class="w-full flex justify-center items-center">
                        <button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'add-organizer')"
                            type="button"
                            class="font-semibold text-blue-500 hover:text-blue-600 transition-colors duration-200">
                            <span>Add Name</span>
                        </button>
                    </div>
                </td>
                <td class="border-2">
                    <input placeholder="Point Reward" 
                            
                    class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none focus-ring-0 border-none block mt-1 w-full" type="number" name="organizers[1][role_points]" required autofocus />
                </td>
                <td class="border-2">
                    <div class="w-full flex justify-center items-center">
                        <button
                            type="button"
                            class="delete-role-button px-3 py-1 rounded-lg font-semibold text-white bg-red-500 hover:bg-red-600 transition-colors duration-200">
                            <span>Delete</span>
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="flex item-center justify-end mt-2">
        <button
            type="button"
            id="add-role-button"
            class="px-3 py-1 rounded-lg font-semibold text-white bg-blue-500 hover:bg-blue-600 transition-colors duration-200"
        >
            <span>Add Role</span>
        </button>
    </div>
</div>
    <x-modal :maxWidth="'sm'" id="search-modal" name="add-organizer" :show="$errors->addOrganizer->isNotEmpty()" focusable x-on:close-modal="closeModal">
        @include('events.partials.event-creation-form.name-search')
    </x-modal>
<script>
    // Add event listener for adding roles
    document.getElementById('add-role-button').addEventListener('click', function () {
        addRoleRow();
    });
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('delete-role-button')) {
            deleteRoleRow(event.target.closest('.organizer-row'));
        }
    });

    function addRoleRow() {
        const tableBody = document.querySelector('#event-organizers-table tbody');
        const newRow = tableBody.lastElementChild.cloneNode(true);
        const newIndex = tableBody.childElementCount + 1;

        newRow.setAttribute('data-row-index', newIndex);
        newRow.querySelector('input[name^="organizers"]').name = `organizers[${newIndex}][role_name]`;
        newRow.querySelector('input[name^="organizers"]').value = '';
        newRow.querySelector('input[name^="organizers"]').name = `organizers[${newIndex}][role_points]`;
        newRow.querySelector('input[name^="organizers"]').value = '';

        tableBody.appendChild(newRow);
    }

    function deleteRoleRow(row) {
        const tableBody = document.querySelector('#event-organizers-table tbody');
        if (tableBody.childElementCount > 1) {
            tableBody.removeChild(row);
        }
    }

    function getMemberName(){
        console.log('clicked');
    }
</script>