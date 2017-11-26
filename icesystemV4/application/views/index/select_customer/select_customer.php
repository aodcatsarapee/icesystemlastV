<script>

     $(document).ready(function(){


// js insert data---------------------------------------------------------------------------------------------

             $("#edit_form_customer").validate({
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
                      cus_date:"required",
                      cus_mail: {
                          required: true, 
                          email: true,
                      },
                      username:"required",
                      cus_pass :{
                          required: true,
                          minlength: 6,
                          maxlength: 20,
                      },
                      cus_pass_confirm :{
                          equalTo : '[name="cus_pass"]',
                          required: true,
                          minlength: 6,
                          maxlength: 20,
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
                    cus_date: "กรุณากรอกข้อมูล",
                     cus_mail: {
                          required: "กรุณากรอกข้อมูล",
                          email: "รุปเเบบอีเมล์ไม่ถูกต้อง",
                      },
                      username   :"กรุณากรอกข้อมูล",
                    cus_pass :{
                        required: "กรุณากรอกข้อมูล",
                        minlength:"กรุณากรอกอย่างน้อย 6 ตัวอักษร",
                        maxlength :"กรุณากรอกไม่เกิน 20 ตัวอักษร"
                    },
                    cus_pass_confirm :{
                         equalTo :"รหัสผ่านไม่ตรงกัน",
                        required: "กรุณากรอกข้อมูล",
                        minlength:"กรุณากรอกอย่างน้อย 6 ตัวอักษร",
                        maxlength :"กรุณากรอกไม่เกิน 20 ตัวอักษร"
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
                    $( element ).parents( ".col-sm-4" ).addClass( "has-error" ).removeClass( "has-success" );
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
                     $( element ).parents( ".col-sm-4" ).addClass( "has-success" ).removeClass( "has-error" );
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                },


            submitHandler: function(form) {



               var formData = new FormData($('#edit_form_customer')[0]);

                             $.ajax({
                                   
                                    url:"edit_data_customer",
                                   
                                    type: 'POST',
                                   
                                    data: formData,

                                    async: false,

                                    cache: false,

                                    contentType: false,

                                    processData: false,
                                   
                                    success:function(data){
                                      
                                    
                                    $('#edit_form_customer')[0].reset(); 
                                   
                                    $('#modal-edit-customer').modal('hide');            
                                    
                                    location.reload();
                                    
                                    }
                              });

         }
 });

             });

</script>




  <form class="form-horizontal" method="POST" id="edit_form_customer" name="edit_form_customer" enctype="multipart/form-data" >
           <div class="form-group ">
              <label class="col-sm-3 control-label" >รหัสลูกค้า :</label>
            <div class="col-sm-7">
            <fieldset disabled>
              <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $rs['customer_id'] ?>" >
              </fieldset>
            </div>
          </div>
          <input type="hidden" id="cus_id" name='cus_id' class="form-control" value="<?php echo $rs['customer_id'] ?>" >
          <input type="hidden" name="cus_img_old" id="cus_img_old" class="form-control" value="<?php echo $rs['customer_image']; ?>">
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ชื่อ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="cus_name" id="cus_name"  placeholder="เช่น สรศักดิ์ " value="<?php echo $rs['customer_fname'] ?>" >
            </div>
          </div>
             <div class="form-group  ">
            <label class="col-sm-3 control-label"  >นามสกุล :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="cus_lname" id="cus_lname"  placeholder="เช่น ต้นเกณฑ์ " value="<?php echo $rs['customer_lname'] ?>" >
            </div>
          </div>

          	<div class="form-group  ">
            <label class="col-sm-3 control-label"  >สัณชาติ :</label>
            <div class="col-sm-3">
              <input class="form-control" type="text" name="cus_blood" id="cus_blood"  placeholder="เช่น ไทย " value="<?php echo $rs['customer_country'] ?>" >
            </div>
          </div>

          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >เลขบัตรประชาชน :</label>
            <div class="col-sm-4">
              <input class="form-control" type="text" name="id_card" id="id_card"  placeholder="เช่น 1509901476538 "  maxlength="13" minlength="13"  value="<?php echo $rs['customer_IDcard'] ?>">
            </div>
          </div>

             <div class="form-group  ">
            <label class="col-sm-3 control-label"  >เพศ :</label>
            <div class="col-sm-7">
              <input type="radio" name="gender" value="male" style="margin-top:12px;"  <?php echo ( $rs['customer_sex'] == 'male')?'checked':'' ?> ""> ชาย &nbsp
              <input type="radio" name="gender" value="fmale" <?php echo ( $rs['customer_sex'] =='fmale')?'checked':'' ?> > หญิง
            </div>
          </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >วันเกิด :</label>
            <div class="col-sm-7">
              <input class="form-control" type="date" name="cus_date" id="cus_date"  value="<?php echo $rs['customer_birthday'] ?>"  >
            </div>
          </div>


          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ที่อยู่ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="cus_adress" id="cus_adress"  placeholder="เช่น 1295/1 โรงน้ำแข็งทวีชัย ถนน แก้วนวรัฐ " value="<?php echo $rs['customer_address'] ?>" >
            </div>
          </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >เขต/ตำบล :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="cus_sub_area" id="cus_sub_area" placeholder="เช่น วัดเกต " value="<?php echo $rs['customer_sub_area'] ?>" >
            </div>
            
          </div>
          <div class="form-group  ">
          <label class="col-sm-3 control-label"  >อำเภอ :</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" name="cus_area" id="cus_area"  size="20px;" placeholder="เช่น เมืองเชีงใหม่ " value="<?php echo $rs['customer_area'] ?>" >
            </div>
 			</div>

 			<div class="form-group  ">
          <label class="col-sm-3 control-label"  >จังหวัด :</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" name="cus_province" id="cus_province"  size="20px;" placeholder="เช่น เชียงใหม่ " value="<?php echo $rs['customer_province'] ?>" >
            </div>
 			</div>

 			<div class="form-group  ">
          <label class="col-sm-3 control-label"  >รหัสไปรษณีย์ :</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" name="cus_post_code" id="cus_post_code"  size="20px;" placeholder="เช่น 50000 " value="<?php echo $rs['customer_postal_code'] ?>" >
            </div>
 			</div>

 			

 			<div class="form-group  ">
 			<label class="col-sm-3 control-label"  >เบอร์โทรที่ติดต่อได้ :</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" name="cus_phone" id="cus_phone"  size="20px;" placeholder="เช่น 0955142114 "  value="<?php echo $rs['customer_phone'] ?>">            </div>
 			</div>


      <div class="form-group  ">
      <label class="col-sm-3 control-label"  >E-Mail :</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" name="cus_mail" id="cus_mail"  size="20px;" placeholder="เช่น toto@gmail.com " 
              value="<?php echo $rs['customer_email'] ?>" >            </div>
      </div>      


 			<div class="form-group  ">
 			<label class="col-sm-3 control-label"  >รูป :</label>
            <div class="col-sm-4">
               <input type="file"  name="cus_img" class="form-control" id="cus_img" accept="image/*" >
            </div>
 			</div>

         <div class="form-group  ">
      <label class="col-sm-3 control-label"  >ไอดี :</label>
            <div class="col-sm-5">
              <input class="form-control " type="text" name="username" id="username"  size="20px;" value="<?php echo $rs['username'] ?>" disabled>            </div>
              
      </div>      

      <div class="form-group  ">
      <label class="col-sm-3 control-label"  >รหัสผ่าน :</label>
            <div class="col-sm-5">
              <input class="form-control" type="password" name="cus_pass" id="cus_pass"  size="20px;"  value="<?php echo $rs['password'] ?>">
              </div>
      </div>

      <div class="form-group  ">
      <label class="col-sm-3 control-label"  > ยืนยันรหัสผ่าน  :</label>
            <div class="col-sm-5">
              <input class="form-control" type="password" name="cus_pass_confirm" id="cus_pass_confirm"  size="20px;" value="<?php echo $rs['password'] ?>" >
              </div>
      </div>      





           <input type="submit" class="btn btn-default" id="insert" value=" บันทึกข้อมูล " style="float: right;font-size: 15px;">
           <br><br>
        </form>

