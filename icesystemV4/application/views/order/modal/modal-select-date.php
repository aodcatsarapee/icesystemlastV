
<div class="modal  fade" id="modal-select-date">
  <div class="modal-dialog " style="width: 500px;">
    <div class="modal-content ">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">เลือกวันที่</h3>
      </div>
      <div class="modal-body" id="insert" style="font-size: 15px;">

           <div class="date_alert" style=" color: red; margin-left: 510px; "> </div>
                
          <form class="form-horizontal" method="POST" id="select-date-new" name="select-date-new" enctype="multipart/form-data" >
           <div class="form-group ">
            <label class="col-sm-3 control-label" >วันที่ :</label>
            <div class="col-sm-7">
          
                <input type='date'  name='date_start' id='date_start' class='form-control' >
              
            </div>
          </div>

          <div class="form-group ">
            <label class="col-sm-3 control-label" >ถึง :</label>
            <div class="col-sm-7">
          
               <input type='date'  name='date_end' id='date_end' class='form-control' >
              
            </div>
          </div>

           <input type="submit" class="btn btn-default" value=" ตกลง " style="float: right;font-size: 15px;">
        </form>
        <br><br>
      </div>
      
    </div>
  </div>
</div>

