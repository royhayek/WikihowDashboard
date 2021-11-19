@extends('layouts.app', ['title' => __('User Profile')])

<?php

use App\Models\Settings; ?>

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
<div class="container-fluid mt--7">
    <div class="row">

        <div class="col order-xl-1">
            <div class="card bg-secondary shadow">

                <input type="text" id="articleId" name="articleId" value="{{ $articleId }}" hidden>
                <input type="text" id="partId" name="partId" value="{{ $partId }}" hidden>

                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">{{ __('Add Article Method') }}</h3>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="upload_image_form"
                        action="javascript:void(0)">
                        @csrf
                        @method('Post')

                        <div class="row">
                            <div class="col">
                                @include('partials.input', ['placeholder' => 'Number *','id' => 'number',])
                                @include('partials.input', ['placeholder' => 'Title *','id' => 'title',])
                            </div>
                            <div class="col">
                                <img id="image_preview_container" src="{{ asset('storage/image/image-preview.png') }}"
                                    alt="preview image" style="max-height: 150px;">
                                @include('partials.image', ['placeholder' => 'Image','id' => 'image', 'path' =>
                                'methods'])
                            </div>
                        </div>
                        @include('partials.textarea', ['placeholder' => 'Description *','id' => 'description', 'class'
                        => 'ckeditor'])
                        @include('partials.textarea', ['placeholder' => 'Note','id' => 'note', 'class'
                        => 'ckeditor'])

                        <button type="submit" class="btn btn-success mt-4">Save</button>
                    </form>
                </div>
            </div><br>

            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">{{ __('Article Methods') }}</h3>
                    </div>
                </div>
                <div id="associatedMethods"></div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')

</div>

@endsection

@push('js')

<script>
    $(document).ready(function() {
        getArticleMethods();
        getArticleMethodsSummary();

        $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
   });

   $('#image').change(function(){

    let reader = new FileReader();

    reader.onload = (e) => {

      $('#image_preview_container').attr('src', e.target.result);
    }

    reader.readAsDataURL(this.files[0]);

   });

   $('#upload_image_form').submit(function(e) {

     e.preventDefault();

     var formData = new FormData(this);
        formData.append('articleId', $('#articleId').val());
        formData.append('partId', $('#partId').val())
        formData.append('number', $('#number').val());
        formData.append('title', $('#title').val());
        formData.append('description', CKEDITOR.instances["description"].document.$.body.innerHTML);
        formData.append('note',CKEDITOR.instances["note"].document.$.body.innerHTML);

     $.ajax({
        type:'POST',
        url: "{{ route('articlemethod.store')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
           this.reset();
           getArticleMethods();
        },
        error: function(data){
           console.log(data);
         }
       });
   });
});



    function getArticleMethods() {

        var _token = $("input[name='_token']").val();
        var articleId = $('#articleId').val();
        var partId = $('#partId').val();

        $.ajax({
            url: "{{ route('getArticleMethods') }}",
            type: 'GET',
            data: {
                _token: _token,
                articleId: articleId,
                partId: partId,
            },
            success: function(data) {
                $('#associatedMethods').html(data);
            }
        });
    }

    function getArticleMethodsSummary(articleId) {
        var _token = $("input[name='_token']").val();
        var articleId = $('#articleId').val();
        $.ajax({
            url: "{{ route('getArticleMethodsSummary') }}",
            type: 'GET',
            data: {
                _token: _token,
                articleId: articleId,
            },
            success: function(data) {
                $('#articleMethodsSummary').html(data);
            }
        });
    }


    function addQuestion(questionId, examId) {
        var _token = $("input[name='_token']").val();
        var articleId = $('#articleId').val();
        var number = $('#number').val();
        var title = $('#title').val();
        var description = $('#description').val();
        var image = $('#image').val();
        var note = $('#note').val();

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('articlemethod.store') }}",
            type: 'POST',
            data: {
                _token: _token,
                articleId: articleId,
                number: number,
                title: title,
                description: description,
                image: image,
                note: note,
            },
            success: function(data) {
                getArticleMethods();
                getArticleMethodsSummary();
            }
        });
    }

    function removeQuestion(questionId, examId) {
        var _token = $("input[name='_token']").val();

        $.ajax({
            url: "{{ route('articlemethod.delete') }}",
            type: 'POST',
            data: {
                _token: _token,
                examId: examId,
                questionId: questionId,
            },
            success: function(data) {
                getArticleMethods();
                getArticleMethodsSummary();
            },
            error: function(data) {
                var errors = data.responseJSON;
                console.log(errors);
            }
        });
    }
</script>
@endpush
