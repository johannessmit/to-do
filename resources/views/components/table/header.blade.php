@props([
    'columns'
])

<thead>
    @foreach($columns as $column)
        <th class="p-6 text-gray-900">{{ $column }}</th>
    @endforeach
</thead>
