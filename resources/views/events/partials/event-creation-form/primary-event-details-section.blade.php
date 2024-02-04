<div class="p-6 text-gray-900 w-full flex flex-col">
    <div class="container flex">
        <div class="mb-3 w-9/12 me-2">
            <label for="event_name" class="form-label text-xl font-semibold">{{ __('Event Name') }}</label>
            <x-text-input id="event_name" class="block mt-1 w-full" type="text" name="event_name" :value="old('title')" required autofocus />
            @error('event_name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3 w-1/4 flex flex-col mt-2">
            <label for="event_level" class="form-label font-semibold">{{ __('Event Level') }}</label>
            <select name="event_level" id="event_level" class="block w-full p-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                <option value="Barangay">Barangay</option>
                <option value="City">City</option>
                <option value="Province">Province</option>
                <option value="National">National</option>
            </select>
            @error('event_level')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="container flex w-full items-center">
        <div class="flex-1 pe-2">
            <div class="mb-6">
                <label for="event_description" class="form-label font-semibold">{{ __('Event Description') }}</label>
                <textarea name="event_description" id="event_description" cols="30" rows="5" class="mt-1 p-2 block w-full border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300"></textarea>
                @error('event_description')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="flex-1 ps-2">
            <div class="mb-3 flex flex-col">
                <div class="flex-1">
                    <label for="start_datetime" class="form-label font-semibold">{{ __('Start Date and Time') }}</label>
                    <x-text-input id="start_datetime" class="block mt-1 w-full" type="datetime-local" name="start_datetime" :value="old('start_datetime')" required autofocus />
                    @error('start_datetime')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="flex-1 mt-2">
                    <label for="end_datetime" class="form-label font-semibold">{{ __('End Date and Time') }}</label>
                    <x-text-input id="end_datetime" class="block mt-1 w-full" type="datetime-local" name="end_datetime" :value="old('end_datetime')" required autofocus />
                    @error('end_datetime')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
