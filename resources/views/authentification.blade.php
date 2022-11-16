@extends('layout')

@section('title')Авторизация@endsection

@section('content')
    <div class="form_block">
        <form method="POST" action="{{route('login-post')}}" class="form">
            @csrf
            <h1>Авторизация</h1>
            <input type="text" name="name" id="name" placeholder="Имя пользователя">
            <input type="password" name="password" id="password" placeholder="Пароль">

            <button class="btn" type="submit">Войти</button>
        </form>
    </div>
@endsection
