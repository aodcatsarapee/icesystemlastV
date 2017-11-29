<table class="table table-hover table-bordered">
		<thead>

			<tr>
				

			<?php foreach ($order_detail as $key => $value) {
				

				if ($value === end($order_detail)) { ?>


                  <td colspan="3">รหัสสั้งซื้อสินค้า: <?php echo $value['order_detail_id'] ?></td>

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
        <?php foreach ($order_detail as $key => $value) { ?>
			
			<tr>
				<td><?php echo $value['product_id'] ?></td>
				<td><?php echo $value['order_product_name'] ?></td>
				<td  style="text-align: center;"><?php echo $value['order_product_price'] ?> บาท</td>
				<td  style="text-align: center;"><?php echo $value['order_product_quantity'] ?></td>
				<td  style="text-align: center;"><?php echo $value['order_product_total_price'] ?> บาท</td>

			</tr>
			
			<?php } ?>

			<tr >
				<td colspan="4" style="text-align: center;">รวม</td>

					<?php foreach ($order_detail as $key => $value) {
				

				if ($value === end($order_detail)) { ?>

         			<td colspan="4" style="text-align: center;"><?php echo $value['order_detail_total'] ?> บาท</td>

                    <?php    } } ?>

			</tr>
		</tbody>
	</table>
	<a href="<?php echo base_url()?>Order/order_detail_id?id=<?php echo $value['order_detail_id'] ?>" class="btn btn-success btn-xs" target="_blank" style="float: right ;font-size:20px;" ><spen class='glyphicon glyphicon-print'  ></spen> พิมพ์ </a>
<br>
<br>