@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Подтверждение регистрации</div>

                <div class="card-body">
                    <h1>Здравствуйте {{ $name }}</h1>
                    <p>Данный электронный адрес совершил попытку регистрации на ресурсе fuckBlog.org</p>
                    <p>Вам необходимо ввести код из эл. письма на форме регистрации</p>
                    <p class="letter-code">{{ $code }}</p>
                    <p>Если вы не совершали попыток регистрации под этим электронным адресом - {{ $email }}, проигнорируйте данное письмо</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
