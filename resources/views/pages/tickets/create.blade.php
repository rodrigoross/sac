<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between content-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight align-middle">
                {{ __('New Ticket') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-white p-6 shadow-sm rounded">
        <form action="{{ route('tickets.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Email Address -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? Auth::user()->name" required
                    autofocus @auth disabled @endauth />
            </div>

            <!-- Contato -->
            <div class="mt-4 flex flex-col md:flex-row gap-2">
                <div class="flex-auto">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" required
                        autocomplete="current-email" :value="old('email') ?? Auth::user()->email" @auth disabled @endauth />
                </div>

                <div class="grow-0">
                    <x-label for="phone" :value="__('Phone')" />

                    <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" required
                        :value="old('phone') ?? Auth::user()->phone" autocomplete="current-phone" @auth disabled @endauth />
                </div>
            </div>

            <div class="mt-4 flex flex-col md:flex-row justify-between gap-2 ">
                <div class="flex-auto">
                    <x-label for="subject" :value="__('Subject')" />

                    <x-input id="subject" class="block mt-1 w-full" type="tel" name="subject" required
                        autocomplete="current-subject" :value="old('subject')" />
                </div>
                <div class="grow-0">
                    <x-label for="name" :value="__('Type')" />

                    <select name="type" id="type"
                        class="block appearance-none w-full  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none"
                        required>
                        <option value="0" @selected(old('type' === '0'))> {{ __('Problems') }}</option>
                        <option value="1" @selected(old('type' === '1'))> {{ __('Suggestions') }}</option>
                        <option value="2" @selected(old('type' === '2'))> {{ __('Doubts') }}</option>
                        <option value="3" @selected(old('type' === '3'))> {{ __('Pricing') }}</option>
                    </select>
                </div>
            </div>

            <div class="mt-4">
                <x-label for="description" :value="__('Description')" />
                <textarea name="description" id="description" rows="10"
                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    placeholder="{{ __('Type your question...') }}" :value="old('description')"></textarea>
            </div>

            <div class="mt-4">
                <x-label for="attachments" :value="__('Attachments upload')" />
                <input type="file" name="attachments[]" id="attachments" multiple
                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded border border-gray-300 cursor-pointer focus:outline-none file:bg-gray-100 file:border-gray-300" />
            </div>
    </div>

    <x-button type="submit" class="mt-4 mx-auto">{{ __('Save') }}</x-button>
    </form>
    </div>
</x-app-layout>
