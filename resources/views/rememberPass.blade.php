@extends('layouts.app')

@section('content')
    <div id="myPeace" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Восстановление пароля</div>
                    <RestorePassword></RestorePassword>
                    <form method="POST" action="{{ route('restorePassword') }}">
                        @csrf
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                        <input id="email" type="text" class="form-control" name="email">

                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
