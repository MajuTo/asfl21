<div class="mb-3">
    <div class="d-flex align-items-center gap-2">
        <img src="{{ captcha_src('math') }}" alt="captcha">
        <input type="text" name="captcha" class="form-control @error('captcha') is-invalid @enderror" placeholder="Captcha" required="required" autocomplete="off">
    </div>
    @error('captcha')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
