<div class="form-group">
    <label class="form-control-label" for="status">{{ $placeholder }}</label>
    <select id="{{ $id }}" name="{{ $id }}[]" class="form-control js-example-theme-multiple"  multiple="multiple" <?php if ($required ?? '') { echo 'required';} ?>>
        @foreach($options as $option)
        @if($value ?? '' != null)
            <option value="{{ $option->id }}" {{ $value->contains('categoryId', $option->id) ? 'selected' : '' }}>{{ $option->name }}</option>
        @else
            <option value="{{ $option->id }}" >{{ $option->name }}</option>
            @endif
        @endforeach
</select>
</div>
