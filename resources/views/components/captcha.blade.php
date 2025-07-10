  {!! NoCaptcha::display() !!}
  @error('g-recaptcha-response')
  <span class="text-danger">{{ $message }}</span>
  @enderror
  <br>
