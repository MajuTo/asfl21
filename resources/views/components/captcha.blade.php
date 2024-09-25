<div class="form-group form-inline @error('captcha') has-error @enderror">
    <label class="control-label col-lg-3"></label>
    <div class="col-lg-9">
        <img class="d-inline col-lg-5" src="{{ captcha_src('math') }}" alt="captcha">
        <input type="text" name="captcha" class="col-lg-7 form-control w-100" placeholder="Captcha" required="required">
    </div>
    <div class="col-lg-9 col-lg-offset-3">
        @error('captcha')
        <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>
