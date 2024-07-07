<div {{ $attributes->merge(['class' => 'form-check form-switch'])->only('class') }}>
    <input class="form-check-input" type="checkbox" role="switch" id="{{ $name }}" name="{{ $name }}" {{ $attributes->has('checked') ? 'checked' : '' }}>
    <label class="form-check-label" for="{{ $name }}">{{ $label }} </label>
</div>
