@props([
    'todo' => null
])

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ $todo === null ? __('Todo ...') : __('Todo: :text', [
                'text' => $todo->todo
            ]) }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            @if($todo)
                {{ __("Update your todo") }}
            @else
                {{ __("Create a new Todo") }}
            @endif
        </p>
    </header>

    <form method="post" action="{{ route($todo ? 'todos.update' : 'todos.store', ['todo' => $todo]) }}" class="mt-6 space-y-6">
        @csrf
        @method($todo ? 'patch' : 'post')

        <div>
            <x-input-label for="todo" :value="__('Todo')" />
            <x-text-input id="todo" name="todo" type="text" class="mt-1 block w-full" :value="old('todo', $todo?->todo)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('todo')" />
        </div>

        <div>
            <x-input-label for="due_date" :value="__('Due Date')" />
            <x-text-input id="due_date" name="due_date" type="date" class="mt-1 block w-full" :value="old('due_date', $todo?->due_date)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('due_date')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'todo-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
