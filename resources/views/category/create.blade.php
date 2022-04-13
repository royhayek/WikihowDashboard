@extends('generals.create', [
'title' => 'New Category',
'information' => 'Category information',
'add_route' => route('category.store'),
])

@section('fields')

@include('partials.image', ['placeholder' => 'Icon','id' => 'icon', 'path' => 'categories', 'required' => true])
@include('partials.input', ['placeholder' => 'Name','id' => 'name', 'required' => true])
@include('partials.textarea', ['placeholder' => 'Description','id' => 'description', 'required' => true])

@endsection
