@props(['disabled' => false])
<div class="tag-container" id="tagContainer" onclick="focusInput()">
    <input @disabled($disabled) {{ $attributes->merge(['type'=>"text", 'class'=>"tag-input", 'id'=>"tagInput"]) }}>
</div>
