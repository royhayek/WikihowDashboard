@extends('generals.create', [
'title' => 'New Category',
'information' => 'Category information',
'add_route' => route('category.store'),
])

@section('fields')

@include('partials.image', ['placeholder' => 'Icon','id' => 'icon', 'path' => 'categories'])
@include('partials.input', ['placeholder' => 'Name','id' => 'name',])
@include('partials.textarea', ['placeholder' => 'Description','id' => 'description'])

@endsection
