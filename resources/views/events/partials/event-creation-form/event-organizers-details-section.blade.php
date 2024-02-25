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
                    <x-select
                        label="Search a User"
                            wire:model.defer="model"
                            placeholder="Select some user"
                            :async-data="route('events.search-name')"
                            option-label="name"
                            option-value="id"
                    />
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
<script type="module">
    $(document).ready(function(){
        $("#add-role-button").click(function() {
            // Clone the parent <tr>
            var clonedRow = $(".organizer-row").first().clone();
            
            // Increment the data-row-index attribute value
            var rowIndex = parseInt(clonedRow.data('row-index')) + 1;
            clonedRow.attr('data-row-index', rowIndex);
            
            // Clear input values if needed
            clonedRow.find('input[type="text"], input[type="number"]').val('');
            
            // Append the cloned row to the table body
            clonedRow.appendTo($("#event-organizers-table tbody"));
        });
        $(document).on('click', '.delete-role-button', function() {
            if ($('.organizer-row').length === 1) {
                alert('You cannot delete the last row');
                return;
            }
            $(this).closest('tr').remove();
        });
    });
</script>  