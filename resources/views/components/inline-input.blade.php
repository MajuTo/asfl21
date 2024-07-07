<div {{ $attributes->merge(['class' => 'row']) }}>
    <label for="{{ $name }}" class="col-sm-{{ $labelcols ?? 3 }} col-form-label text-end fw-bold">{{ $label }}</label>
    <div class="col-sm-{{ $inputcols ?? 9 }}">
        <input type="{{ $type ?? 'text' }}" class="form-control" id="{{ $name }}" name="{{ $name }}" value="{{ $value ?? '' }}" placeholder="{{ $placeholder ?? '' }}">
    </div>
</div>
