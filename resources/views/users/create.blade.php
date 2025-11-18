@extends('layouts.adminlte')

@section('content')
    <div class="content-header">
        <h1>Dodaj korisnika</h1>
    </div>

    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                @include('users._form', ['user' => null])
            </form>
        </div>
    </div>
@endsection
