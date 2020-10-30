@extends('layouts.user')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Dashboard</h5>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('img/favicon.png') }}" class="img-responsive">
                    <br><br><br>
                    <h1>SELAMAT DATANG</h1>
                    <h2>{{ Auth::user()->name }}</h2>
                    <h2>Sistem Informasi Inventaris Kantor Berbasis Web</h2>
                    <h2>Kantor Area Denpasar 2</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
