@extends('layout')

@section('title')Регистрация@endsection

@section('content')
    <div class="form_block">
        <form method="POST" action="{{route('registration-post')}}" class="form">
            @csrf
            <h1>Регистрация</h1>

            @if(count($errors) > 0)
                <ul class="warning-message">
                @foreach($errors as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            @endif

            <input type="text" name="name" id="name" placeholder="Имя пользователя">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="password" name="password" id="password" placeholder="Пароль">
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Повторите пароль">

            <button class="btn" type="submit">Зарегистрироваться</button>
        </form>
    </div>
@endsection
