@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p>{{ Auth::user()->name }}</p>
            <br/>
            <a href="{{ route('logout') }}">LogOut</a>
        </div>
    </div>
</div>
@endsection
