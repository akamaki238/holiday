@props(['name', 'value' => '', 'rows' => 3])

<textarea
    name="{{ $name }}"
    rows="{{ $rows }}"
    {{ $attributes->merge(['class' => 'form-input']) }}
>{{ $value }}</textarea>