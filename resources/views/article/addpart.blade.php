@extends('layouts.app', ['title' => __('User Profile')])

<?php

use App\Models\Settings; ?>

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card bg-secondary shadow">

                <input type="text" id="articleId" name="articleId" value="{{ $data->id }}" hidden>

                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0" style="margin-right: 20px;">{{ __('Article Information') }}</h3>
                        <a class="btn btn-sm btn-icon text-blue" href="{{ route('article.edit', $data->id) }}">
                            <i class="fas fa-pen text-blue"></i> Edit Article
                        </a>
                    </div>
                </div>

                <div class="card-body pt-0 pt-md-4">
                    @include('partials.textandvalue', ['title' => 'Author' ,'value' => $data->author->name])
                    @include('partials.textandvalue', ['title' => 'Title' ,'value' => $data->title])
                    @include('partials.textandvalue', ['title' => 'Views' ,'value' => $data->views ])
                </div>
            </div><br>

            {{-- <div class="card bg-secondary shadow">

                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">{{ __('Article Methods Summary') }}</h3>
        </div>
    </div>

</div> --}}
</div>

<div class="col-xl-8 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Add Method Part') }}</h3>
            </div>
        </div>

        <div class="card-body">
            <form method="post" action="" autocomplete="off">
                @csrf
                @method('put')
                <input type="text" id="partId" name="partId" hidden>
                @include('partials.input', ['placeholder' => 'Part *','id' => 'part', 'type' => 'number', 'value' => $lastPart])
                @include('partials.input', ['placeholder' => 'Title *','id' => 'title',])

                <button type="button" onclick="addQuestion()" class="btn btn-success mt-4">Save</button>
            </form>
        </div>
    </div><br>

    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Method Parts') }}</h3>
            </div>
        </div>
        <div id="associatedMethodParts"></div>
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
    });



    function getArticleMethods() {

        var _token = $("input[name='_token']").val();
        var articleId = $('#articleId').val();

        $.ajax({
            url: "{{ route('getArticleMethodParts') }}",
            type: 'GET',
            data: {
                _token: _token,
                articleId: articleId,
            },
            success: function(data) {
                console.log(data);
                $('#associatedMethodParts').html(data);
            }
        });
    }



    function addQuestion(questionId, examId) {
        var _token = $("input[name='_token']").val();
        var articleId = $('#articleId').val();
        var part = $('#part').val();
        var title = $('#title').val();
        var partId = $('#partId').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('articlemethodpart.store') }}",
            type: 'POST',
            data: {
                _token: _token,
                articleId: articleId,
                part: part,
                title: title,
                partId: partId,
            },
            success: function(data) {
                getArticleMethods();
                $('#title').val("");

                if ($('#partId').val() != null) {
                    $('#part').val(parseInt($('#part').val()) + 1);
                }
                $('#partId').val()
                $('#title').val("")

                $(document).ready(function() {
                    $('html,body').animate({
                        scrollTop: document.body.scrollHeight
                    }, {
                        duration: '1000'
                    });
                })
            }
        });
    }

    function editArticlePart(part) {

        $('#partId').val("");
        $('#part').val("");
        $('#title').val("");

        $('#partId').val(part.id);
        $('#part').val(part.part);
        $('#title').val(part.title);

        $('html,body').animate({
            scrollTop: 0
        }, {
            duration: '1000'
        });
    }

    function removeQuestion(partId) {
        var _token = $("input[name='_token']").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('articlemethodpart.delete') }}",
            type: 'POST',
            data: {
                _token: _token,
                partId: partId,
            },
            success: function(data) {
                $('#part').val(data);
                $('#title').val("");
                getArticleMethods();
            },
            error: function(data) {
                var errors = data.responseJSON;
                console.log(errors);
            }
        });
    }
</script>
@endpush
