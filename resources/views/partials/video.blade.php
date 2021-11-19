<label class="form-control-label" for="input-name">{{ $placeholder }}</label>
<div class="col-sm-7">
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-new img-thumbnail" style="width: 200px; height: 125px;padding: 0 0;margin: 0 0;">
            @if($value ?? '' != null)
            <video style="width: 200px; height: 125px;padding: 0 0;margin: 0 0;" controls>
                <source src="/uploads/{{ $path }}/{{ $value ?? '' }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            @else
            <img src="{{URL::asset("/assets/img/placeholder.png")}}" alt="...">
            @endif
        </div>
        <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px; max-height: 125px;"></div>
        <div>
            <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select {{ $placeholder }}</span><span class="fileinput-exists">Change</span><input id="{{ $id }}" type="file" name="{{ $id }}" value="{{ $value ?? '' ?? '' ?? '' }}" <?php if ($required ?? '') {
                                                                                                                                                                                                                                                                echo 'required';
                                                                                                                                                                                                                                                            } ?>></span>
            <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
        </div>
    </div>
</div>
