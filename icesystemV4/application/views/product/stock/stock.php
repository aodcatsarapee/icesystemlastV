<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_store' || $_SESSION['type']=='manager'){  ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-product-hunt fa-1x "> </i> สินค้าคงเหลือ<small></small>
        
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

             <table id="datatable-product-order" class="table table-striped  ">

            <thead >
              <tr>
            
                <th width="15%">รหัสสินค้า</th>
                <th width="">ชื่อสินค้า</th>
                <th style="text-align: center;">ราคา</th>
                 <th style ="text-align: center;">สินค้าคงเหลือ</th>
                 <th style ="text-align: center;">สินค้าคงเหลือ/สั่งซื้อ</th>
              </tr>
          </thead>

              <tbody>

                <?php foreach ($rs as $stock) { ?>
                

                   <tr>
                     
                      <td  > <?php echo $stock['product_id'] ?></td>

                      <td> <?php echo $stock['product_name'] ?></td>
                       <td style  ="text-align: center;"><?php echo "".$stock['product_price']." บาท"; ?></td>

                    <td style="text-align: center;" >

                       <?php  if($stock['product_amount']=='0'){

                    echo "<p style='color:red;'>".number_format($stock['product_amount'])." ".$stock['product_type']."</p>";

                  }elseif($stock['product_amount']<=$stock['product_alert']){

                    echo "<p style='color:orange;'>".number_format($stock['product_amount'])." ".$stock['product_type']."</p>";
                  
                  }else{
                    echo "<p style='color:blue;'>".number_format($stock['product_amount'])." ".$stock['product_type']."</p>";
                  }

                  ?> 

                  </td>
                  <td style="text-align: center;" width="20%">
                      <?php  if($stock['product_amount_order']=='0'){

                    echo "<p style='color:red;'>".number_format($stock['product_amount_order'])." ".$stock['product_type']."</p>";

                  }else{
                     echo "<p style='color:blue;'>".number_format($stock['product_amount'])." ".$stock['product_type']."</p>";
                  }
                  ?>
                  

                  </td>
                   </tr>


                <?php } ?>   
               

                 
                      </tbody>
                    </table>
                    </div>
                    <a href="<?php echo base_url(); ?>Genpdf/stock" class="btn btn-success btn-xs" target="_blank" style="float: right ;font-size:20px;" ><spen class='glyphicon glyphicon-print'></spen> พิมพ์  </a>
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

