<script type="text/javascript">
$(document).ready(function(){
   $("#edit_form_user").validate({

              rules: {
                            username:{
                          required: true,
                            minlength: 6,
                            maxlength: 15,
                      },
                      type   :"required",
                      p :{
                          required: true,
                          minlength: 6,
                          maxlength: 15,
                      },
                      cp :{
                          equalTo : '[name="p"]',
                          required: true,
                          minlength: 6,
                          maxlength: 15,                         
                      },
                      
                      },
                    messages: {
                    username:{
                        required: "กรุณากรอกข้อมูล",
                        minlength:"กรุณากรอกอย่างน้อย 6 ตัวอักษร",
                        maxlength :"กรุณากรอกไม่เกิน 15 ตัวอักษร"
                    },
                    type   :"กรุณาเลือกข้อมูล",
                    p :{
                        required: "กรุณากรอกข้อมูล",
                        minlength:"กรุณากรอกอย่างน้อย 6 ตัวอักษร",
                        maxlength :"กรุณากรอกไม่เกิน 15 ตัวอักษร"
                    },
                    cp :{
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

             

                 var formData = new FormData($('#edit_form_user')[0]);

                              $.ajax({
                                     url:"User/edit_user",
                                   
                                    type: 'POST',
                                   
                                    data: formData,

                                    async: false,

                                    cache: false,

                                    contentType: false,

                                    processData: false,
                                   
                                    success:function(data){
                                 
                                    $('#edit_form_user')[0].reset(); 
                                   
                                      location.reload(); 
                                   
                                     },
                                        error: function (textStatus, errorThrown) {
                                           alert("ชื่อผู้ใช้งานมีอยู่เเล้ว หรือ พนักงานมีชื่อผู้ใช้งานเเล้ว");
                                        
                                         location.reload(); 
                                        }
                             });

      }

  });
  });
</script>



       <form class="form-horizontal" method="POST" id="edit_form_user" name="edit_form_user" enctype="multipart/form-data" >
          
          

  <?php   foreach ($employee as $employee_value) {
                
                      if($employee_value['employee_id']==$user['employee_id']){ ?>

              <fieldset disabled>
                <div class="form-group  ">
                   <label class="col-sm-3 control-label"  >ชื่อพนักงาน :</label>
                      <div class="col-sm-7">
                              <input class="form-control" type="text"  value="<?php echo $employee_value['fname']." ".$employee_value['lname']; ?>"  >
                     </div>
                 </div>
              </fieldset>

                   <?php  } } ?>

 <?php   foreach ($customer as $customer_value) {
                
                    

                      if($customer_value['Customer_id']==$user['Customer_id']){ ?>
                    

              <fieldset disabled>
                <div class="form-group  ">
                   <label class="col-sm-3 control-label"  >ชื่อลูกค้า :</label>
                      <div class="col-sm-7">
                              <input class="form-control" type="text"  value="<?php echo $customer_value['Customer_fname']." ".$customer_value['Customer_lname']; ?>"  >
                     </div>
                 </div>
              </fieldset>

                   <?php  } } ?>





            
              <input type="hidden" id="user_id" name='user_id' class="form-control" value="<?php echo $user['user_id'] ?>" >
        <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ชื่อผู้ใช้งาน :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="username" id="username" value="<?php echo $user['username'] ?>"  >
            </div>
          </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >รหัสผู้ใช้งาน :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="p" id="p" value="<?php echo $user['password'] ?>" >
            </div>
          </div>
           <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ยืนยันรหัสผู้ใช้งาน :</label>
            <div class="col-sm-7">
              <input class="form-control" type="password" name="cp" id="cp" value="<?php echo $user['password'] ?>" >
            </div>
          </div>
          

           <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ประเภทผู้ใช้งาน :</label>
                      <div class="col-sm-7">
                      <fieldset disabled>
                   <select name="type" id="input" class="form-control">
                   <?php if($user['type']=="admin"){ ?>      
                <option value="admin" selected>ผู้ดูเเลระบบ</option>
                     <?php }elseif($user['type']=="manager"){ ?>
                 <option value="manager" selected>ผู้จัดการ</option> 
                     <?php }elseif($user['type']=="emp_store"){ ?>
                 <option value="emp_store" selected>พนักงานคลังสินค้า</option> 
                     <?php }elseif($user['type']=="emp_produce"){ ?>      
                 <option value="emp_produce" selected>พนักงานผลิตสินค้า</option> 
                     <?php }elseif($user['type']=="emp_sale"){ ?>
                 <option value="emp_sale" selected>พนักงานขายสินค้า</option>
                     <?php }elseif($user['type']=="emp_account"){ ?>
                 <option value="emp_account" selected>พนักงานบัญชี</option>
                  <?php }else{ ?>
                  <option value="customters" selected>ลูกค้า</option> 
                  <?php } ?>
             </select>
             </fieldset>
                </div>
          </div>
        
           <input type="submit" class="btn btn-default" id="insert" value=" บันทึกข้อมูล " style="float: right;font-size: 15px;">
        </form>
        <br>
        <br>
