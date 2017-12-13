<script type="text/javascript">

     $(document).ready(function(){

     	$(".print_sell_id").click(function(event) {
     		/* Act on the event */
     		var id=$(this).attr("id");

     		  window.open('Genpdf/print_sell_id?id='+id,'_blank')

           
     	});

     	$(".print_sell").click(function(event) {
     		/* Act on the event */
     		var id=$(this).attr("id");

     		  window.open('Genpdf/print_sell_id_1?id='+id,'_blank')

            
     	});

     	$(".print_sell_debtor").click(function(event) {
     		/* Act on the event */
     		var id=$(this).attr("id");
			
			window.open('Genpdf/print_sell_debtor?id='+id,'_blank')

            
     	});




     });

</script>
		
	


 <table class="table table-bordered table-hover">
		<thead>
			
				<tr>
					<th colspan="2">  <?php  echo "รหัสการขาย : ".$sell_detail['sell_detail_id']; ?></th>
					<th colspan="3"> 

					 <?php  
					 		if($sell_detail['sell_detail_status']!="ขายสินค้าเป็นเงินสด"){


							 echo "ชื่อลูกค้า : ".$sell_detail['customer_fname']." ".$sell_detail['customer_lname']; 
					 		}else{
					 			echo "ชื่อลูกค้า : -";
					 		}

					 ?>
					 	


					 </th>
				</tr>
				<tr>
				<?php if($sell_detail['sell_detail_status']=='ขายสินค้าเป็นเงินสด'){  ?>
							<th colspan="2">
							สถานะการขาย : 
							 <span class="label label-primary label-lg">	
							<?php  echo $sell_detail['sell_detail_status']; ?>
								
							</span>
							</th>
							<th colspan="3">

							สถานะการจ่ายเงิน : 
							 <span class="label label-primary label-lg">	
								<?php  echo $sell_detail['sell_detail_pay_status']; ?>
							</span>
							</th>
								<?php }else{ ?>

								<th colspan="2">
							สถานะการขาย : 
							 <span class="label label-success label-lg">	
							<?php  echo $sell_detail['sell_detail_status']; ?>
								
							</span>
							</th>
							<th colspan="3">

							สถานะการจ่ายเงิน : 
							 <span class="label label-success label-lg">	
								<?php  echo $sell_detail['sell_detail_pay_status']; ?>
							</span>
							</th>
							
						<?php } ?>
						
				</tr>
				<tr>

				<?php if( $_SESSION['type']!='manager'){ ?>
					<?php if($sell_detail['sell_detail_status']=='ขายสินค้าเป็นเงินสด' && $sell_detail['sell_detail_pay_status']=='ชำระเงินเเล้ว'   ){ ?>

					<th colspan="5"><h2>รายการขาย
					<button type="button" class="btn btn-success print_sell" style="float: right;" id='<?php echo $sell_detail['sell_detail_id']; ?>'><spen class='glyphicon glyphicon-print'></spen> พิมพ์ใบเสร็จ</button>
					</h2>
					</th>
					<?php }elseif($sell_detail['sell_detail_status']=='ขายสินค้าเป็นเงินสดจากการสั้งซื้อ' && $sell_detail['sell_detail_pay_status']=='ชำระเงินเเล้ว' ){ ?>

 					<th colspan="5"><h2>รายการขาย
  						<button type="button" class="btn btn-success print_sell_id" style="float: right;" id='<?php echo $sell_detail['sell_detail_id']."-".$sell_detail['customer_fname']."-".$sell_detail['customer_lname']; ?>'><spen class='glyphicon glyphicon-print'></spen> พิมพ์ใบเสร็จ</button>
  						</h2>
  					</th>

					<?php }else if($sell_detail['sell_detail_status']=='ขายสินค้าเป็นเงินเชื่อ' && $sell_detail['sell_detail_pay_status']=='ชำระเงินเเล้ว'  || $sell_detail['sell_detail_status']=='ขายสินค้าเป็นเงินเชื่อจากการสั้งซื้อ' && $sell_detail['sell_detail_pay_status']=='ชำระเงินเเล้ว'){ ?>
  						<th colspan="5"><h2>รายการขาย
  						<button type="button" class="btn btn-success print_sell_id" style="float: right;" id='<?php echo $sell_detail['sell_detail_id']."-".$sell_detail['customer_fname']."-".$sell_detail['customer_lname']; ?>'><spen class='glyphicon glyphicon-print'></spen> พิมพ์ใบเสร็จ</button>
  						</h2>
  						</th>
					<?php }else{ ?>
					<th colspan="5"><h2>รายการขาย
					<button type="button" class="btn btn-success print_sell_debtor" style="float: right;" id='<?php echo $sell_detail['sell_detail_id']."-".$sell_detail['customer_fname']."-".$sell_detail['customer_lname']; ?>'><spen class='glyphicon glyphicon-print'></spen> พิมพ์ใบเเจ้งชำระหนี้</button>
					</h2>
					</th>
					<?php } } ?>

				</tr>
			<tr style="text-align: center;">
				<th style="text-align: center;" >รหัสสินค้า</th>
				<th style="text-align: center;">ชื่อสินค้า</th>
				<th style="text-align: center;">จำนวน</th>
				<th style="text-align: center;">ราคา/หน่วย</th>
				<th style="text-align: center;" >รวม</th>
				
				
			</tr>
		</thead>
		<tbody>
		<?php  

		foreach ($sell as $sell_detail) {

			
		 ?>
			<tr>
				<td style="text-align: center;">P<?php echo  $sell_detail['product_id'];; ?></td>
				<td  style="text-align: center;"><?php echo  $sell_detail['product_name']; ?></td>
				<td  style="text-align: center;"><?php echo  number_format($sell_detail['sell_product_quantity']); ?></td>
				<td  style="text-align: center;"><?php echo  number_format($sell_detail['sell_product_price'],2); ?> บาท</td>
				<td  style="text-align: center;"><?php echo number_format($sell_detail['sell_product_quantity']*$sell_detail['sell_product_price']);  ?> บาท</td>
			<?php $total=$sell_detail['sell_detail_total']; ?>
						
			
			<?php }?>

			<tr>
			<td colspan="4" style="text-align: right;">ราคารวม</td>
			<td  style="text-align: center;"><?php  echo number_format($total,2); ?> บาท</td>
			</tr>
		</tbody>
	</table>