

<div class="modal  fade " id="modal-insert">
  <div class="modal-dialog ">
    <div class="modal-content ">
      <div class="modal-header bg-success" >
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">เพิ่มสินค้าใหม่</h3>
      </div>
      <div class="modal-body " id="insert" style="font-size: 15px;">
                
          <form class="form-horizontal" method="POST" id="insert_form" name="insert_form" enctype="multipart/form-data" >
           <div class="form-group ">
            <label class="col-sm-3 control-label" >รหัสสินค้า :</label>
            <div class="col-sm-7">
            <fieldset disabled>
              <input type="text" id="disabledTextInput" class="form-control" >
              </fieldset>
            </div>
          </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ชื่อสินค้า :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="name" id="name"  placeholder="เช่น น้ำเเข็งก้อน " >
            </div>
          </div>
          <div class="form-group ">
            <label class="col-sm-3 control-label" >รายละเอียด :</label>
            <div class="col-sm-7">
              <textarea name="detail" id="detail" class="form-control" rows="3" placeholder="เช่น น้ำเเข็งที่มีลักษณะที่เป็นก้อน" ></textarea>
            </div>
          </div>
           <div class="form-group">
            <label class="col-sm-3 control-label" >ราคา :</label>
            <div class="col-sm-6">
              <input class="form-control" type="text" name="price" id="price" placeholder="เช่น 20 30 40" >
            </div>
          </div>
           <div class="form-group ">
            <label class="col-sm-3 control-label" >หน่วย :</label>
            <div class="col-sm-6">
              <input class="form-control" type="text" name="type" id="type" placeholder="เช่น ก้อน ถุง กระสอบ"  >
            </div>
          </div>
          <div class="form-group ">
            <label class="col-sm-3 control-label" >เเจ้งเมื่อสินค้าใกล้หมด :</label>
            <div class="col-sm-6">
              <input class="form-control" type="text" name="amount_alert" id="amount_alert" placeholder="จำนวน เช่น  5 10 15"  >
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label" >รูปภาพ :</label>
            <div class="col-sm-6">
             <input type="file"  name="product_img" class="form-control" id="product_img" accept="image/*" >

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

