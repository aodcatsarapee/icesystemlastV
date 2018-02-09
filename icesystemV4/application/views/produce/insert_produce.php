

<div class="modal fade " id="modal-insert-produce">
  <div class="modal-dialog ">
    <div class="modal-content ">
      <div class="modal-header bg-success" >
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">สั่งผลิตสินค้า</h3>
      </div>
      <div class="modal-body" id="insert" style="font-size: 15px; background-color: #fff'">

         <form action="" method="POST" role="form" id="insert_form1">
             <p class="error" style="text-align: center;"> </p>  
            <table class="table table-bordered  ">
            <thead>
              <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th style="text-align: center;">จำนวน</th>
              </tr>
            </thead>
              <tbody>
               <?php $i=0;  foreach ($rs as $product) {?>   
                <tr>
                  <td width="20%">                                                          
                             <input type="text" class="form-control" id="product_id" name="product_id[]"  class="form-control" value="P<?php   echo $product['product_id'] ?>" disabled  >
                              <input type="hidden" class="form-control" id="product_id" name="product_id[]"  class="form-control" value="<?php   echo $product['product_id'] ?>"   >
                   </td>
                   <td width="40%">
                            <input type="text" class="form-control" id="product_name" name="product_name[]" placeholder="Input field" value="<?php  echo $product['product_name']; ?>" disabled  >
                            <input type="hidden" class="form-control" id="product_name" name="product_name[]" placeholder="Input field" value="<?php  echo $product['product_name']; ?>"   >
                  </td>
                  <td width="10%">           
                            <input type="number" class="form-control " name="product_amount[]" id="product_amount<?php echo $i; ?>" placeholder="จำนวน" min="0" value="0" style="text-align: right;" onchange="check_amount()">   
                                
                  </td>

                </tr>
                 <input type="hidden" name="product_type[]"  class="form-control" value="<?php   echo $product['product_type'] ?>">

                 <input type="hidden" name="number"  id='number' class="form-control" value="<?php echo count($rs); ?>">
                <?php $i++;} ?>
              </tbody>
              
            </table>
            <i style="float: left; font-size: 15px;"><b>*หมายเหตุ</b> หากสินค้าชนิดใดที่ไม่ต้องการให้ผลิตให้กำหนดจำนวนเท่ากับ 0</i>
             <button type="submit" id="submit_dis" class="btn btn-default" style="float: right;font-size: 15px;" disabled > บันทึก</button>
         </form>


        <br>
        <br>
      </div>
    
    </div>
  </div>
</div><input type="hidden" name="number_check"  id='number_check' class="form-control" value="<?php echo count($rs); ?>">
<script>
function check_amount() {
  var test = [];
	var amount_count = $("#number_check").val();
	var check_con;
	for (var i = 0; i < amount_count; i++) {
		if ($("#product_amount" + i).val() != 0) {
			$('#submit_dis').removeAttr("disabled");
    }
     test[i] = $("#product_amount" + i).val() == 0 ;

     if(  test[i]  == false){

      alert(test[i]);

     }else{
      $('#submit_dis').prop("disabled", true);
     }

  }


   
    
  
}

</script>