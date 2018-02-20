<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_account' || $_SESSION['type']=='manager'){ ?>

<?php require("show/show_debtor_detail.php") ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <?php 	$this->load->helper('Datethai'); 
				 $today = date('Y-m-d');			
				?> 
       <i class="fa fa-money"></i> </i> ลูกหนี้ชำระเงินในวันที่ <?php echo Datethai($today) ?>  <small></small>
        
       
      </h1>
      
    </section>

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
              <h3> <?php 

                      if(count($debtor)!= 0){

                      $total1=0;

                      foreach ($debtor as $key => $value) {

                                      $total1+=$value['price_total'];

                                    if ($value === end($debtor)) {
                                        echo number_format($total1,2) ;
                                    }
                                }
                          }else
                          {
                            echo "0";
                          }

                      ?> <sup style="font-size: 20px"> บาท</sup></h3>

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
                               echo number_format($debtor_num);
                      ?><sup style="font-size: 20px"> รายการ</sup></h3>

              <p>ลูกหนี้ชำระเงิน</p>
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
              <th style="text-align: center;">รหัสลูกหนี้</th>
                <th style="text-align: center;">ชื่อลูกหนี้</th>
                 <th style="text-align: center;" >จำนวนเงิน</th>
                 <th style="text-align: center;" >สถานะการชำระเงิน</th>               
                  <th style ="text-align: center;">จัดการ</th>
                 
              </tr>
          </thead>
          <tbody>
              
                  <?php foreach ($debtor as $debtors) { ?>

                  <tr>
                        <td  style="text-align: center;" >  <?php echo $debtors['debtor_id'] ?></td>           
                        <td  style="text-align: center;"> <?php echo $debtors['customer_fname']." ".$debtors['customer_lname'] ?></td>
                        <td  style="text-align: center;"> <?php echo number_format($debtors['price_total'],2) ?> บาท</td>
                        <td  style="text-align: center;"> 
                            
                               <span class="label label-primary">
                                       
                                     <?php echo $debtors['debtor_status'] ?> 

                             </span>

                             
                        </td>
                
                        <td  style="text-align: center;"> 
                              
                               <button type ="button" class="btn btn-sm btn-success btn-xs show_debtor"  id="<?php echo $debtors['debtor_id']."-".$debtors['sell_id'] ?>; ?>" ><spen class='glyphicon glyphicon-play-circle'> </spen> เรียกดู</button>
      
                        </td>
                        


                  </tr>
                    
                <?php } ?>
                 
          </tbody>
                    

    </table> 
    </div>       
               <a href="Genpdf/debtor_d" class="btn btn-success btn-xs" target="_blank" style="float: right ;font-size:20px;" ><spen class='glyphicon glyphicon-print'></spen> พิมพ์ </a>


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
