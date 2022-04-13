@extends('generals.edit', [
'title' => 'Settings',
'information' => '',
'update_route' => route('settings.update', $data->id),
])

@section('fields')
@include('partials.image', ['placeholder' => 'App Logo','id' => 'appLogo', 'path' => '', 'value' => $data->appLogo])
@include('partials.input', ['placeholder' => 'App Name','id' => 'appName','value' => $data->appName])
@include('partials.input', ['placeholder' => 'App Short Description','id' => 'shortDescription','value' => $data->shortDescription])
@include('partials.input', ['placeholder' => 'App Version','id' => 'appVersion','value' => $data->appVersion])
@include('partials.input', ['placeholder' => 'Firebase Cloud Messaging Key','id' => 'fcmKey','value' => $data->fcmKey])
@include('partials.textarea', ['placeholder' => 'About Us','id' => 'aboutUs', 'class' => 'ckeditor', 'value' => $data->aboutUs])

@endsection
