@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ $title }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ $action_link }}" class="btn btn-sm btn-primary">{{ $addbutton }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">

                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                            <span class="alert-inner--text"><strong>Success!</strong> {{ session('status')}}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" style="table-layout:fixed;border: 0px;">
                            <thead class="thead-light">
                                <tr>
                                    @foreach($fields as $field)
                                    <th scope="col">{{ $field }}</th>
                                    @endforeach
                                    <th scope=" col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @yield('tbody')
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">

                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
</div>
@endsection
