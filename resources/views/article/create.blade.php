@extends('generals.create', [
'title' => 'New Article',
'information' => 'Article information',
'add_route' => route('article.store'),
])

@section('fields')

<div class="row">
    <div class="col">@include('partials.image', ['placeholder' => 'Image','id' => 'image', 'path' => 'articles'])</div>
    <div class="col">@include('partials.video', ['placeholder' => 'Video','id' => 'video', 'path' => 'articles'])</div>
</div>
@include('partials.selectmultiple', ['placeholder' => 'Categories *','id' => 'categories', 'options' => $categories,'required' => true])
@include('partials.input', ['placeholder' => 'Title *','id' => 'title',])
@include('partials.textarea', ['placeholder' => 'Description *','id' => 'description', 'class' => 'ckeditor'])
@include('partials.textarea', ['placeholder' => 'Tips','id' => 'tips', 'class' => 'ckeditor'])
@include('partials.textarea', ['placeholder' => 'References','id' => 'references', 'class' => 'ckeditor'])
@include('partials.textarea', ['placeholder' => 'Article Info','id' => 'articleInfo', 'class' => 'ckeditor'])
@include('partials.textarea', ['placeholder' => 'Warnings','id' => 'warnings', 'class' => 'ckeditor'])
@include('partials.textarea', ['placeholder' => 'Things Needed','id' => 'thingsNeeded', 'class' => 'ckeditor'])
@include('partials.textarea', ['placeholder' => 'Video Transcript','id' => 'videoTranscript', 'class' => 'ckeditor'])
@include('partials.textarea', ['placeholder' => 'Key Takeways','id' => 'keyTakeaways', 'class' => 'ckeditor'])


@endsection

@push('js')
<script>
    $(document).ready(function() {
    $('#categories').select2();
});
</script>
@endpush
