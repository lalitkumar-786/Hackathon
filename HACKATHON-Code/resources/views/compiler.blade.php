@extends('master')

@section('title','questionpaper')
@section('css')
<link type="text/css" rel="stylesheet" href="css/compiler.css"  media="screen,projection"/>
@section('body')
    <div class="row" style="background-color:whitesmoke">
        <div class="col s12">
                <div class = "col s6">
                    <input name="lang" type="radio" id="lang1" value="gcc" checked>
                    <label for="lang1">C/C++ | </label>
                    <input name="lang" type="radio" id="lang2" value="java">
                    <label for="lang2">Java | </label>
                    <input name="lang" type="radio" id="lang3" value="python">
                    <label for="lang3">Python | </label>
                </div>
                <div id = "loader" class="progress col s3" style="display:none">
                    <div class="indeterminate"></div>
                </div>
                <div class="col s3" style="float:right">
                    <input name="autocompletion" type="checkbox" id="autocomp" checked>
                    <label for="autocomp">Autocomplete |</label>
                    <button onclick = "inc_font();" class="btn-floating btn-small waves-effect waves-light #17b755" style="font-size:xx-large">+</button> |
                    <button onclick="dec_font();" class="btn-floating btn-small waves-effect waves-light #17b755" style="font-size:xx-large">-</button>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12" id="editor" name="code"></div>
        <script src="ace/src-noconflict/ace.js"></script>
        <script src="ace/src-noconflict/ext-language_tools.js"></script>
        <script>
            ace.require("ace/ext/language_tools");
            var editor = ace.edit("editor");
            editor.session.setMode("ace/mode/java");
            editor.setTheme("ace/theme/tomorrow");
            editor.setOptions({
                enableBasicAutocompletion: false,
                enableSnippets: true,
                enableLiveAutocompletion: true
            });

            $('#autocomp').change(function() {
                if (!$(this).is(':checked'))
                    editor.setOptions({
                        enableLiveAutocompletion: false
                    });
                else
                    editor.setOptions({
                        enableLiveAutocompletion: true
                    });
            });

            $('#lang1').change(function() {
                if ($(this).is(':checked'))
                    editor.session.setMode("ace/mode/c_cpp");
            });
            $('#lang2').change(function() {
                if ($(this).is(':checked'))
                    editor.session.setMode("ace/mode/java");
            });
            $('#lang3').change(function() {
                if ($(this).is(':checked'))
                    editor.session.setMode("ace/mode/python");
            });

            function inc_font(){
                console.log(parseFloat(document.getElementById('editor').style.fontSize));
                editor.setOptions({fontSize:editor.getFontSize()+2});
            }

            function dec_font(){
                editor.setOptions({fontSize:editor.getFontSize()-2});
            }

            function SubmitFormData() {
                document.getElementById('loader').style.display = "block";
                document.getElementById('codetext').value = editor.getValue();
                if(document.getElementById('lang1').checked)
                    document.getElementById('langss').value = document.getElementById('lang1').value;
                if(document.getElementById('lang2').checked)
                    document.getElementById('langss').value = document.getElementById('lang2').value;
                if(document.getElementById('lang3').checked)
                    document.getElementById('langss').value = document.getElementById('lang3').value;
                var code = editor.getValue();
                var input = $("#inp").val();
                $.post("compile", {
                        code: code,
                        input: input,
                        langs: document.getElementById('langss').value,
                        _token:"{{ csrf_token() }}"
                    },
                    function(data) {
                        document.getElementById('loader').style.display = "none";
                        document.getElementById("opt").value = data;
                    });

            }
        </script>
        <form id="myForm" method="post" action="compile.php" class="col s12">
            <div class="col s12">
                <div class="col s12">
                    <textarea id='codetext' name="code" style="display:none" resize:none></textarea>
                </div>
            </div>
            <textarea style="display:none" name="langs" id ="langss"></textarea>
            <div class="row" style="padding-top:10px">
                <div class="col s6">
                    <textarea class="ip col s12" style="height:100px" resize:none id='inp' name="input" placeholder="Enter Input Here"></textarea>
                </div>
                <div class="col s6">
                    <textarea class="op col s12" style="height:100px" resize:none name="output" placeholder="None" id="opt"></textarea>
                </div>
            </div>
            <div class="col s6">
                <button type="button" class="waves-effect waves-light btn" value="submit" onclick="SubmitFormData();">Compile</button>
            </div>
        </form>
    </div>
@stop
