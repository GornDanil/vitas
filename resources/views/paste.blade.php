@extends('layout')

@section('title'){{ $paste->title }}@endsection

@section('content')

    <style>
        .pastes{
            width: 600px;
            align-items: center;
        }
        .paste-info p{
            font-weight: 500;
        }
    </style>

    <div class="pastes form" style="margin: 0 auto;">
        <h1 class="paste_title" style="font-weight: 600; font-size: 32px">{{ $paste->title }}</h1>

        <div class="paste-info" style="width: 500px; margin-bottom: 40px">
            <p>{{ $paste->lang->lang }}</p>
            @if($paste->user_id == null)
                <p>Anonymous</p>
            @else
                <p>{{ $paste->user->name }}</p>
            @endif
            <p>{{ $paste->created_at }}</p>
            <p>{{ $paste->access_mode }}</p>
        </div>

        <div id="editor"></div>
        <div class="paste-code">
            <textarea name="code" id="code">{{ $paste->code }}</textarea>
        </div>

    </div>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.11.2/ace.js"
        integrity="sha512-AhCq6G80Ge/e6Pl3QTNGI2Je+6ixVVDmmE4Nui8/dHRBKxMUvjJxn6CYEcMQdTSxHreC3USOxTDrvUPLtN5J7w=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer">
    </script>
    <script>
        var lang = '{{ $paste->lang->lang }}'.toLowerCase();
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");

        switch (lang) {
            case 'html':
                editor.session.setMode("ace/mode/html");
                break;
            case 'css':
                editor.session.setMode("ace/mode/css");
                break;
            case 'javascript':
                editor.session.setMode("ace/mode/javascript");
                break;
            case 'php':
                editor.session.setMode("ace/mode/php");
                break;
            case 'c':
                editor.session.setMode("ace/mode/c_cpp");
                break;
            case 'c++':
                editor.session.setMode("ace/mode/c_cpp");
                break;
            case 'c#':
                editor.session.setMode("ace/mode/csharp");
                break;
            case 'python':
                editor.session.setMode("ace/mode/python");
                break;
            case 'go':
                editor.session.setMode("ace/mode/golang");
                break;
            case 'sql':
                editor.session.setMode("ace/mode/sql");
                break;
        }
        editor.setValue(document.getElementById('code').value);
    </script>
@endsection
