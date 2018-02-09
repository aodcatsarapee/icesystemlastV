<script>

     $(document).ready(function(){

         
// js insert data---------------------------------------------------------------------------------------------

             $("#edit_form_employee").validate({
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

               var formData = new FormData($('#edit_form_employee')[0]);

                             $.ajax({
                                   
                                    url:"employee/edit_data_employee",
                                   
                                    type: 'POST',
                                   
                                    data: formData,

                                    async: false,

                                    cache: false,

                                    contentType: false,

                                    processData: false,
                                   
                                    success:function(data){
                                     
                                  
                                    $('#edit_form_employee')[0].reset(); 
                                   
                                    $('#modal-edit-employee').modal('hide');            
                                    
                                    location.reload();
                                    
                                    }
                              });

         }
 });

             });

</script>

  <form class="form-horizontal" method="POST" id="edit_form_employee" name="edit_form_employee" enctype="multipart/form-data" >
           <div class="form-group ">
            <label class="col-sm-3 control-label" >รหัสพนักงาน :</label>
            <div class="col-sm-7">
            <fieldset disabled>
              <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $rs['employee_id'] ?>" >
              </fieldset>
            </div>
          </div>
          <input type="hidden" id="employee_id" name='employee_id' class="form-control" value="<?php echo $rs['employee_id'] ?>" >
          <input type="hidden" name="emp_img_old" id="emp_img_old" class="form-control" value="<?php echo $rs['employee_image']; ?>">
            <div class="form-group ">
              <label class="col-sm-3 control-label"  >เเผนก :</label>
                <div class="col-sm-7">
                
                <select name="department_id" id="department_id" class="form-control" required="required">
                     
                      <option value="">เลือกเเผนก</option>
                
                <?php   foreach ($department as $value) {?>   
                            
                       <option value="<?php echo $value['department_id'] ?>" <?php if( $rs['department']==$value['department_id']){ echo "selected";} ?>><?php  echo $value['name']; ?></option>
                    
                    
                <?php } ?>
                </select>
              </div>
            </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ชื่อ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="emp_name" id="emp_name"  placeholder="เช่น สุทร " value="<?php echo $rs['employee_fname'] ?>" >
            </div>
          </div>
             <div class="form-group  ">
            <label class="col-sm-3 control-label"  >นามสกุล :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="emp_lname" id="emp_lname"  placeholder="เช่น ชาติไทย " value="<?php echo $rs['employee_lname'] ?>" >
            </div>
          </div>

          	<div class="form-group  ">
            <label class="col-sm-3 control-label"  >สัณชาติ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="emp_blood" id="emp_blood"  placeholder="เช่น ไทย " value="<?php echo $rs['employee_country'] ?>" >
            </div>
          </div>

          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >เลขบัตรประชาชน :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="id_card" id="id_card"  placeholder="เช่น 1509901476538 "  maxlength="13" minlength="13"  value="<?php echo $rs['employee_IDcard'] ?>">
            </div>
          </div>

             <div class="form-group  ">
            <label class="col-sm-3 control-label"  >เพศ :</label>
            <div class="col-sm-7">
              <input type="radio" name="gender" value="male" style="margin-top:12px;"  <?php echo ( $rs['employee_sex'] == 'male')?'checked':'' ?> " "> ชาย &nbsp
              <input type="radio" name="gender" value="fmale" <?php echo ( $rs['employee_sex'] =='fmale')?'checked':'' ?> > หญิง
            </div>
          </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >วันเกิด :</label>
            <div class="col-sm-7">
              <input class="form-control" type="date" name="emp_date" id="emp_date"  value="<?php echo $rs['employee_birthday'] ?>"  >
            </div>
          </div>

	<div class="form-group  ">
 			<label class="col-sm-3 control-label"  >ที่พักปัจจุบัน :</label>
            <div class="col-sm-5">
             <input type="radio" name="home" value="home" style="margin-top:12px;" <?php echo ( $rs['employee_home_type'] =='home')?'checked':'' ?> > บ้านพักของตัวเอง &nbsp
              <input type="radio" name="home" value="factory_hotel"  <?php echo ( $rs['employee_home_type'] =='factory_hotel')?'checked':'' ?> > ที่พักโรงงาน &nbsp
              <input type="radio" name="home" value="hotel" <?php echo ( $rs['employee_home_type'] =='hotel')?'checked':'' ?> > หอพัก            
  
            </div>
 			</div>


          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ที่อยู่ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="emp_adress" id="emp_adress"  placeholder="เช่น 1295/1 โรงน้ำแข็งทวีชัย ถนน แก้วนวรัฐ " value="<?php echo $rs['employee_address'] ?>" >
            </div>
          </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >เขต/ตำบล :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="emp_sub_area" id="emp_sub_area" placeholder="เช่น วัดเกต " value="<?php echo $rs['employee_sub_area'] ?>" >
            </div>
            
          </div>
          <div class="form-group  ">
          <label class="col-sm-3 control-label"  >อำเภอ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="emp_area" id="emp_area"  size="20px;" placeholder="เช่น เมืองเชีงใหม่ " value="<?php echo $rs['employee_area'] ?>" >
            </div>
 			</div>

 			<div class="form-group  ">
          <label class="col-sm-3 control-label"  >จังหวัด :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="emp_province" id="emp_province"  size="20px;" placeholder="เช่น เชียงใหม่ " value="<?php echo $rs['employee_province'] ?>" >
            </div>
 			</div>

 			<div class="form-group  ">
          <label class="col-sm-3 control-label"  >รหัสไปรษณีย์ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="emp_post_code" id="emp_post_code"  size="20px;" placeholder="เช่น 50000 " value="<?php echo $rs['employee_postal_code'] ?>" >
            </div>
 			</div>

 			

 			<div class="form-group  ">
 			<label class="col-sm-3 control-label"  >เบอร์โทรที่ติดต่อได้ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="emp_phone" id="emp_phone"  size="20px;" placeholder="เช่น 0955142114 " maxlength="10" minlength="10" value="<?php echo $rs['employee_phone'] ?>">            </div>
 			</div>

 			<div class="form-group  ">
 			<label class="col-sm-3 control-label"  >สถานภาพ :</label>
            <div class="col-sm-5">
               <input type="radio" name="emp_condition" value="sing" style="margin-top:12px;" <?php echo ( $rs['employee_status'] =='sing')?'checked':'' ?> > โสด &nbsp
              <input type="radio" name="emp_condition" value="marie" <?php echo ( $rs['employee_status'] =='marie')?'checked':'' ?> > สมรส
              <input type="radio" name="emp_condition" value="ruin" <?php echo ( $rs['employee_status'] =='ruin')?'checked':'' ?> > อย่าร้าง
  
            </div>
 			</div>

       <hr>
     <p class="text-center"> <b>สำหรับชาวต่างด้าว</b></p> 
     <div class="form-group  ">
          <label class="col-sm-3 control-label"  >เดินทางข้ามาวันที่ :</label>
           <div class="col-sm-7">
              <input class="form-control" type="date" name="date_county" id="date_county"   value="<?php echo $rs['employee_date_county'] ?>" >
            </div>
      </div>

      <div class="form-group  ">
      <label class="col-sm-3 control-label"  >เลขที่หนังสือเดินทาง :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="emp_pastpost" id="emp_pastpost"  size="20px;" placeholder="เช่น 0955142114 " maxlength="13" minlength="13" value="<?php echo $rs['employee_pastpost'] ?>" >            </div>
      </div>
      <div class="form-group  ">
          <label class="col-sm-3 control-label"  >จากประเทศ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="emp_truecoun" id="emp_truecoun"  size="20px;" placeholder="เช่น พม่า "  
              value="<?php echo $rs['employee_truecoun'] ?>" >
            </div>
      </div>
 			
      <hr>


 			<div class="form-group  ">
 			<label class="col-sm-3 control-label"  >รูป :</label>
            <div class="col-sm-4">
               <input type="file"  name="emp_img" class="form-control" id="emp_img" accept="image/*" >
            </div>
 			</div>





           <input type="submit" class="btn btn-default" id="insert" value=" บันทึกข้อมูล " style="float: right;font-size: 15px;">
        </form>
        <br><br>