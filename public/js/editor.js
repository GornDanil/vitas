var editor = ace.edit("editor");
editor.setTheme("ace/theme/monokai");
editor.session.setMode("ace/mode/html");

function changeEditorLang(){
    let lang = document.getElementById('lang').value;

    switch (lang){
        case '1':
            editor.session.setMode("ace/mode/html");
            break;
        case '2':
            editor.session.setMode("ace/mode/css");
            break;
        case '3':
            editor.session.setMode("ace/mode/javascript");
            break;
        case '4':
            editor.session.setMode("ace/mode/php");
            break;
        case '5':
            editor.session.setMode("ace/mode/c_cpp");
            break;
        case '6':
            editor.session.setMode("ace/mode/c_cpp");
            break;
        case '7':
            editor.session.setMode("ace/mode/csharp");
            break;
        case '8':
            editor.session.setMode("ace/mode/python");
            break;
        case '9':
            editor.session.setMode("ace/mode/golang");
            break;
        case '10':
            editor.session.setMode("ace/mode/sql");
            break;
    }
}



document.getElementsByClassName('ace_text-input')[0].onchange = function (){
    document.getElementById('code').value = editor.getValue();
}
