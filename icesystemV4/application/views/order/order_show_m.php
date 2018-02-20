<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_sale' || $_SESSION['type']=='manager'){ ?>

    <?php require("show/show_order_detail.php") ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php 	$this->load->helper('Datethai'); 
         $date = Datethai(date('Y-m-d'));			
         $get_mount = explode(" ",$date);
				?> 
      <h1>
      <i class="fa fa-shopping-cart "></i> ยอดสั่งสินค้าของลูกค้าในเดือน <?php echo $get_mount[1] ?>  <small></small>
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
                
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-xs-12" >
          <!-- small box -->
          <div class="small-box bg-aqua" >
            <div class="inner">
              <h3> 
              <?php 

                      if(count($order)!= 0){

                      $total1=0;

                      foreach ($order as $key => $value) {

                                      $total1+=$value['order_detail_total'];

                                    if ($value === end($order)) {
                                        echo number_format($total1,2) ;
                                    }
                                }
                          }else
                          {
                            echo "0";
                          }

                      ?> 
                      <sup style="font-size: 20px"> บาท</sup></h3>

              <p> ยอดชำระเงิน</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-12" >
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>   <?php 
                               echo number_format(count($order));
                      ?><sup style="font-size: 20px"> รายการ</sup></h3>

              <p>ยอดผู้สั่งสินค้า</p>
            </div>
            <div class="icon">
              <i class=" fa fa-user"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
       
       
      </div>
       <!-- ./row -->

          <div class="box">
                      
                      <!-- /.box-header -->
                      <div class="box-body">

          <div class="table-responsive">
            
                    <table id="datatable-debtor" class="table table-striped ">

            <thead >
              <tr >
              <th style="text-align: center;">รหัสสั่งซื้อ</th>
                <th style="text-align: center;">ผู้สั่ง</th>
                 <th style="text-align: center;" >ราคารวม</th>  
                 <th style="text-align: center;" >สถานะ</th>                          
                  <th style ="text-align: center;">จัดการ</th>
                 
              </tr>
          </thead>
          <tbody>


          <?php foreach($order as $key => $value ){   ?>
                    
                  <tr>
                        <td  style="text-align: center;" > <?php echo $value['order_detail_id']; ?> </td>           
                        <td  style="text-align: center;"> <?php echo $value['customer_fname']." ".$value['customer_lname'];?>  </td>
                        <td  style="text-align: center;"> <?php  echo number_format($value['order_detail_total'],2);?> บาท</td>
                        <td style="text-align: center;" > 
                        <span class="label label-success">
                        
                        <?php echo $value['order_detail_status'] ?> 

                       </span>
                       </td>
                        <td  style="text-align: center;"> 
                              
                        <button type="button" class="btn btn-xs btn-primary view_order" id="<?php echo $value['order_detail_id'] ?>"><spen class='glyphicon glyphicon-play-circle'> </spen> เรียกดู</button>
      
                        </td>
                        


                  </tr>
                    
         <?php } ?>
                 
          </tbody>
                    

    </table> 
    </div>       
               <a href="Genpdf/order_detail_d?id=<?php echo 'm' ?>" class="btn btn-success btn-xs"  target="_blank" style="float: right ;font-size:20px;" ><spen class='glyphicon glyphicon-print'></spen> พิมพ์ </a>


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
