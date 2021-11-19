
<div class="form-group{{ $errors->has($id) ? ' has-danger' : '' }}">
    <label class="form-control-label" for="input-{{ $id }}">{{ $placeholder }}</label>
    <input type="{{ $type ?? 'text' }}" name="{{ $id }}" id="{{ $id }}" class="form-control {{ $errors->has($id) ? ' is-invalid' : '' }}" placeholder="{{ $placeholder }}" value="{{ $value ?? '' }}" {{ $required ?? ''}}  autofocus>

    @if ($errors->has('{{ $id }}'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first($id) }}</strong>
    </span>
    @endif
</div>
