$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
    $('select').material_select();
    $(".dropdown-button").dropdown();
    $('.timepicker').pickatime({
        default: 'now',
        twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
        donetext: 'OK',
        autoclose: false,
    });

    $(function () {
        $('#login_form').on('submit', function (e) {
            $('#login_submit').prop("disabled" ,true);
            $('#login_submit').html("Submitting...");

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/login',
                data: $('#login_form').serialize(),
                success: function (result) {
                    if(result.status == 1){
                        window.location.href = '/dashboard';
                    }
                    else if(result.status == 0){
                        $('#login_error').html('Login Error!! Check Your Credentials...');
                        $("#login_error").fadeIn();
                        $('#password').val("");
                        $('#login_submit').prop("disabled" ,false);
                        $('#login_submit').html("Submit");                                
                    }
                },
                error: function(){
                    $('#login_error').html('Something went wrong!! Login Again!!');
                    $("#login_error").fadeIn();
                    $('#password').val("");
                    $('#login_submit').prop("disabled" ,false);
                    $('#login_submit').html("Submit");
                }
            });
        });
          
        $('.labshow').on('click',function () {
            var elm=$(this);
            $("#update").remove();
            var tr='<div id="update"><table><tr><th>Lab No</th><th>Date</th><th>Start_Time</th><th>End_Time</th></tr>';
           // console.log(elm.attr('data-id'))
            $.ajax({
                type: 'GET',
                url: '/labs/'+elm.attr('data-id'),
                success: function (result) {
                   //console.log(result.lab[1].lab_id),
                    $.each(result.lab,function(i,item){
                        tr+='<tr><td><a class="problems" href="/problems/'+item.lab_id+'" target="_blank">'+(i+1)+'</a></td><td>'+item.date+'</td><td>'+item.start_time+'</td><td>'+item.end_time+'</td></tr>';
                    }),
                    tr+='</table></div>',
                    $("#main-container").append(tr)
                }
                
            });
        });

        $('.question').on('click',function () {
            var elm=$(this);
             $("#update").remove();
            var tr='<div id="update"><div id="update"><h3>Question</h3><p>';
             
            $.ajax({
                type: 'GET',
                url: '/questions/'+elm.attr('data-id'),
                success: function (result) {
                     $.each(result.question,function(i,item){
                        tr+=item.description+'</p><h5>Sample Input</h5><p>'+item.sample_input+'</p><h5>Sample Output</h5><p>'+item.sample_output+'</p>';
                    }),
                    tr+='</div>'+'<div> <object type="text/html" data="/compiler" width="100%" height="700px" style="overflow:auto;"></object></div>',
                   $("#main-container").append(tr)
                }
            });
        });

        $("#signup_username").on('keyup',function(){  
            var name = $(this).val(); 

            $("#error_username").html('Checking availabilty...');

            if(name.length > 2)
            {  

                $("#error_username").html('Checking availabilty...');

                $.ajax({
                    type : 'POST',
                    url  : '/checkusername',
                    data : {
                        _token : $('input[name="_token"]').val(),
                        username : name
                    },
                    success : function(result){
                        if(result.count > 0){
                            $("#error-username").html('Username already exists!!');
                            $('#signup_username').removeClass("valid");
                            $('#signup_username').addClass("invalid");
                            $('#signup_submit').prop("disabled" ,true);
                            
                        }
                        else{
                            $('#signup_username').removeClass("invalid");
                            $('#signup_username').addClass("valid");
                            $('#signup_submit').prop("disabled" ,false);
                            $("#error-username").html('');
                        }
                    }
                });

                return false;
            }
            else
            {
                $("#error-username").html('');
            }
        });

        $('#signup_form').on('submit', function (e) {
            $('#signup_submit').prop("disabled" ,true);
            $('#signup_submit').html("Submitting...");

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/signup',
                data: $('#signup_form').serialize(),
                success: function (result) {
                    if(result.success == 1){
                        $('#signup_form').fadeOut(500, function(){
                            $('#success').html('Signup Successfull!!');
                        });

                        setTimeout(function(){
                            $('#success').html('Signup');
                            $('#signup_form').trigger("reset");
                            $('#signup_submit').prop("disabled" ,false);
                            $('#signup_submit').html("Submit");
                            $('#signup_form').fadeIn();
                        },3000);
                    }
                },
                error: function(){
                    $('#signup_password').val("");
                    $('#cnf_password').val("");
                    $('#signup_submit').prop("disabled" ,false);
                    $('#signup_submit').html("Submit");
                }
            });
        });

        $('#host_lab').on('click',function(){
            $('#main-container').load('/faculty/host/host-lab',function(){

                $('.timepicker').pickatime({
                    default: 'now',
                    twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
                    donetext: 'OK',
                    autoclose: true,
                });
                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15, // Creates a dropdown of 15 years to control year
                    format: 'yyyy-mm-dd'
                });
                $('.collapsible').collapsible();
                $('select').material_select();
                $('.modal-trigger').leanModal();

                $('.problem-desc').materialnote({
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['height', ['height']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['picture','hr']],
                        ['misc', ['codeview','undo','redo']],
                    ],
                    onImageUpload: function(files, editor, $editable) {
                        sendFile(files[0],editor,$editable);
                    },
                });
                
                function sendFile(file,editor,welEditable) {
                      data = new FormData();
                      data.append("file", file);
                       $.ajax({
                           url: "/uploader.php",
                           data: data,
                           cache: false,
                           contentType: false,
                           processData: false,
                           type: 'POST',
                           success: function(data){
                               alert(data);
                               $('#summernote').materialnote("insertImage", data, 'filename');
                           },
                           error: function(jqXHR, textStatus, errorThrown) {
                               console.log(textStatus+" "+errorThrown);
                           }
                        });
                }
                        
                function nl2br (str, is_xhtml) {   
                    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';   
                    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
                }
                
                $('#problem-title').on('keyup',function(){
                    var title = $('#problem-title').val();
                    $('#preview-title').html(title); 
                });
                
                $('.note-editable').on('keyup',function(){
                    var description = $('#problem-desc').code();
                    $('#preview-desc').html(description); 
                });
                
                $('#problem-input').on('keyup',function(){
                    var input = $('#problem-input').val();
                    $('#preview-input').html(nl2br(input)); 
                });
                
                $('#problem-output').on('keyup',function(){
                    var output = $('#problem-output').val();
                    $('#preview-output').html(nl2br(output)); 
                });
                
                $('#problem-explanation').on('keyup',function(){
                    var explanation = $('#problem-explanation').val();
                    $('#preview-explanation').html(nl2br(explanation)); 
                });

                $('#problem-score').on('keyup',function(){
                    var score = $('#problem-score').val();
                    $('#preview-score').html(score); 
                });

                $('#lab_settings_form').on('submit', function (e) {
                    $('#lab_setting_submit').prop("disabled" ,true);
                    $('#lab_setting_submit').html("Submitting...");

                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: '/faculty/add_lab',
                        data: $('#lab_settings_form').serialize(),
                        success: function (result) {
                            if(result.status == 1){
                                $('#lab_setting_form_message').removeClass('red-text');
                                $('#lab_setting_form_message').addClass('green-text');
                                $('#lab_setting_form_message').html('Lab Successfully Set!!');
                                $('#lab_setting_submit').prop("disabled",true);
                                $('#lab_setting_submit').html("Submit");
                                $('#lab_settings_form input').prop("disabled",true);
                                $('#lab_settings_form textarea').prop("disabled",true);
                                $('#lab_id').val(result.lab_id);
                            }
                        },
                        error: function(){
                            $('#lab_setting_form_message').removeClass('green-text');
                            $('#lab_setting_form_message').addClass('red-text');
                            $('#lab_setting_form_message').html('Something went wrong!! Submit Again').fadeIn();
                            $('#lab_setting_submit').prop("disabled" ,false);
                            $('#lab_setting_submit').html("Submit");
                        }
                    });

                    setTimeout(function(){
                        $('#lab_setting_form_message').fadeOut(500);
                    },2000);
                });

                var problem_count = 0;
                var problem_id = 0;

                $.get('/faculty/getproblemcount',$('#lab_id').val(),function(problem){
                        $('#question_count').html(problem.count);
                        problem_count = parseInt(problem.count);
                });

                $('#add_question').on('click',function(){

                    problem_count = problem_count + 1;
                    $('#question_count').html(problem_count);

                    $.get('/faculty/add-problem',function(data){
                        $('.panel-container ul.collapsible').append(data);

                        problem_id += 1;

                        $('#problem-collapsible').attr('id' , 'problem-' + problem_id + '-collapsible');
                        $('#problem-' + problem_id + '-collapsible').attr('data-problem-id', problem_id);

                        $('#problem-delete').attr('id' , 'problem-' + problem_id + '-delete');
                        $('#problem-' + problem_id + '-delete').attr('data-problem-id' , problem_id);

                        $('#problem-' + problem_id + '-delete').on('click',function(){
                            var del = $(this).attr('data-problem-id');
                            $('#problem-' + del + '-collapsible').remove();

                            problem_count -= 1;
                            $('#question_count').html(problem_count); 
                        });

                        $('#add-problem-form').attr('id' , 'add-problem-' + problem_id + '-form');
                        $('#add-problem-' + problem_id + '-form').attr('name' , "add-problem-form-"+problem_id);

                        $('#problem-id').attr('id' , "problem-" + problem_id);
                        $('#problem-' + problem_id).val("problem-" + problem_id);

                        $('#question-label').attr('id', 'question-label-' + problem_id);
                        $('#question-label-' + problem_id).html(problem_id);

                        $('#problem-preview').attr('id' , 'problem-preview-' + problem_id);
                        $('#problem-preview-btn').attr('id' , 'problem-' + problem_id + '-preview-btn');
                        $('#problem-'+problem_id+'-preview-btn').attr('href' , '#problem-preview-' + problem_id);
                        $('.modal-trigger').leanModal();

                        $('.problem-desc').materialnote({
                            toolbar: [
                                ['style', ['bold', 'italic', 'underline', 'clear']],
                                ['fontsize', ['fontsize']],
                                ['height', ['height']],
                                ['para', ['ul', 'ol', 'paragraph']],
                                ['insert', ['picture','hr']],
                                ['misc', ['codeview','undo','redo']],
                            ],
                            onImageUpload: function(files, editor, $editable) {
                                sendFile(files[0],editor,$editable);
                            },
                        });
                        
                        function sendFile(file,editor,welEditable) {
                              data = new FormData();
                              data.append("file", file);
                               $.ajax({
                                   url: "/uploader.php",
                                   data: data,
                                   cache: false,
                                   contentType: false,
                                   processData: false,
                                   type: 'POST',
                                   success: function(data){
                                       alert(data);
                                       $('#summernote').materialnote("insertImage", data, 'filename');
                                   },
                                   error: function(jqXHR, textStatus, errorThrown) {
                                       console.log(textStatus+" "+errorThrown);
                                   }
                                });
                        }

                        $('form').on('submit', function (e) {
                            $(this).find('.submit').prop("disabled" ,true);
                            $(this).find('.submit').html("Submitting...");

                            $(this).find('[name = "lab_id"]').val($('#lab_id').val());
                            $(this).find('[name = "problem_desc"]').val($(this).find('div.problem-desc').code());

                            e.preventDefault();
                            $.ajax({
                                type: 'POST',
                                url: '/faculty/courses/save_lab',
                                data: $(this).serialize() + "&lab_id = " + $('#lab_id').val(),
                                success: function (result) {
                                    if(result.success == 1){
                                        alert("Problem saved!!");
                                    }
                                },
                                error: function(){
                                    alert('Error!!');
                                }
                            });

                            $(this).find('.submit').prop("disabled" ,false);
                            $(this).find('.submit').html("Submit");
                        });
                    

                    });
                });


            });
        });

        $("section.sidebar ul li #labs").on('click',function(){

            $("#main-container").load('/faculty/labs',function(){

                $(".lab-card .buttons a.edit").on('click',function(){

                    var lab_id = $(this).attr('data-lab-id');
                        
                    $('#main-container').load('/faculty/lab/edit/'+lab_id , function(){
                        $('select').material_select();
                        $('.timepicker').pickatime({
                            default: 'now',
                            twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
                            donetext: 'OK',
                            autoclose: false,
                        });
                        $('.datepicker').pickadate({
                            selectMonths: true, // Creates a dropdown to control month
                            selectYears: 15, // Creates a dropdown of 15 years to control year
                            format: 'yyyy-mm-dd'
                        });
                        $('.collapsible').collapsible();
                        $('.problem-desc').materialnote({
                            toolbar: [
                                ['style', ['bold', 'italic', 'underline', 'clear']],
                                ['fontsize', ['fontsize']],
                                ['height', ['height']],
                                ['para', ['ul', 'ol', 'paragraph']],
                                ['insert', ['picture','hr']],
                                ['misc', ['codeview','undo','redo']],
                            ],
                            onImageUpload: function(files, editor, $editable) {
                                sendFile(files[0],editor,$editable);
                            },
                        });
                        
                        function sendFile(file,editor,welEditable) {
                              data = new FormData();
                              data.append("file", file);
                               $.ajax({
                                   url: "/uploader.php",
                                   data: data,
                                   cache: false,
                                   contentType: false,
                                   processData: false,
                                   type: 'POST',
                                   success: function(data){
                                       alert(data);
                                       $('#summernote').materialnote("insertImage", data, 'filename');
                                   },
                                   error: function(jqXHR, textStatus, errorThrown) {
                                       console.log(textStatus+" "+errorThrown);
                                   }
                                });
                        }
                    });

                });

            });

        });

    });

});