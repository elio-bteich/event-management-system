<h2 class="reservation-form-title">Personal info</h2>
<input type="hidden" name="event_id" value="{{ $event->id }}">
<div class="input-div">
    <input type="text" class="@error('fname') is-invalid @enderror fname" name="fname" placeholder="First Name" required>
    @error('fname')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
<div class="input-div">
    <input type="text" class="@error('lname') is-invalid @enderror" name="lname" placeholder="Last Name" required>
    @error('lname')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
<div class="input-div">
    <input type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Email Address" required>
    @error('email')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
<div class="input-div">
    <input type="tel" class="@error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Phone Number" required>
    @error('phone_number')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
