<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_produce'){ ?>

<?php require("show/show_stock_detail.php") ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-product-hunt fa-1x "> </i> ผลิตสินค้า<small></small>
        
        <small>advanced tables</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
<table id="datatable-produce_product" class="table table-striped ">

            <thead >
              <tr >
              <tr>
               <th style="text-align: center;">รหัสการผลิตสินค้า</th>              
                 <th style="text-align: center;" >สถานะการผลิตสินค้า</th>
                  <th style ="text-align: center;">จัดการผลิตสินค้า</th>
                 
              </tr>
                 
              </tr>
          </thead>
          <tbody>

                <?php foreach ($rs as $stock) { 

                        if($stock['status']=='กำลังผลิตสินค้า'){

                  ?>
                  
                  <tr>

                      <td  style="text-align: center;">S<?php echo $stock['stock_id']; ?></td>
                     

                      <?php if($stock['status']=='กำลังผลิตสินค้า'){ ?>

                      <td style="text-align: center;" ><span class="label label-warning"><?php echo $stock['status']; ?></span></td>
                      
                      <?php }?>

                      <td  style ="text-align: center " >
                      
                       <button type ="button" class="btn btn-sm btn-primary btn-xs show_stock_detail"  id="<?php echo $stock['stock_id']; ?>"> <spen class='glyphicon glyphicon-play-circle'> </spen> เรียกดู</button>


                       <button type ="button" class="btn btn-sm btn-success btn-xs update_status_stock1"   id="<?php echo $stock['stock_id'] ?>" style='width: px;'  ><spen class='glyphicon glyphicon-plus'> </spen> ผลิตเสร็จเเล้ว</button></button>
                      
                      </td>

                 </tr>



              <?php } } ?>
                 
          </tbody>


    </table>
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

