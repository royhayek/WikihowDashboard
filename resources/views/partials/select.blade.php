<div class="form-group">
    <label class="form-control-label" for="status">{{ $placeholder }}</label>
    <select class="form-control" id="{{ $id }}" name="{{ $id }}" <?php if($required ?? '') {echo 'required';} ?>>
    <option disabled selected value> {{ __('Select')." ".__($placeholder)}} </option>
        @foreach($options as $key => $option)
        @if($value ?? '' != null)
            <option value="{{ $key }}" {{ ( $value  == $key) ? 'selected' : '' }}>{{ $option }}</option>
        @else
            <option value="{{ $key }}" >{{ $option }}</option>
            @endif
        @endforeach
    </select>
</div>
