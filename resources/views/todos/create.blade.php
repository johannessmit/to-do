<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Todo') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('todos.partials.form')
        </div>
    </div>
</x-app-layout>
