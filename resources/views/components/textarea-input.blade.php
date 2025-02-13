@props(['disabled' => false])

<textarea @disabled($disabled) {{ $attributes }}>
    @if(isset($attributes->value))
        {{$attributes->value}}
    @endif
</textarea>
