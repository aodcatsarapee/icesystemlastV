<script>
  $(document).ready(function(){

     
             $("#insert_form_employee").validate({
              rules: {
                      emp_name: "required",
                      emp_lname: "required", 
                      emp_blood: "required" ,
                       id_card:{
                          required: true, 
                          number: true,
                          minlength: 13,
                          maxlength: 13,
                      },
                      emp_date: "required",
                      emp_adress: "required" ,
                      emp_sub_area: "required",
                      emp_area: "required",
                      emp_province: "required",
                      emp_post_code: "required",
                      emp_phone: {
                          required: true, 
                          number: true,
                          minlength: 10,
                          maxlength: 10,
                      },
                      department_id:"required",
                      emp_img:"required",
                      
                      },
                    messages: {
                    emp_name: "กรุณากรอกข้อมูล",
                    emp_lname: "กรุณากรอกข้อมูล",
                     emp_blood: "กรุณากรอกข้อมูล" , 
                     id_card:  {
                        required: "กรุณากรอกข้อมูล",
                        number:"กรุณากรอกเป็นตัวเลข",
                         minlength:"กรุณากรอกให้ครบ 13 หลัก",
                        maxlength :"กรุณากรอกไม่เกิน 13 หลัก"
                    }, 
                    emp_date: "กรุณากรอกวันที่" , 
                    emp_adress: "กรุณากรอกข้อมูล" , 
                    emp_sub_area: "กรุณากรอกข้อมูล" ,
                    emp_area: "กรุณากรอกข้อมูล" ,
                    emp_province: "กรุณากรอกข้อมูล" ,
                    emp_post_code: "กรุณากรอกข้อมูล" ,
                    emp_phone:  {
                        required: "กรุณากรอกข้อมูล",
                        number:"กรุณากรอกเป็นตัวเลข",
                         minlength:"กรุณากรอกให้ครบ 10 หลัก",
                        maxlength :"กรุณากรอกไม่เกิน 10 หลัก"

                    } ,
                      department_id:"กรุณากรอกข้อมูล",
                       emp_img:"กรุณากรอกข้อมูล",
                   




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

             
                var formData = new FormData($('#insert_form_employee')[0]);

                             $.ajax({
                                   
                                    url:"employee/insert_data_employee",
                                   
                                    type: 'POST',
                                   
                                    data: formData,

                                    async: false,

                                    cache: false,

                                    contentType: false,

                                    processData: false,
                                   
                                    success:function(data){
                                 
                                    $('#insert_form_employee')[0].reset(); 
                                   
                                       location.reload();
                                    
                                    }
                              });




  }
 });

  $(".edit_employee").click(function(){

                            var id=$(this).attr("id");

            
                                      $.ajax({
                                    url:"employee/select_employee",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                      
                                    $("#emp_detail").html(data);
                                    $("#modal-edit-employee").modal('show');   
                                       
                                        }

                                    })
         
                                           
                                });



  $(".showdata").click(function(){
                            var id=$(this).attr("id");

                                      $.ajax({
                                    url:"employee/show_employee",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                       $("#emp_show_detail").html(data);
                                       $("#modal-showdata").modal('show'); 
                                  
                                       
                                       
                                        }

                                    })

                                    
                                               
                                });


$(".delete_employee" ).click(function(){                 
                   var id = $(this).attr("id");
                 
                  $("#submit_delete").click(function(){   
                                      $.ajax({
                                    url:"employee/delete_employee",    //ชื่อฟังชั่น
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                       location.reload();
                                       
                                        }

                                    })
                              })

              });

 
  });
</script>