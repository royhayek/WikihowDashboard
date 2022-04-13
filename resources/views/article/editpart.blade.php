@extends('layouts.app', ['title' => __('User Profile')])

<?php

use App\Models\Settings; ?>

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
<div class="container-fluid mt--7">
    <div class="row">

        <div class="col order-xl-1">
            <div class="card bg-secondary shadow">


                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">{{ __('Add Article Method') }}</h3>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="upload_image_form" action="{{ route('articlemethod.update', $data->id) }}">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col">
                                @include('partials.input', ['placeholder' => 'Number *','id' => 'number', 'value' => $data->number])
                                @include('partials.input', ['placeholder' => 'Title *','id' => 'title', 'value' => $data->title])
                            </div>
                            <div class="col"  style="margin-left: 50px">
                                @include('partials.image', ['placeholder' => 'Image','id' => 'image', 'path' =>
                                'articles/methods', 'value' => $data->image])
                            </div>
                        </div>
                        @include('partials.textarea', ['placeholder' => 'Description *','id' => 'description', 'class'
                        => 'ckeditor', 'value' => $data->description])
                        @include('partials.textarea', ['placeholder' => 'Note','id' => 'note', 'class'
                        => 'ckeditor', 'value' => $data->note])

                        <button type="submit" class="btn btn-success mt-4">Save</button>
                    </form>
                </div>
            </div><br>
        </div>
    </div>
    @include('layouts.footers.auth')

</div>

@endsection
