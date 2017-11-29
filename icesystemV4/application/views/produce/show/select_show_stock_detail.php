
<table class="table table-bordered	">
	 <thead>
              <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th style="text-align: center;">จำนวน</th>
              </tr>
      </thead>
	<tbody>

	<?php foreach ($stock_detail as $key => $value) {?> 
		<tr>
			<td>P<?php echo $value['product_id'] ; ?></td>
			<td><?php echo $value['stock_product_name'] ; ?></td>
			<td style="text-align: center;"><?php echo $value['stock_amount']." ".$value['stock_product_type'] ; ?></td>
		</tr>
	<?php }?>

	
	</tbody>
	
</table>
<a href="Genpdf/stock_detail_id?id=<?php echo $value['stock_detail_id'] ?>" class="btn btn-success btn-xs" target="_blank" style="float: right ;font-size:20px;" ><spen class='glyphicon glyphicon-print'  ></spen> พิมพ์ </a>
<br>
<br>











