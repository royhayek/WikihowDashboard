<div class="form-group">
    <label class="form-control-label" for="status">{{ $placeholder }}</label>
    <select class="form-control" id="{{ $id }}" name="{{ $id }}" <?php if($required ?? '') {echo 'required';} ?>>
    <option disabled selected value> {{ __('Select')." ".__($placeholder)}} </option>
        @foreach($options as $option)
        @if($value ?? '' != null)
            <option value="{{ $option->id }}" {{ $value->contains('categoryId', $option->id) ? 'selected' : '' }} {{ ( $value  == $key) ? 'selected' : '' }}>{{ $option->part }}</option>
        @else
            <option value="{{ $option->id }}" >{{ $option->part }}</option>
            @endif
        @endforeach
    </select>
</div>
