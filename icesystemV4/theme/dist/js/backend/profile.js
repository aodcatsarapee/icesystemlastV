<script> 
 	$(document).ready(function(){


$("#edit_form_user").validate({
    
                  rules: {
                    fname: "required",
                    lname: "required",   
                    phone :{
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                    },

                    password :{
                        required: true,
                        minlength: 5,
                        maxlength: 15,
                    },
                    cpassword :{
                        equalTo : '[name="password"]',
                        required: true,
                        minlength: 5,
                        maxlength: 15,                         
                    },
                          
                          },
                        messages: {
                            fname: "กรุณากรอกข้อมูล",
                            lname: "กรุณากรอกข้อมูล",

                            password :{
                                required: "กรุณากรอกข้อมูล",
                                minlength:"กรุณากรอกอย่างน้อย 6 ตัวอักษร",
                                maxlength :"กรุณากรอกไม่เกิน 15 ตัวอักษร"
                            },
                            phone :{
                                required: "กรุณากรอกข้อมูล",
                                minlength:"กรุณากรอกอย่างน้อย 10 ตัวอักษร",
                                maxlength :"กรุณากรอกไม่เกิน 10 ตัวอักษร"
                            },
                            cpassword :{
                                 equalTo :"รหัสผ่านไม่ตรงกัน",
                                required: "กรุณากรอกข้อมูล",
                                minlength:"กรุณากรอกอย่างน้อย 6 ตัวอักษร",
                                maxlength :"กรุณากรอกไม่เกิน 15 ตัวอักษร"
                            },
                     
                        },
                        errorElement: "em",
                    errorPlacement: function ( error, element ) {
                        // Add the `help-block` class to the error element
                        error.addClass( "help-block" );
    
                        // Add `has-feedback` class to the parent div.form-group
                        // in order to add icons to inputs
                        element.parents( ".col-sm-4" ).addClass( "has-feedback" );
    
                         element.parents( ".col-sm-6" ).addClass( "has-feedback" );
    
                          element.parents( ".col-sm-3" ).addClass( "has-feedback" );
    
                          element.parents( ".col-sm-5" ).addClass( "has-feedback" );
    
                        error.insertAfter( element );
                        
    
                        // Add the span element, if doesn't exists, and apply the icon classes to it.
                        if ( !element.next( "span" )[ 0 ] ) {
                            $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
                        }
                    },
                    success: function ( label, element ) {
                        // Add the span element, if doesn't exists, and apply the icon classes to it.
                        if ( !$( element ).next( "span" )[ 0 ] ) {
                            $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
                        }
                    },
                    highlight: function ( element, errorClass, validClass ) {
                        $( element ).parents( ".col-sm-4" ).addClass( "has-error" ).removeClass( "has-success" );
                        $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                        $( element ).parents( ".col-sm-6" ).addClass( "has-error" ).removeClass( "has-success" );
                        $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                         $( element ).parents( ".col-sm-3" ).addClass( "has-error" ).removeClass( "has-success" );
                        $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                         $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                        $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
    
                    },
                    unhighlight: function ( element, errorClass, validClass ) {
                        $( element ).parents( ".col-sm-4" ).addClass( "has-success" ).removeClass( "has-error" );
                        $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                        $( element ).parents( ".col-sm-6" ).addClass( "has-success" ).removeClass( "has-error" );
                        $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                        $( element ).parents( ".col-sm-3" ).addClass( "has-success" ).removeClass( "has-error" );
                        $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                         $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                        $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                    },
    
    
                submitHandler: function(form) {
    
                 
    
                     var formData = new FormData($('#edit_form_user')[0]);

                    
                   
    
                                  $.ajax({
                                         url:"Profile/editProfile",
                                       
                                        type: 'POST',
                                       
                                        data: formData,
    
                                        async: false,
    
                                        cache: false,
    
                                        contentType: false,
    
                                        processData: false,
                                       
                                        success:function(data){
                                     
                                       
                                       
                                             alert("success!");
    
                                          location.reload(); 
    
                                         },
                                            error: function (textStatus, errorThrown) {
                                               alert("การบันทึกไม่สำเร็จ");
                                            
                                             
                                            }
                                 });
    
              }
    
         });


        });


 </script>