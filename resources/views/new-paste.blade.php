@extends('layout')

@section('title')Новая паста@endsection

@section('content')
    <div class="form_block">
        <form method="POST" action="{{route('new-paste-post')}}" class="form">
            @csrf
            <h1>Создание новой пасты</h1>
            <input type="text" name="title" id="title" placeholder="Название">
            <select onchange="changeEditorLang()" name="lang" id="lang">
                @foreach($langs as $lang)
                    <option value="{{ $lang->id }}">{{ $lang->lang }}</option>
                @endforeach
            </select>
            <div id="editor"></div>
            <textarea name="code" id="code" value=""></textarea>
            <div class="input_two-col">
                <select name="access_mode" id="access_mode">
                    <option value="{{ \App\Domain\Enums\Pastes\AccessMode::PUBLIC }}">public</option>
                    <option value="{{ \App\Domain\Enums\Pastes\AccessMode::UNLISTED }}">unlisted</option>
                    @if(Auth::user())
                        <option value="{{ \App\Domain\Enums\Pastes\AccessMode::PRIVATE }}">private</option>
                    @endif
                </select>
                <select name="expiration_time" id="expiration_time">
                    <option value="15">15 минут</option>
                    <option value="60">1 час</option>
                    <option value="180">3 час</option>
                    <option value="1440">1 день</option>
                    <option value="10080">1 неделя</option>
                    <option value="43200">1 месяц</option>
                    <option value="0">Без ограничения</option>
                </select>
            </div>
            <button id="loadPaste" class="btn" type="submit">Загрузить</button>
        </form>
    </div>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.11.2/ace.js"
        integrity="sha512-AhCq6G80Ge/e6Pl3QTNGI2Je+6ixVVDmmE4Nui8/dHRBKxMUvjJxn6CYEcMQdTSxHreC3USOxTDrvUPLtN5J7w=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer">
    </script>
    <script src="https://test.test/js/editor.js"></script>
@endsection
