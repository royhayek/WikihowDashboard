@extends('generals.edit', [
'title' => 'Edit Article',
'information' => 'Article information',
'update_route' => route('article.update', $data->id),
])

@section('fields')

<div class="row">
    <div class="col">@include('partials.image', ['placeholder' => 'Image','id' => 'image', 'path' => 'articles', 'value' => $data->image])</div>
    <div class="col">@include('partials.video', ['placeholder' => 'Video','id' => 'video', 'path' => 'articles', 'value' => $data->video])</div>
</div>
@include('partials.selectmultiple', ['placeholder' => 'Categories *','id' => 'categories', 'options' => $categories, 'value' => $selectedCategories, 'required' => true])
@include('partials.input', ['placeholder' => 'Title','id' => 'title', 'value' => $data->title])
@include('partials.textarea', ['placeholder' => 'Description','id' => 'description', 'class' => 'ckeditor', 'value' => $data->description])
@include('partials.textarea', ['placeholder' => 'Tips','id' => 'tips', 'class' => 'ckeditor', 'value' => $data->tips])
@include('partials.textarea', ['placeholder' => 'References','id' => 'references', 'class' => 'ckeditor', 'value' => $data->references])
@include('partials.textarea', ['placeholder' => 'Article Info','id' => 'articleInfo', 'class' => 'ckeditor', 'value' => $data->articleInfo])
@include('partials.textarea', ['placeholder' => 'Warnings','id' => 'warnings', 'class' => 'ckeditor', 'value' => $data->warnings])
@include('partials.textarea', ['placeholder' => 'Things Needed','id' => 'thingsNeeded', 'class' => 'ckeditor', 'value' => $data->thingsNeeded])
@include('partials.textarea', ['placeholder' => 'Video Transcript','id' => 'videoTranscript', 'class' => 'ckeditor', 'value' => $data->videoTranscript])
@include('partials.textarea', ['placeholder' => 'Key Takeways','id' => 'keyTakeaways', 'class' => 'ckeditor', 'value' => $data->keyTakeaways])

@endsection

@push('js')
<script>
    $(document).ready(function() {
    $('#categories').select2();
});
</script>
@endpush
