<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Todos') }}
            </h2>

            <x-primary-button type="a" :href="route('todos.create')">{{ __('Add Todo') }}</x-primary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-table.table>
                <x-table.header :columns="['Todo', 'Due Date', 'Done', '']"/>
                <tbody>
                @foreach($todos as $todo)
                    <x-table.row :is_even="$loop->even">
                        <x-table.cell>{{ $todo->todo }}</x-table.cell>
                        <x-table.cell class="text-center">{{ $todo->due_date }}</x-table.cell>
                        <x-table.cell class="text-center">
                            <input type="checkbox" @checked($todo->done)>
                        </x-table.cell>
                        <x-table.cell class="text-center">
                            <x-primary-button
                                type="a"
                                :href="route('todos.edit', ['todo' => $todo])"
                            >Edit</x-primary-button>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
                </tbody>
            </x-table.table>
        </div>
    </div>
</x-app-layout>
