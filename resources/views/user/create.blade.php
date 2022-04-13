@extends('generals.create', [
'title' => 'New User',
'information' => 'User information',
'add_route' => route('user.store'),
])

@section('fields')

@include('partials.image', ['placeholder' => 'Avatar','id' => 'avatar', 'path' => 'users'])
@include('partials.input', ['placeholder' => 'Name','id' => 'name', 'required' => true])
@include('partials.input', ['placeholder' => 'Email','id' => 'email', 'required' => true])
@include('partials.input', ['placeholder' => 'Password','id' => 'password', 'required' => true])
@include('partials.textarea', ['placeholder' => 'Bio','id' => 'bio'])
@include('partials.input', ['placeholder' => 'Webiste','id' => 'website', 'required' => true])

@endsection
