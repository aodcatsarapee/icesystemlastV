
<div class="modal  fade" id="modal-insert-employee">
  <div class="modal-dialog " style=" max-width: 800px">
    <div class="modal-content ">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">เพิ่มพนักงาน</h3>
      </div>
      <div class="modal-body" id="insert" style="font-size: 15px;">
                
          <form class="form-horizontal" method="POST" id="insert_form_employee" name="insert_form_employee" enctype="multipart/form-data" >
           <div class="form-group ">
            <label class="col-sm-3 control-label" >รหัสพนักงาน :</label>
            <div class="col-sm-7">
            <fieldset disabled>
              <input type="text" id="disabledTextInput" class="form-control" >
              </fieldset>
            </div>

          </div>
          <div class="form-group ">
              <label class="col-sm-3 control-label"  >เเผนก :</label>
                <div class="col-sm-7">
                
                <select name="department_id" id="department_id" class="form-control" required="required">
                     
                      <option value="">เลือกเเผนก</option>
                
                <?php   foreach ($department as $value) {?>   
                            
                       <option value="<?php echo $value['department_id'] ?>"><?php  echo $value['name']; ?></option>
                    
                    
                <?php } ?>
                </select>
              </div>
            </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ชื่อ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="emp_name" id="emp_name"  placeholder="เช่น สรศักดิ์  " >
            </div>
          </div>
             <div class="form-group  ">
            <label class="col-sm-3 control-label"  >นามสกุล :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="emp_lname" id="emp_lname"  placeholder="เช่น ต้นเกณฑ์ " >
            </div>
          </div>

          	<div class="form-group  ">
            <label class="col-sm-3 control-label"  >สัณชาติ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="emp_blood" id="emp_blood"  placeholder="เช่น ไทย " >
            </div>
          </div>

          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >เลขบัตรประชาชน :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="id_card" id="id_card"  placeholder="เช่น 1509901476538 "  maxlength="13" minlength="13" >
            </div>
          </div>

             <div class="form-group  ">
            <label class="col-sm-3 control-label"  >เพศ :</label>
            <div class="col-sm-7">
              <input type="radio" name="gender" value="male" style="margin-top:12px;" checked="checked"> ชาย &nbsp
              <input type="radio" name="gender" value="fmale"> หญิง
            </div>
          </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >วันเกิด :</label>
            <div class="col-sm-7">
              <input class="form-control" type="date" name="emp_date" id="emp_date"   >
            </div>
          </div>

	<div class="form-group  ">
 			<label class="col-sm-3 control-label"  >ที่พักปัจจุบัน :</label>
            <div class="col-sm-5">
             <input type="radio" name="home" value="home" style="margin-top:12px;" checked="checked"> บ้านพักของตัวเอง &nbsp
              <input type="radio" name="home" value="factory_hotel"> ที่พักโรงงาน &nbsp
              <input type="radio" name="home" value="hotel"> หอพัก            
  
            </div>
 			</div>


          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ที่อยู่(หากไม่ใช่ที่พักโรงงาน) :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="emp_adress" id="emp_adress"  placeholder="เช่น 1295/1 โรงน้ำแข็งทวีชัย ถนน แก้วนวรัฐ " >
            </div>
          </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >เขต/ตำบล :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="emp_sub_area" id="emp_sub_area" placeholder="เช่น วัดเกต "  >
            </div>
            
          </div>
          <div class="form-group  ">
          <label class="col-sm-3 control-label"  >อำเภอ :</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" name="emp_area" id="emp_area"  size="20px;" placeholder="เช่น เมืองเชีงใหม่ " >
            </div>
 			</div>

 			<div class="form-group  ">
          <label class="col-sm-3 control-label"  >จังหวัด :</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" name="emp_province" id="emp_province"  size="20px;" placeholder="เช่น เชียงใหม่ " >
            </div>
 			</div>

 			<div class="form-group  ">
          <label class="col-sm-3 control-label"  >รหัสไปรษณีย์ :</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" name="emp_post_code" id="emp_post_code"  size="20px;" placeholder="เช่น 50000 " >
            </div>
 			</div>
 			    

 			<div class="form-group  ">
 			<label class="col-sm-3 control-label"  >เบอร์โทรที่ติดต่อได้ :</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" name="emp_phone" id="emp_phone"  size="20px;" placeholder="เช่น 0955142114 " maxlength="10" minlength="10">            </div>
 			</div>

 			<div class="form-group  ">
 			<label class="col-sm-3 control-label"  >สถานภาพ :</label>
            <div class="col-sm-5">
               <input type="radio" name="emp_condition" value="sing" style="margin-top:12px;" checked="checked" > โสด &nbsp
              <input type="radio" name="emp_condition" value="marie"> สมรส
              <input type="radio" name="emp_condition" value="ruin"> อย่าร้าง
  
            </div>
 			</div>
       <hr>
     <p class="text-center"> <b>สำหรับชาวต่างด้าว</b></p> 
     <div class="form-group  ">
          <label class="col-sm-3 control-label"  >เดินทางเข้ามาวันที่ :</label>
           <div class="col-sm-7">
              <input class="form-control" type="date" name="date_county" id="date_county"   >
            </div>
      </div>

      <div class="form-group  ">
      <label class="col-sm-3 control-label"  >เลขที่หนังสือเดินทาง :</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" name="emp_pastpost" id="emp_pastpost"   placeholder="เช่น 0955142114 "  maxlength="13" minlength="13" >            

              </div>
      </div>
      <div class="form-group  ">
          <label class="col-sm-3 control-label"  >จากประเทศ :</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" name="emp_truecoun" id="emp_truecoun"  size="20px;" placeholder="เช่น พม่า " >
            </div>
      </div>

      <hr>

 			<div class="form-group  ">
 			<label class="col-sm-3 control-label"  >รูป :</label>
            <div class="col-sm-5">
               <input type="file"  name="emp_img" class="form-control" id="emp_img" accept="image/*" >
            </div>
 			</div>

      





           <input type="submit" class="btn btn-default" id="insert" value=" บันทึกข้อมูล " style="float: right;font-size: 15px;">
        </form>
        <br>
        <br>
      </div>

      
       
    
    </div>
  </div>
</div>

