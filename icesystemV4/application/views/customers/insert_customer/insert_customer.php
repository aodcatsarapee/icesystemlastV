
<div class="modal  fade" id="modal-insert-customer">
  <div class="modal-dialog " style=" max-width: 800px;">
    <div class="modal-content ">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">เพิ่มข้อมูลลูกค้า</h3>
      </div>
      <div class="modal-body" id="insert" style="font-size: 15px;">
                
          <form class="form-horizontal" method="POST" id="insert_form_customer" name="insert_form_customer" enctype="multipart/form-data" >
           <div class="form-group ">
            <label class="col-sm-3 control-label" >รหัสลูกค้า :</label>
            <div class="col-sm-7">
            <fieldset disabled>
              <input type="text" id="disabledTextInput" class="form-control" >
              </fieldset>
            </div>
          </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ชื่อ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="cus_name" id="cus_name"  placeholder="เช่น สุทร " >
            </div>
          </div>
             <div class="form-group  ">
            <label class="col-sm-3 control-label"  >นามสกุล :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="cus_lname" id="cus_lname"  placeholder="เช่น ชาติไทย " >
            </div>
          </div>

          	<div class="form-group  ">
            <label class="col-sm-3 control-label"  >สัณชาติ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="cus_blood" id="cus_blood"  placeholder="เช่น ไทย " >
            </div>
          </div>

          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >เลขบัตรประชาชน :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="id_card" id="id_card"  placeholder="เช่น 1509901476538 "  maxlength="13" minlength="13"  >
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
              <input class="form-control" type="date" name="cus_date" id="cus_date"   >
            </div>
          </div>	


          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ที่อยู่ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="cus_adress" id="cus_adress"  placeholder="เช่น 1295/1 โรงน้ำแข็งทวีชัย ถนน แก้วนวรัฐ " >
            </div>
          </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >เขต/ตำบล :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="cus_sub_area" id="cus_sub_area" placeholder="เช่น วัดเกต "  >
            </div>
            
          </div>
          <div class="form-group  ">
          <label class="col-sm-3 control-label"  >อำเภอ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="cus_area" id="cus_area"  size="20px;" placeholder="เช่น เมืองเชีงใหม่ " >
            </div>
 			</div>

 			<div class="form-group  ">
          <label class="col-sm-3 control-label"  >จังหวัด :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="cus_province" id="cus_province"  size="20px;" placeholder="เช่น เชียงใหม่ " >
            </div>
 			</div>

 			<div class="form-group  ">
          <label class="col-sm-3 control-label"  >รหัสไปรษณีย์ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="cus_post_code" id="cus_post_code"  size="20px;" placeholder="เช่น 50000 "  maxlength="4" minlength="4">
            </div>
 			</div>

 			

 			<div class="form-group  ">
 			<label class="col-sm-3 control-label"  >เบอร์โทรที่ติดต่อได้ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="cus_phone" id="cus_phone"  size="20px;" placeholder="เช่น 0955142114 "  maxlength="10" minlength="10">            </div>
 			</div> 			


      <div class="form-group  ">
      <label class="col-sm-3 control-label"  >อีเมล์ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="cus_mail" id="cus_mail"  size="20px;" placeholder="เช่น toto@gmail.com " >            </div>
      </div>      

       <!-- <div class="form-group  ">
      <label class="col-sm-3 control-label"  >ไอดี :</label>
            <div class="col-sm-5">
              <input class="form-control" type="text" name="cus_id" id="cus_id"  size="20px;"  >            </div>
      </div>       -->

      <div class="form-group  ">
      <label class="col-sm-3 control-label"  >รหัสผ่าน :</label>
            <div class="col-sm-7">
              <input class="form-control" type="Password" name="cus_pass" id="cus_pass"  size="20px;"  >
              </div>
      </div>

      <div class="form-group  ">
      <label class="col-sm-3 control-label"  > ยืนยันรหัสผ่าน  :</label>
            <div class="col-sm-7">
              <input class="form-control" type="Password" name="cus_pass_confirm" id="cus_pass_confirm"  size="20px;"  >
              </div>
      </div>       
 			



 			<div class="form-group  ">
 			<label class="col-sm-3 control-label"  >รูป :</label>
            <div class="col-sm-7">
               <input type="file"  name="cus_img" class="form-control" id="cus_img" accept="image/*" >
            </div>
 			</div>



           <input type="submit" class="btn btn-default" id="insert" value=" บันทึกข้อมูล " style="float: right;font-size: 15px;">
        </form>
        <br><br>
      </div>
      
       
    
    </div>
  </div>
</div>

