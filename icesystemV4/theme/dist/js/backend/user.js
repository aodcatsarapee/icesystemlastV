<script> 

$(document).ready(function(){

   
             $("#insert_form_user").validate({

              rules: {
                            username:{
                      		required: true,
                            minlength: 6,
                            maxlength: 15,
                      },
                      type   :"required",
                      password :{
                          required: true,
                          minlength: 6,
                          maxlength: 15,
                      },
                      confirmpassword :{
                          equalTo : '[name="password"]',
                          required: true,
                          minlength: 6,
                          maxlength: 15,                         
                      },
                      employee:"required",
                      
                      },
                    messages: {
                    username:{
                        required: "กรุณากรอกข้อมูล",
                        minlength:"กรุณากรอกอย่างน้อย 6 ตัวอักษร",
                        maxlength :"กรุณากรอกไม่เกิน 15 ตัวอักษร"
                    },
                    type   :"กรุณาเลือกข้อมูล",
                    password :{
                        required: "กรุณากรอกข้อมูล",
                        minlength:"กรุณากรอกอย่างน้อย 6 ตัวอักษร",
                        maxlength :"กรุณากรอกไม่เกิน 15 ตัวอักษร"
                    },
                    confirmpassword :{
                         equalTo :"รหัสผ่านไม่ตรงกัน",
                        required: "กรุณากรอกข้อมูล",
                        minlength:"กรุณากรอกอย่างน้อย 6 ตัวอักษร",
                        maxlength :"กรุณากรอกไม่เกิน 15 ตัวอักษร"
                    },
                     employee:"กรุณาเลือกข้อมูล",
                    },
                    errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents( ".col-sm-7" ).addClass( "has-feedback" );

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
                    $( element ).parents( ".col-sm-7" ).addClass( "has-error" ).removeClass( "has-success" );
                    $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                    $( element ).parents( ".col-sm-6" ).addClass( "has-error" ).removeClass( "has-success" );
                    $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                     $( element ).parents( ".col-sm-3" ).addClass( "has-error" ).removeClass( "has-success" );
                    $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                     $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                    $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );

                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-7" ).addClass( "has-success" ).removeClass( "has-error" );
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                    $( element ).parents( ".col-sm-6" ).addClass( "has-success" ).removeClass( "has-error" );
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                    $( element ).parents( ".col-sm-3" ).addClass( "has-success" ).removeClass( "has-error" );
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                     $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                },


            submitHandler: function(form) {

             

                 var formData = new FormData($('#insert_form_user')[0]);

                              $.ajax({
                                     url:"User/insert_user",
                                   
                                    type: 'POST',
                                   
                                    data: formData,

                                    async: false,

                                    cache: false,

                                    contentType: false,

                                    processData: false,
                                   
                                    success:function(data){
                                 
                                    $('#insert_form_user')[0].reset(); 
                                   
                                         alert("success!");

                                      location.reload(); 

                                     },
                                        error: function (textStatus, errorThrown) {
                                           alert("ชื่อผู้ใช้งานมีอยู่เเล้ว หรือ พนักงานมีชื่อผู้ใช้งานเเล้ว");
                                        
                                         
                                        }
                             });

  		}

     });
     

 // edit user


  $(".edit_data_user").click(function(){
                            var id=$(this).attr("id");
                                      $.ajax({
                                          url:"User/select_user",
                                          method:"post",
                                          data:{id:id},
                                          success:function(data){
                                          $("#detail_user").html(data);
                                          $("#modal-edit-user").modal('show');   
                                       
                                        }

                                    })
         
                                           
                                });


  $(".delete_dataa").click(function(){
                
                   var id = $(this).attr("id");
                 
                  $("#submit_delete").click(function(){
                                      $.ajax({
                                    url:"User/delete_user",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                    
                                    location.reload();
                                       
                                        }

                                    })
                              })

              });

 $('#datatable-users').DataTable({
             
               "lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "All"]],
               "language": {
                    "lengthMenu": "เเสดง _MENU_ หน้า",
                   "zeroRecords": "<p style='color:red;'> - - - ไม่มีรายการ - - - </p>",
                    "search": "ค้าหา",
                    "info": " หน้า _PAGE_ จาก _PAGES_",
                   "infoEmpty": " ",
                   "infoFiltered": "(filtered from _MAX_ total records)",
        }
             
           });
    
});

</script>