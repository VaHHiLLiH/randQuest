@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1>Введите код из письма</h1>
                    <form method="post" action="{{ route('reg') }}">
                        @csrf

                        <input beholder="Код из письма" name="code">

                        <button id="btn-confirm" type="submit">Подтвердить</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
