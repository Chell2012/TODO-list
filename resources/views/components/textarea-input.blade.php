@props(['disabled' => false])

<textarea @disabled($disabled) {{ $attributes }}>
{{ $slot }}
</textarea>
