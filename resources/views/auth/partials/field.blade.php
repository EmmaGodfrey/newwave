<div class="auth-field">
    <label for="{{ $name }}">{{ $label }}</label>
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" autocomplete="{{ $autocomplete }}" required
        @if($type !== 'password') value="{{ $value ?? '' }}" @endif
        @error($name) aria-invalid="true" aria-describedby="{{ $name }}-error" @enderror>
    @error($name)
        <span class="auth-error" id="{{ $name }}-error" role="alert">{{ $message }}</span>
    @enderror
</div>
