@extends('template.master')
@section('content')
    <div class="content">
        <h1>Halaman Pos Kasir</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

    </div>
@endsection
