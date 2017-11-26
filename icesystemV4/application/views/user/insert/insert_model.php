
<div class="modal  fade" id="modal-insert-user">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success" >
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">เพิ่มผู้ใช้งาน</h4>
      </div>
      <div class="modal-body">
           

         <form class="form-horizontal" method="POST" id="insert_form_user" name="insert_form_user" enctype="multipart/form-data" >
          
           <div class="form-group ">
              <label class="col-sm-3 control-label"  >พนักงาน :</label>
                <div class="col-sm-7">
                
                <select name="employee" id="employee" class="form-control" >
                     
                      <option value="">เลือกพนักงาน</option>
                
                <?php   foreach ($employee as $value) {?>   
                            
                       <option value="<?php echo $value['employee_id'] ?>" st><?php  echo $value['fname']." ".$value['lname']." | ".$value['name']; ?></option>
                    
                <?php } ?>
                </select>
              </div>
            </div>
        <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ชื่อผู้ใช้งาน :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="username" id="username"  >
            </div>
          </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >รหัสผู้ใช้งาน :</label>
            <div class="col-sm-7">
              <input class="form-control" type="password" name="password" id="password"  >
            </div>
          </div>
           <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ยืนยันรหัสผู้ใช้งาน :</label>
            <div class="col-sm-7">
              <input class="form-control" type="password" name="confirmpassword" id="confirmpassword"   >
            </div>
          </div>
          

           <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ประเภทผู้ใช้งาน :</label>
                      <div class="col-sm-7">
                   <select name="type" id="input" class="form-control">
               <option value="">เลือกประเภทผู้ใช้งาน</option>
                <option value="admin">ผู้ดูเเลระบบ</option>
                 <option value="manager">ผู้จัดการ</option> 
                 <option value="emp_store">พนักงานคลังสินค้า</option>        
                 <option value="emp_produce">พนักงานผลิตสินค้า</option> 
                 <option value="emp_sale">พนักงานขายสินค้า</option>
                 <option value="emp_account">พนักงานบัญชี</option>
             </select>
                </div>
          </div>
        
           <input type="submit" class="btn btn-default" id="insert" value=" บันทึกข้อมูล " style="float: right;font-size: 15px;">
        </form>
        <br><br>
      
      </div>
    </div>
  </div>
</div>