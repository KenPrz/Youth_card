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
                    <td class="border">
                        <input 
                            name="role[]"
                            type="text"
                            class="w-full border-none focus:ring-0 focus:border-gray-300"
                            placeholder="Role"
                            required
                        />
                    </td>
                    <td class="border">
                        <div class="w-full flex items-center justify-center">
                            <button
                                id="insert-user-button"
                                onclick="toggleModal('modal-id')"
                                type="button" id="insert-user" 
                                class="block text-blue-500 hover:text-blue-600 hover:text-decoration:underline transition-colors duration-200 font-semibold">
                                Add Name
                            </button>
                            <input 
                                name="organizerName[]"

                                type="text"
                                class="hidden w-full border-none focus:ring-0 focus:border-gray-300"
                                placeholder="Organizer Name"
                                required
                            />
                        </div>
                    </td>
                    <td class="border">
                        <input 
                            name="point-reward[]"
                            type="number"
                            class="w-full border-none focus:ring-0 focus:border-gray-300"
                            placeholder="Point Reward"
                            required
                        >
                    </td>
                    <td class="border">
                        <div class="flex items-center justify-center">
                            <button
                                id="delete-role"
                                class="delete-role flex justify-between bg-red-500 text-sm px-3 text-white p-2 rounded-md hover:bg-red-600 transition-colors duration-200">
                                <img class="h-5 w-5 me-1" src="{{ asset('images/delete.svg') }}" alt="">
                                <span>Delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
    <x-modal-search name="add-member-modal" :show="$errors->addMember->isNotEmpty()" focusable>
        @include('events.partials.add-member-modal')
    </x-modal>
</div>
<script type="module">
    $(document).ready(function () {
        function createNewRow() {
            var newRow = $(`
                <tr class="role-row">
                    <td class="border">
                        <input name="role[]" type="text" class="w-full border-none focus:ring-0 focus:border-gray-300" placeholder="Role" required />
                    </td>
                    <td class="border">
                        <div class="w-full flex items-center justify-center">
                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-member-modal')" type="button" id="insert-user" class="text-blue-500 hover:text-blue-600 hover:text-decoration:underline transition-colors duration-200 font-semibold">
                                Add Name
                            </button>
                        </div>
                    </td>
                    <td class="border">
                        <input name="point-reward[]" type="number" class="w-full border-none focus:ring-0 focus:border-gray-300" placeholder="Point Reward" required />
                    </td>
                    <td class="border">
                        <div class="flex items-center justify-center">
                            <button id="delete-role" class="delete-role flex justify-between bg-red-500 text-sm px-3 text-white p-2 rounded-md hover:bg-red-600 transition-colors duration-200">
                                <img class="h-5 w-5 me-1" src="{{ asset('images/delete.svg') }}" alt="">
                                <span>Delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
            `);
            return newRow;
        }

        $('#add-role').on('click', function () {
            var newRow = createNewRow();
            $('#roles-table tbody').append(newRow);
        });

        $(document).on('click', '#delete-role', function () {
            $(this).closest('.role-row').remove();
        });

        $('#insert-user').on('click', function () {
            var newRow = createNewRow();
            console.log(newRow);
        });
    });
</script>


