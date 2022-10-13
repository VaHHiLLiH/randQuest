@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Восстановление пароля</div>
                    <RestorePassword></RestorePassword>
                    <!--<div class="card-body">
                        <form method="POST" action="{{ route('restorePassword') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Почта</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
@endsection
