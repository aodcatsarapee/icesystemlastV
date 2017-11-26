
<div class="modal  fade" id="modal-insert-account">
  <div class="modal-dialog ">
    <div class="modal-content ">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">บันทึกรายรับ - รายจ่าย</h3>
      </div>
      <div class="modal-body" id="insert" style="font-size: 15px;">
                
          <form class="form-horizontal" method="POST" id="insert_account" name="insert_account" enctype="multipart/form-data" >
           

          <div class="form-group ">
              <label class="col-sm-3 control-label"  >ประเภท :</label>
                <div class="col-sm-7">
                <select name="account_type" id="account_type" class="form-control">
                  <option value="">เลือกประเภท</option>
                  <option value="รายรับ">รายรับ</option>
                  <option value="รายจ่าย">รายจ่าย</option>
                </select>
              </div>
            </div>

          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >จำนวนเงิน :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="money" id="money"  placeholder="เช่น  100 200 300  " >
            </div>
          </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >รายละเอียด :</label>
            <div class="col-sm-7">
              <textarea name="account_detail" id="account_detail" class="form-control" rows="4" required="required"></textarea>
            </div>
          </div>
           <input type="submit" class="btn btn-default"  value=" บันทึกข้อมูล " style="float: right;font-size: 15px;">
        </form>
        <br><br>
      </div>
      
       
    
    </div>
  </div>
</div>

