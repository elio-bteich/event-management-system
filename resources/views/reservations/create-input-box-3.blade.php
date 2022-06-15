<h2 class="reservation-form-title">Email Verification</h2>
<div class="input-div">
    <input type="text" class="@error('email_code') is-invalid @enderror fname" name="email_code" placeholder="Email code" required>
    @error('email_code')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

