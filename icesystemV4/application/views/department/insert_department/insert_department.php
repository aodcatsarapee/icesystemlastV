
<div class="modal fade" id="modal-insert-department">
  <div class="modal-dialog ">
    <div class="modal-content ">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">เพิ่มเเผนก</h3>
      </div>
      <div class="modal-body" id="insert" style="font-size: 15px;">
                
          <form class="form-horizontal" method="POST" id="insert_form_Department" name="insert_form_Department" enctype="multipart/form-data" >
           <div class="form-group ">
            <label class="col-sm-3 control-label" >รหัสแผนกงาน :</label>
            <div class="col-sm-7">
            <fieldset disabled>
              <input type="text" id="disabledTextInput" class="form-control" >
              </fieldset>
            </div>
          </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ชื่อแผนกงาน :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="department_name" id="department_name"  placeholder="เช่น พนักงานผลิต " >
            </div>
          </div>

          <div class="form-group  ">
            <label class="col-sm-4 control-label"  >อัตราเงินเดือนรายวัน :</label>
            <div class="col-sm-6">
              <input class="form-control" type="text" name="salaly_set" id="salaly_set"  placeholder="เช่น 300 " > 
            </div>
          </div>
        
        
           <input type="submit" class="btn btn-default" id="insert" value=" บันทึกข้อมูล " style="float: right;font-size: 15px;">
        </form>
        <br><br>
      </div>
      
       
    
    </div>
  </div>
</div>

