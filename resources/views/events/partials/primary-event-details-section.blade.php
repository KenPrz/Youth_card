<div class="p-6 text-gray-900 w-full">
    <div class="container">
        <div class="mb-3">
            <label for="event-name"
                class="form-label text-xl font-semibold">{{ __('Event Name') }}</label>
            <x-text-input id="event-name" class="block mt-1 w-full" type="text" name="title"
                :value="old('title')" required autofocus />
            @error('event-name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="container flex w-full items-center">
        <div class="flex-1 pe-2">
            <div class="mb-6">
                <label for="event-description" class="form-label font-semibold">{{ __('Event Description') }}</label>
                <textarea name="description" id="event-description" cols="30" rows="5"
                        class="mt-1 p-2 block w-full border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300"></textarea>
                @error('event-description')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="flex-1 ps-2">
            <div class="mb-3">
                <label for="event-date"
                    class="form-label font-semibold">{{ __('Event Date') }}</label>
                <x-text-input id="event-date" class="block mt-1 w-full" type="date"
                    name="date" :value="old('date')" required autofocus />
                @error('event-date')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 flex">
                <div class="flex-1 pe-2">
                    <label for="start-time"
                        class="form-label font-semibold">{{ __('Start Time') }}</label>
                    <x-text-input id="start-time" class="block mt-1 w-full" type="time"
                        name="start-time" :value="old('start-time')" required autofocus />
                    @error('start-time')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="flex-1 ps-2">
                    <label for="end-time"
                        class="form-label font-semibold">{{ __('End Time') }}</label>
                    <x-text-input id="end-time" class="block mt-1 w-full" type="time"
                        name="end-time" :value="old('end-time')" required autofocus />
                    @error('end-time')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>