<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_sale' || $_SESSION['type']=='manager'){ ?>


<?php require("show/show_order_detail.php") ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <i class="fa fa-shopping-cart "></i> สินค้าที่ลูกค้าสั้งซื้อ<small></small>
        
      </h1>
      
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
             

             <table id="datatable-order-sell" class="table table-striped  ">

             <thead>
                            <tr>
                                <th class="text-center">รหัสสั่งซื้อสินค้า</th>
                                 <th class="text-center" width="20%">ราคารวม</th>
                                  <th class="text-center">สถานะการสั่งซื้อสินค้า</th>
                                  <th class="text-center">จัดการ</th>
                            </tr>
                        </thead>

              <tbody>

                <?php foreach ($order as $order) {

                    if ($order['order_detail_status']!="ดำเนินการเรียบร้อยเเล้ว") {
                                       
                 ?>
                    <tr>
                	<td style="text-align: center;"><?php echo $order['order_detail_id'] ?></td>
                	<td style="text-align: center;"><?php echo number_format($order['order_detail_total'],2)?> บาท</td>
                	<td style="text-align: center;">
                	<?php if($order['order_detail_status']=="กำลังดำเนินการ"){ ?>
                			
                			<span class="label label-primary"><?php echo $order['order_detail_status'] ?></span>
					
					<?php }else if($order['order_detail_status']=="รับออเดอร์เรียบร้อยเเล้ว"){ ?>

                            <span class="label label-warning	"><?php echo $order['order_detail_status'] ?></span>

					<?php }else if($order['order_detail_status']=="พร้อมขายสินค้า"){ ?>

							 <span class="label label-success	"><?php echo $order['order_detail_status'] ?></span>

						<?php } ?>
                	</td>
                	<td style="text-align: center;">

                       <?php if($order['order_detail_status']=="กำลังดำเนินการ"){ ?>
                			
                		<button type="button" class="btn btn-xs btn-primary view_order" id="<?php echo $order['order_detail_id'] ?>"><spen class='glyphicon glyphicon-play-circle'> </spen> เรียกดู</button>
                		<button type="button" class="btn btn-xs btn-success" disabled> <spen class='glyphicon glyphicon-plus'> </spen> ขายเป็นเงินสด</button>
                    <button type="button" class="btn btn-xs btn-warning " disabled> <spen class='glyphicon glyphicon-plus'> </spen>ขายเป็นเงินเชื่อ</button>
					
					<?php }else if($order['order_detail_status']=="รับออเดอร์เรียบร้อยเเล้ว"){ ?>

					    <button type="button" class="btn btn-xs btn-primary view_order" id="<?php echo $order['order_detail_id'] ?>"> <spen class='glyphicon glyphicon-play-circle'> </spen> เรียกดู</button>
                		<button type="button" class="btn btn-xs btn-success" disabled> <spen class='glyphicon glyphicon-plus'> </spen> ขายเป็นเงินสด</button>

                    <button type="button" class="btn btn-xs btn-warning " disabled> <spen class='glyphicon glyphicon-plus'> </spen> ขายเป็นเงินเชื่อ</button>

                            
					<?php }else if($order['order_detail_status']=="พร้อมขายสินค้า"){ ?>

						<button type="button" class="btn btn-xs btn-primary view_order" id="<?php echo $order['order_detail_id'] ?>" > <spen class='glyphicon glyphicon-play-circle'> </spen> เรียกดู</button>

            <?php if ($_SESSION['type']=='manager') { ?>

                		<button type="button" class="btn btn-xs btn-success check_out_order"  id="<?php echo $order['order_detail_id']; ?>" disabled> <spen class='glyphicon glyphicon-plus'> </spen>ขายเป็นเงินสด</button>
                    <button type="button" class="btn btn-xs btn-warning check_out_order_debtor"  id="<?php echo $order['order_detail_id']; ?>" disabled> <spen class='glyphicon glyphicon-plus'> </spen> ขายเป็นเงินเชื่อ</button>

              <?php }else{ ?>

                    <button type="button" class="btn btn-xs btn-success check_out_order"  id="<?php echo $order['order_detail_id']; ?>" > <spen class='glyphicon glyphicon-plus' > </spen>ขายเป็นเงินสด</button>
                    <button type="button" class="btn btn-xs btn-warning check_out_order_debtor"  id="<?php echo $order['order_detail_id']; ?>" > <spen class='glyphicon glyphicon-plus' > </spen> ขายเป็นเงินเชื่อ</button>

						<?php } }?>

                		

                	</td>

                	</tr>
                <?php }  }?>   
               

                 
                      </tbody>
                    </table>
                    </div>
                    <!-- a href="<?php echo base_url(); ?>Genpdf/stock" class="btn btn-success" target="_blank" style="float: right ;font-size:20px;" ><spen class='glyphicon glyphicon-print'></spen> พิมพ์  </a> -->
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

   <?php }else{

               unset($_SESSION['username']);
               unset($_SESSION['Customer_id']); 
               unset($_SESSION['employee_id']);  
               unset($_SESSION['type']);
                
                redirect('login','refresh');
        }

     }else{

            redirect('login','refresh');
      }
         ?>