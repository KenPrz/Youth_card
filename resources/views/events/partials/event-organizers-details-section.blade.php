<div class="p-6 text-gray-900 w-full">
    <h1 class="font-semibold text-xl">
        {{ __('Event Organizers') }}
    </h1>
    <section class="mt-3 w-full flex flex-col">
        <div class="flex justify-end">
            <button
                id="add-role"
                type="button"
                class="flex justify-between bg-blue-500 text-sm px-3 text-white p-2 rounded-md hover:bg-blue-600 transition-colors duration-200">
                <img class="h-5 w-5 me-1" src="{{ asset('images/add-circle.svg') }}" alt="">
                <span>Add Role</span>
            </button>
        </div>
    </section>
    <section>
        <table class="w-full mt-2 border" id="roles-table">
            <thead>
                <tr>
                    <th class="border w-1/4">Role</th>
                    <th class="border w-1/4">Name</th>
                    <th class="border w-1/4">Point Reward</th>
                    <th class="border w-1/4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="role-row">
                    <td>
                        <x-text-input
                            name="role[]"
                            type="text"
                            class="w-full"
                            placeholder="Role"
                            required
                        />
                    </td>
                    <td>
                        <x-text-input
                            name="name[]"
                            type="text"
                            class="w-full"
                            placeholder="Full Name"
                            required
                        />
                    </td>
                    <td>
                        <x-text-input
                            name="point-reward[]"
                            type="number"
                            class="w-full"
                            placeholder="Point Reward"
                            required
                        />
                    </td>
                    <td class="w-full flex items-center justify-center border">
                        <button
                            id="delete-role"
                            class="delete-role flex justify-between bg-red-500 text-sm px-3 text-white p-2 rounded-md hover:bg-red-600 transition-colors duration-200">
                            <img class="h-5 w-5 me-1" src="{{ asset('images/delete.svg') }}" alt="">
                            <span>Delete</span>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</div>

<script>
document.getElementById('add-role').addEventListener('click', function () {
    var newRow = document.querySelector('.role-row').cloneNode(true);
    newRow.querySelectorAll('input').forEach(function (input) {
        input.value = '';
    });
    document.querySelector('#roles-table tbody').appendChild(newRow);
});
</script>
