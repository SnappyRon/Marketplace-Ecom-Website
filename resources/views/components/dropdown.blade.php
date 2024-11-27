{{-- resources/views/components/dropdown.blade.php --}}
<div {{ $attributes->merge(['class' => 'relative']) }}>
    {{ $trigger }}

    <div class="dropdown-menu">
        {{ $content }}
    </div>
</div>
