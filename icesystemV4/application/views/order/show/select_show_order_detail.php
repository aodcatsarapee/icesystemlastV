<script type="text/javascript">

     $(document).ready(function(){

 $("#form_order_out_date").validate({

            rules: {

                    order_out_date: "required",

                    },

                    messages: {

                    order_out_date: "กรุณากรอกข้อมูล",

                    },

                    errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents( ".col-sm-12" ).addClass( "has-feedback" );

                     element.parents( ".col-sm-6" ).addClass( "has-feedback" );

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
                    $( element ).parents( ".col-sm-12" ).addClass( "has-error" ).removeClass( "has-success" );
                    $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                    $( element ).parents( ".col-sm-6" ).addClass( "has-error" ).removeClass( "has-success" );
                    $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-12" ).addClass( "has-success" ).removeClass( "has-error" );
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                    $( element ).parents( ".col-sm-6" ).addClass( "has-success" ).removeClass( "has-error" );
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                },
            submitHandler: function(form) {

               var formData = new FormData($('#form_order_out_date')[0]);


                              $.ajax({
                                   
                                    url:"Order/update_order",
                                   
                                    type: 'POST',
                                   
                                    data: formData,

                                    async: false,

                                    cache: false,

                                    contentType: false,

                                    processData: false,
                                   
                                    success:function(data){

                                    location.reload();
                                    
                                    }
                              });
                          }
                    });
             });


</script>


<div class="table-responsive">
	<table class="table table-hover table-bordered">
		<thead>

			<tr>
				

			<?php foreach ($order_detail as $key => $value) {
				

				if ($value === end($order_detail)) { ?>


                  <th colspan="3">รหัสสั้งซื้อสินค้า: <?php echo $value['order_detail_id'] ?></th>

                   <th colspan="3">ชื่อลูกค้า: <?php echo $value['customer_fname']." ".$value['customer_lname'] ?></th>

                 <?php    
                    } } ?>


			</tr>

			<tr>
				<th>รหัสสินค้า</th>
				<th>ชื่อสินค้า</th>
				<th style="text-align: center;">ราคา/หน่วย</th>
				<th  style="text-align: center;">จำนวน</th>
				<th  style="text-align: center;">ราคารวม</th>

			</tr>
		</thead>
		<tbody>
		<?php 	$this->load->helper('Datethai'); 
				$next_day = date('Y-m-d',strtotime("+1 day"));
		
		?> 
	
        <?php foreach ($order_detail as $key => $value) { ?>

		<!-- ==============คำนวนเวลา========= -->
			<!-- น้ำแข็งผลิตเป็นรอบๆโดยตัวแปลหลักจะอยู่ที่ก้อนกับหลอด
			ถ้ามีก้อนจะอิงก้อนเป็นหลักโดยการผลิตจะแบ่งเป็นรอบๆ
			ช่วงตี 4 ถึง เที่ยง 
			ช่วง เที่ยงถึง 4 ทุ่ม
			ถ้าสั่งตอน บ่ายสามจะได้อีกทีตั้งแต่ตี 4เป็นต้นไป
			ถ้าสั่งช่วง 8 โมงเช้าจะได้ตั้งแต่เที่ยงเ้ป็นต้นไปเพราะโรงงานจะผลิตเผื่อเต็มสล็อต

			ส่วนหลอดรอบผลิตจะเยอะกว่า แต่เวลาสั่งจองจะคล้ายๆกับก้อน 
			
			
			
			-->

		<!-- ======================================== -->
		<?php 
		$h = 0;
		$m = 0;
		$get_custime = $value['order_out_customer_date'];
		$cal = explode(":",$get_custime);

				if($value['product_id'] == '0013'){ 
					
					
					if($cal[0] >= 3 && $cal[0] <= 11){
						$set_time = "12.00 นาฬิกาในวันนี้เป็นต้นไป";
						
						
					}else if($cal[0] > 12 && $cal[0] <= 22){
						$set_time = '03.00 นาฬิกาใน '.Datethai($next_day).' เป็นต้นไป';
						
						
					}else{

						$set_time = '03.00 นาฬิกาใน '.Datethai($next_day).' เป็นต้นไป';
					}
					
					?>

					
			<?php	}else{
				
				if($cal[0] >= 3 && $cal[0] <= 11){
					$set_time = "12.00 นาฬิกาในวันนี้เป็นต้นไป";
					
					
				}else if($cal[0] > 12 && $cal[0] <= 17){
					$set_time = "18.00 นาฬิกาจนถึงเวลา 22.00 นาฬิกา";
					
					
				}else if($cal[0] > 18 && $cal[0] <= 23){
					$set_time = '03.00 นาฬิกาใน '.Datethai($next_day).' เป็นต้นไป';
					
					
				}else{
					$set_time = '03.00 นาฬิกาใน '.Datethai($next_day).' เป็นต้นไป';
				}
				
				
				
				?>
	
				

				<?php  } ?>
	

		<!-- ======================= -->
			
			<tr>
				<td><?php echo $value['product_id'] ?></td>
				<td><?php echo $value['order_product_name'] ?></td>
				<td  style="text-align: center;"><?php echo $value['order_product_price'] ?> บาท</td>
				<td  style="text-align: center;"><?php echo number_format($value['order_product_quantity']) ?></td>
				<td  style="text-align: center;"><?php echo number_format($value['order_product_total_price'],2) ?> บาท</td>

			</tr>
			
			<?php } ?>

			<tr >
				<td colspan="4" style="text-align: center;">รวม</td>

					<?php foreach ($order_detail as $key => $value) {
				

				if ($value === end($order_detail)) { ?>

         			<td colspan="4" style="text-align: center;"><?php echo number_format($value['order_detail_total'],2) ?> บาท</td>

                    <?php    } } ?>

			</tr>
		</tbody>
	</table>
	<a href="Genpdf/order_detail_id?id=<?php echo $value['order_detail_id']."-".$value['customer_fname']."-".$value['customer_lname'] ?>" class="btn btn-success btn-xs" target="_blank" style="float: right ;font-size:20px;" ><spen class='glyphicon glyphicon-print'  ></spen> พิมพ์ </a>
<br>
<br>



</div>



<?php foreach ($order_detail as $key => $value) { 


if($value['order_detail_status'] == "กำลังดำเนินการ"){

	
	if ($value === end($order_detail)) { 

	if($value['order_out_date']==""){?>

<form  method="POST" role="form" id="form_order_out_date" name="form_order_out_date">

<input type="hidden" name="order_id" id="order_id" class="form-control" value="<?php foreach ($order_detail as $key => $value) { if ($value === end($order_detail)) {echo $value['order_detail_id']; } } ?>">

<div class="table-responsive">
	<table class="table table-hover table-bordered">

		<thead>

		<tr>
				<th colspan="2" style="text-align: center; font-size: 20px;">
		            สั่งผลิตสินค้า
				</th>

		</tr>
		<tr>
				<th style="text-align: right; font-size: 18px;">ลูกค้าสั่งเมื่อ :</th>
				

			<?php foreach ($order_detail as $key => $value) {
				

				if ($value === end($order_detail)) { ?>


                  <th> 
                  		<div class="col-sm-12">
		                <input type="text" class="form-control " disabled value=" <?php echo 'วันที่ '.Datethai($value['order_detail_date']).' เวลา: '.$value['order_out_customer_date'].' น.'; ?>" >
	              </div>

                 </th>


                 <?php    
                    } } ?>


		</tr>
			<tr>

			<th style="text-align: right; font-size: 18px;">นัดรับสินค้า :</th>
				<th >
				 <div class="col-sm-12">
				<?php if ($_SESSION['type']=='manager') { ?>
				  
		                <input type="text" class="form-control " name="order_out_date" id="order_out_date" placeholder="เช่น มารับสินค้าในเวลา 15.00 น วันที่ 10/05/2560 " disabled >
		         <?php }else{ ?>
		          <input type="text" class="form-control " name="order_out_date" id="order_out_date" placeholder="เช่น มารับสินค้าในเวลา 15.00 น วันที่ 10/05/2560 " value="<?php echo $set_time ?>" >

		          <?php } ?>
	              </div>
	           </th>
	          
	         </tr>
	        
	         <tr>
	         <th ></th>

	            <th  style="text-align: right;">
	            <?php if ($_SESSION['type']=='manager') { ?>
	         
	           	 	 <button type="submit" class="btn btn-success" disabled> <span class="fa fa-save" aria-hidden="true" ></span> บันทึก</button>
	           	 <?php }else{ ?>
	           	 		 <button type="submit" class="btn btn-success" > <span class="fa fa-save" aria-hidden="true" ></span> บันทึก</button>
	           	 <?php } ?>
	            </th>
	          </tr>



			
		</thead>
	</table>
</div>
</form>



	<?php }else{ ?> 

			<form ">


<div class="table-responsive">
	<table class="table table-hover table-bordered">

		<thead>

		<tr>
				<th colspan="2" style="text-align: center; font-size: 20px;">
		            สั่งผลิตสินค้า
				</th>
		</tr>
		<tr>
				<th style="text-align: right; font-size: 18px;">ลูกค้าต่องการรับ :</th>
				

			<?php foreach ($order_detail as $key => $value) {
				

				if ($value === end($order_detail)) { ?>


                  <th> 
                  		<div class="col-sm-12">
		                <input type="text" class="form-control " disabled value=" <?php echo $value['order_out_customer_date'] ?>" >
	              </div>

                 </th>


                 <?php    
                    } } ?>


				
		</tr>
			<tr>
			<th style="text-align: right; font-size: 18px;">นัดรับสินค้า :</th>
				<th >
				   <div class="col-sm-12">
		                <input type="text" class="form-control" value="<?php echo $value['order_out_date'] ?>" disabled>
	              </div>
	           </th>
	          
	         </tr>
	        
	         <tr>
	         <th ></th>

	            <th  style="text-align: right;">
	           	 	 <button type="submit" class="btn btn-success" disabled> <span class="fa fa-save" aria-hidden="true" disabled ></span> บันทึก</button>
	            </th>
	          </tr>



			
		</thead>
	</table>
</div>
</form>















	<?php } } } } ?>


























