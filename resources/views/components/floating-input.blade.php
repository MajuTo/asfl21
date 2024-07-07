
<div {{ $attributes->merge(['class' => 'input-group has-validation'])->only('class') }}>
{{--    <span class="input-group-text">@</span>--}}
    <div class="form-floating @if($errors->has($name)) {{ 'is-invalid' }} @endif">
        <input type="{{ $attributes->get('type') ?: 'text' }}"
               class="form-control @if($errors->has($name)) {{ 'is-invalid' }} @endif"
               id="{{ $name }}"
               name="{{ $name }}"
               placeholder="{{ $label }}"
               {{ $attributes->has('required') ? 'required' : '' }}
        >
        <label for="{{ $name }}">{{ $label }}</label>
    </div>
    @if($errors->has($name))
    <div class="invalid-feedback">
        {{ $errors->first($name) }}
    </div>
    @endif
</div>
{{--@dump($errors->has($name))--}}
