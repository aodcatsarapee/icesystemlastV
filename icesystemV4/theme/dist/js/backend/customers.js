<script> 
 	$(document).ready(function(){



             $("#insert_form_customer").validate({
              rules: {
                      cus_name: "required",
                       cus_lname: "required", 
                      cus_blood: "required" ,
                       id_card:{
                          required: true, 
                          number: true,
                          minlength: 13,
                          maxlength: 13,
                      },
                      cus_adress: "required" ,
                      cus_sub_area: "required",
                      cus_area: "required",
                      cus_province: "required",
                      cus_post_code: "required",
                      cus_phone: {
                          required: true, 
                          number: true,
                      },
                      cus_img: "required",
                      cus_date:"required",
                      // cus_id   :"required",
                      cus_pass :{
                          required: true,
                          minlength: 6,
                          maxlength: 10,
                      },
                      cus_pass_confirm :{
                          equalTo : '[name="cus_pass"]',
                          required: true,
                          minlength: 6,
                          maxlength: 10,
                          
                      },
                      cus_mail: {
                          required: true, 
                          email: true,
                      },

                      },
                    messages: {
                    cus_name: "กรุณากรอกข้อมูล",
                    cus_lname: "กรุณากรอกข้อมูล",
                     cus_blood: "กรุณากรอกข้อมูล" , 
                     id_card:  {
                        required: "กรุณากรอกข้อมูล",
                        number:"กรุณากรอกเป็นตัวเลข",
                         minlength:"กรุณากรอกให้ครบ 13 หลัก",
                        maxlength :"กรุณากรอกไม่เกิน 13 หลัก"
                    }, 
                    cus_adress: "กรุณากรอกข้อมูล" , 
                    cus_sub_area: "กรุณากรอกข้อมูล" ,
                    cus_area: "กรุณากรอกข้อมูล" ,
                    cus_province: "กรุณากรอกข้อมูล" ,
                    cus_post_code: "กรุณากรอกข้อมูล" ,
                    cus_phone:  {
                        required: "กรุณากรอกข้อมูล",
                        number:"กรุณากรอกเป็นตัวเลข",
                    },
                    cus_img: "กรุณากรอกข้อมูล",
                    cus_date: "กรุณากรอกข้อมูล",
                    // cus_id   :"กรุณากรอกข้อมูล",
                    cus_pass :{
                        required: "กรุณากรอกข้อมูล",
                        minlength:"กรุณากรอกอย่างน้อย 6 ตัวอักษร",
                        maxlength :"กรุณากรอกไม่เกิน 10 ตัวอักษร"
                    },
                    cus_pass_confirm :{
                         equalTo :"รหัสผ่านไม่ตรงกัน",
                        required: "กรุณากรอกข้อมูล",
                        minlength:"กรุณากรอกอย่างน้อย 6 ตัวอักษร",
                        maxlength :"กรุณากรอกไม่เกิน 10 ตัวอักษร"
                    },
                     cus_mail: {
                          required: "กรุณากรอกข้อมูล",
                          email: "รุปเเบบอีเมล์ไม่ถูกต้อง",
                      },

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

             

                var formData = new FormData($('#insert_form_customer')[0]);

                              $.ajax({
                                     url:"customer/insert_data_customer",
                                   
                                    type: 'POST',
                                   
                                    data: formData,

                                    async: false,

                                    cache: false,

                                    contentType: false,

                                    processData: false,
                                   
                                    success:function(data){
                                 
                                    $('#insert_form_customer')[0].reset(); 
                                   
                                         
                                    location.reload();
                                    
                                     },
                                        error: function (textStatus, errorThrown) {
                                           alert("ชื่อผู้ใช้งานมีอยู่เเล้ว หรือ พนักงานมีชื่อผู้ใช้งานเเล้ว");
                                        
                                         
                                      }
                             });




  }

 });


$(".edit_customer").click(function(){
                            var id=$(this).attr("id");

                           
                                      $.ajax({
                                    url:"customer/select_customer",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                    $("#cus_detail").html(data);
                                    $("#modal-edit-customer").modal('show');   
                                       
                                        }

                                    })
         
                                           
                                });




$(".delete_customer" ).click(function(){                 
                   var id = $(this).attr("id");
                 
                  $("#submit_delete").click(function(){   
                                      $.ajax({
                                    url:"customer/delete_customer",    //ชื่อฟังชั่น
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                       location.reload();
                                       
                                        }

                                    })
                              })

              });


 $(".showdata").click(function(){
                            var id=$(this).attr("id");

                                      $.ajax({
                                    url:"customer/show_customer",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                       $("#cus_show_detail").html(data);
                                       $("#modal-showdata").modal('show'); 
                                  
                                       
                                       
                                        }

                                    })

                                    
         
                                           
                                });


 $('#datatable-customer').DataTable({

                 "order": [[ 0, "desc" ]],
               "lengthMenu": [[5], [5]],
                "language": {
                    "lengthMenu": "เเสดง _MENU_ หน้า",
                    "zeroRecords": "<p style='color:red;'> - - - ไม่มีรายการ - - - </p>",
                    "search": "ค้าหา",
                    "info": " หน้า _PAGE_ จาก _PAGES_",
                   "infoEmpty": " ",
                   "infoFiltered": "(filtered from _MAX_ total records)",
        }
             
           });

 $('#datatable-emp').DataTable({

                 "order": [[ 0, "desc" ]],
               "lengthMenu": [[5], [5]],
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