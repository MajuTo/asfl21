<div {{ $attributes->merge(['class' => 'form-floating'])->only('class') }}>
    <select class="form-select" id="{{ $name }}" aria-label="Floating label select example">
        @foreach($options as $option)
            <option value="{{ $option->$value }}" @if($option->$value === $selected ?? null) {{ 'selected' }} @endif>{{ $option->$text }}</option>
        @endforeach
    </select>
    <label for="{{ $name }}">{{ $label }}</label>
</div>
