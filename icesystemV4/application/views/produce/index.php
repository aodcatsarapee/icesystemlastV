<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_store'){ ?>

<?php require("insert_produce.php") ?>

<?php require("delete_insert_amount.php") ?>

<?php require("show/show_stock_detail.php") ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-product-hunt fa-1x "> </i> สั่งผลิตสินค้า<small></small>

      <button type="button" class="btn btn-success btn-xs " id="insert"  data-toggle="modal" data-target="#modal-insert-produce" style="float: right;font-size: 20px;"><spen class="glyphicon glyphicon-plus"> </spen> สั่งผลิตสินค้า </button>
        
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
                      <table id="datatable-produce" class="table table-striped ">

            <thead >
              <tr >
              <th style="text-align: center;">รหัสการผลิตสินค้า</th>              
                 <th style="text-align: center;" >สถานะการผลิตสินค้า</th>
                  <th style ="text-align: center;">จัดการผลิตสินค้า</th>
                 
              </tr>
          </thead>
          <tbody>
                <?php foreach ($rs1 as $stock) { 

                        if($stock['stock_detail_status']!='รับสินค้าเข้าคลังเเล้ว'){

                  ?>
                  
                  <tr>

                      <td  style="text-align: center;"><?php echo $stock['stock_detail_id']; ?></td>
                      
                      <?php if($stock['stock_detail_status']=='กำลังดำเนินการ'|| $stock['stock_detail_status']=='กำลังดำเนินการผลิตสินค้าที่สั้งซื้อ' ){ ?>

                      <td style="text-align: center;" ><span class="label label-primary"><?php echo $stock['stock_detail_status']; ?></span></td>
                      
                      <?php }elseif ($stock['stock_detail_status']=='กำลังผลิตสินค้า') { ?>
                        
                      <td style="text-align: center;" ><span class="label label-warning"><?php echo $stock['stock_detail_status']; ?></span></td>


                    <?php }elseif ($stock['stock_detail_status']=='ผลิตสินค้าเรียบร้อยเเล้ว') { ?>
                        
                      <td style="text-align: center;" ><span class="label label-success"><?php echo $stock['stock_detail_status']; ?></span></td>

                    <?php  } ?>


                      <td  style ="text-align: center " >
                      
                      <button type ="button" class="btn btn-sm btn-primary btn-xs show_stock_detail"  id="<?php echo $stock['stock_detail_id']; ?>"> <spen class='glyphicon glyphicon-play-circle'> </spen> เรียกดู</button>

                      <?php if($stock['stock_detail_status']=='ผลิตสินค้าเรียบร้อยเเล้ว'){ ?>
                      

                      <button type ="button" class="btn btn-sm btn-success btn-xs insert_amount"   id="<?php echo $stock['stock_detail_id'] ?>" style='width: px;'  > <spen class="glyphicon glyphicon-plus"> </spen> รับสินค้า</button>
                      <button type ="button" class="btn btn-sm btn-xs btn-danger "  id="<?php echo $stock['stock_detail_id'] ?> " data-toggle="modal" data-target="#delete_data" disabled> <spen class='glyphicon glyphicon-trash'> </spen> ยกเลิก</button>
                      
                  
                    <?php  }elseif($stock['stock_detail_status']=='กำลังผลิตสินค้า'){ ?>
                      
                       <button type ="button" class="btn btn-sm btn-success btn-xs "   id="<?php echo $stock['stock_detail_id'] ?>" style='width: px;' disabled ><spen class="glyphicon glyphicon-plus"> </spen> รับสินค้า</button>
                      <button type ="button" class="btn btn-sm btn-xs btn-danger  "  id="<?php echo $stock['stock_detail_id'] ?> "  disabled ><spen class='glyphicon glyphicon-trash'> </spen> ยกเลิก</button>
              

                      <?php  }else{ ?>
                      
                       <button type ="button" class="btn btn-sm btn-xs btn-success "    style='width: px;' disabled ><spen class="glyphicon glyphicon-plus"> </spen> รับสินค้า</button>
                      <button type ="button" class="btn btn-sm btn-danger btn-xs detete_amount"  id="<?php echo $stock['stock_detail_id'] ?> " data-toggle="modal" data-target="#modal-detele-insert-amount"><spen class='glyphicon glyphicon-trash'> </spen> ยกเลิก</button>
              

                      <?php } ?>


                      </td>

                 </tr>



              <?php } } ?>
                 
          </tbody>


    </table>
    </div>
                    
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

