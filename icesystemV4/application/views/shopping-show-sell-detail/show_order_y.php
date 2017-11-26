<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_sale' || $_SESSION['type']=='manager'){ ?>


<?php require("show/show_sell_detail.php") ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-shopping-cart "></i> การขายสินค้าปีนี้<small></small>
        
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php 

                          if(count($orders)==0){

                              echo "0";
                          }else{
                      $total1=0;
                      foreach ($orders as $key => $value) {

                                      $total1+=$value['sell_detail_total'];

                                    if ($value === end($orders)) {
                                        echo $total1 ;
                                    }
                                }
                              }

                      ?> <sup style="font-size: 20px"> บาท</sup></h3>

              <p> ยอดขายสินค้า</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>  <?php 
                             echo $cash+$cash_sell;
                      ?><sup style="font-size: 20px"> รายการ</sup></h3>

              <p>ขายสินค้าเป็นเงินสด</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3> <?php 
                             echo $credit+$credit_sell;
                      ?><sup style="font-size: 20px"> รายการ</sup></h3>

              <p>ขายสินค้าเป็นเงินเชื่อ</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php if(count($orders)==0){ echo "0";}else{  echo count($orders);}?><sup style="font-size: 20px"> รายการ</sup></h3></h3>

              <p>ทั้งหมด </p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
      </div>



          <div class="box">
                      
                      <!-- /.box-header -->
                      <div class="box-body">

            <div class="table-responsive">
                    <table id="datatable-orders" class="table table-striped ">
                     <thead >
                        <tr>
                          <th style=" text-align: center;"> รหัสขายสินค้า </th>                          
                          <th style=" text-align: center;">จำนวนเงิน </th>
                           <th style=" text-align: center;">สถานะการขาย </th>
                          <th style=" text-align: center;"> จัดการ </th>
                         
                        </tr>
                      </thead>
  
                      <tbody>
                        
                            <?php foreach ($orders as  $order) { ?>

                            <tr>
                              <td style=" text-align: center;">S<?php echo $order['sell_detail_id']; ?></td> 
                                <td style=" text-align: center;"><?php echo $order['sell_detail_total']; ?> บาท </td>
                                <td style=" text-align: center;" >

                                   <?php if($order['sell_detail_status']=='ขายสินค้าเป็นเงินสด' || $order['sell_detail_status']=='ขายสินค้าเป็นเงินสดจากการสั้งซื้อ'){ ?>

                                  <span class="label label-primary">

                                       <?php echo $order['sell_detail_status']; ?>
                                </span>
                                  
                                <?php }else{ ?>
                                      <span class="label label-success">
                                        <?php echo $order['sell_detail_status']; ?>
                                        </span>
                                 <?php } ?>
                                </td> 
                                
                                <td style=" text-align: center;">
                                  <button type ="button" class="btn btn-sm btn-success btn-xs show_order_sell"  id="<?php echo $order['sell_detail_id']; ?>" ><spen class='glyphicon glyphicon-play-circle'> </spen> เรียกดู</button>



                                </td>
                            </tr>

                            <?php } ?>
                      </tbody>
                    </table>
                    </div>
                      <a href="<?php echo base_url(); ?>Genpdf/show_order_y" class="btn btn-success btn-xs" target="_blank" style="float: right ;font-size:20px;" ><spen class='glyphicon glyphicon-print'></spen> พิมพ์  </a>
          
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
