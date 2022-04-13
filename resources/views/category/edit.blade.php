@extends('generals.edit', [
'title' => 'Edit Category',
'information' => 'Category information',
'update_route' => route('category.update', $data->id),
])

@section('fields')

@include('partials.image', ['placeholder' => 'Icon','id' => 'icon', 'path' => 'categories', 'value' => $data->icon])
@include('partials.input', ['placeholder' => 'Name','id' => 'name','value' => $data->name, 'required' => true])
@include('partials.textarea', ['placeholder' => 'Description','id' => 'description','value' => $data->description, 'required' => true])

@endsection
