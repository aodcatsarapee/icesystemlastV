<script>

     $(document).ready(function(){
		
		    $(".update_debtor").click(function(event) {
                /* Act on the event */
           	var id=$(this).attr("id");

           window.open('Genpdf/update_debtor?id='+id,'_blank')

            location.reload();
                                                                                                    
                    
      })

		     $(".print_debtor").click(function(event) {
                /* Act on the event */
           	var id=$(this).attr("id");

           window.open('Genpdf/print_sell_id?id='+id,'_blank')

                                                                                                          
                    
      })

});

 </script>

 <div class="table-responsive">
 <table class="table table-bordered table-hover">
		<thead>
			
				<tr>
					<td colspan="2"> 

							<b>รหัสลูกหนี้ :</b> D<?php echo $debtor_detail['debtor_id']; ?> 


					</td>
					<td colspan="3"> 

							<b>ชื่อลูกหนี้ :</b> <?php echo $debtor_detail['customer_fname']." ".$debtor_detail['customer_lname']; ?> 


					</td>

					
				</tr>
				<tr>
					<td colspan="2"> 

							<b>รหัสขายสินค้า :</b> S<?php echo $debtor_detail['sell_id']; ?> 


					</td>
					<td colspan="3"> 

					<?php if($debtor_detail['debtor_status'] == "ยังไม่ได้ชำระเงิน"){ ?>
							<b>สถานะการชำระเงิน :

								 <span class="label label-danger label-lg">
                                       
                                     <?php echo $debtor_detail['debtor_status'] ?> 

                             </span>
							</b>
					<?php }else{ ?>	
							<b>สถานะการชำระเงิน :

								 <span class="label label-primary label-lg">
                                       
                                     <?php echo $debtor_detail['debtor_status'] ; 

                                     		 
                                     ?> 

                             </span>
							</b>


					<?php } ?>		
					</td>
						
				</tr>

				<tr>
					
					<td colspan="5"><h3 >รายการสินค้า 


					<?php if($debtor_detail['debtor_status'] == "ยังไม่ได้ชำระเงิน"){ ?>										
				
				<?php if($_SESSION['type']=='manager'){ ?>
				
				<button type="button" class="btn btn-success update_debtor" id="<?php echo $debtor_detail['debtor_id']."-".$debtor_detail['sell_id']."-".$debtor_detail['customer_fname']."-".$debtor_detail['customer_lname']."-".$debtor_detail['price_total']?>" style="float: right; font-size: 15px;" disabled><spen class='fa fa-money'></spen> รับชำรำเงิน </button>
				<?php }else{ ?>
						<button type="button" class="btn btn-success update_debtor" id="<?php echo $debtor_detail['debtor_id']."-".$debtor_detail['sell_id']."-".$debtor_detail['customer_fname']."-".$debtor_detail['customer_lname']."-".$debtor_detail['price_total']?>" style="float: right; font-size: 15px;" ><spen class='fa fa-money'></spen> รับชำรำเงิน </button>


				<?php } ?>

					<?php }else{ ?>	

					<?php if($_SESSION['type']=='manager'){ ?>
				

					<button type="button" class="btn btn-success print_debtor"  style="float: right; font-size: 15px;" id="<?php echo $debtor_detail['sell_id']."-".$debtor_detail['customer_fname']."-".$debtor_detail['customer_lname']?>" disabled><spen class='glyphicon glyphicon-print'></spen> พิมพ์ใบเสร็จ  </button>		
		
					<?php }else{ ?>
                      <button type="button" class="btn btn-success print_debtor"  style="float: right; font-size: 15px;" id="<?php echo $debtor_detail['sell_id']."-".$debtor_detail['customer_fname']."-".$debtor_detail['customer_lname']?>"><spen class='glyphicon glyphicon-print'></spen> พิมพ์ใบเสร็จ  </button>	
					<?php } }?>	

					
					</h3>
					


					</td>
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
				<td style="text-align: center;">P<?php echo  $sell_detail['product_id']; ?></td>
				<td  style="text-align: center;"><?php echo  $sell_detail['product_name']; ?></td>
				<td  style="text-align: center;"><?php echo  number_format($sell_detail['sell_product_quantity']).' '.$sell_detail['product_type']; ?></td>
				<td  style="text-align: center;"><?php echo  number_format($sell_detail['sell_product_price'],2); ?> บาท</td>
				<td  style="text-align: center;"><?php echo  number_format($sell_detail['sell_product_quantity']*$sell_detail['sell_product_price']);  ?> บาท</td>
			<?php $total=$sell_detail['sell_detail_total']; ?>
						
			
			<?php }?>

			<tr>
			<td colspan="4" style="text-align: right;">ราคารวม</td>
			<td  style="text-align: center;"><?php  echo number_format($total,2); ?> บาท</td>
			</tr>
		</tbody>
	</table>
	</div>

				