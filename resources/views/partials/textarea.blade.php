<div class="form-group{{ $errors->has($id) ? ' has-danger' : '' }}">
    <label class="form-control-label" for="input-{{ $id }}">{{ $placeholder }}</label>
    <textarea id="{{ $id }}" name="{{ $id }}" class="form-control {{ $class ?? ''}}" rows="5" <?php if($required ?? '') {echo 'required';} ?>>{{ $value ?? '' }}</textarea>

    @if ($errors->has('{{ $id }}'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first($id) }}</strong>
    </span>
    @endif
</div>
