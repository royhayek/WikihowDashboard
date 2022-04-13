@extends('generals.edit', [
'title' => 'Edit User',
'information' => 'User information',
'update_route' => route('user.update', $data->id),
])

@section('fields')

<div style="display:none">@include('partials.input', ['placeholder' => 'Id','id' => 'id', 'required' =>
    true, 'value' => $data->id])
</div>

@include('partials.image', ['placeholder' => 'Avatar','id' => 'avatar', 'path' => 'users', 'value' => $data->avatar])
@include('partials.input', ['placeholder' => 'Name','id' => 'name', 'required' => true, 'value' => $data->name])
@include('partials.input', ['placeholder' => 'Email','id' => 'email', 'required' => true, 'value' => $data->email])
@include('partials.input', ['placeholder' => 'Password','id' => 'password', 'required' => true, 'value' =>
$data->password, 'type' => 'password'])
@include('partials.textarea', ['placeholder' => 'Bio','id' => 'bio', 'value' => $data->bio])
@include('partials.input', ['placeholder' => 'Website','id' => 'website', 'required' => true, 'value' => $data->website])

@endsection
