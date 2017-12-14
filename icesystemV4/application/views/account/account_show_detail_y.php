<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_account' || $_SESSION['type']=='manager'){ ?>

<?php require("insert/insert-account.php") ?>
<?php require("edit/edit_account.php") ?>
<?php require("delete/delete-account.php") ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     <i class="fa fa-money"></i> รายรับ - รายจ่ายเดือนนี้<small></small>
         
      </h1>
      
    </section>

   <!-- Main content -->
   <section class="content">
   <div class="row">
     <div class="col-xs-12">
       <!-- Small boxes (Stat box) -->
   <div class="row">
     <div class="col-lg-3 col-xs-12" >
       <!-- small box -->
       <div class="small-box bg-aqua" >
         <div class="inner">
           <h3> 
           <?php 
           $total_pro=0;
           if(count($accunt)==0){

                 echo "0";
             }else{

               $total1=0;
               
          foreach ($accunt as $key => $value) {

                          $total1+=$value['account_income'];
                          $total_pro+=$value['account_income'];
                          
                          
                        if ($value === end($accunt)) {
                            
                            echo  number_format($total1,2) ;
                        }
                    }
           }
         ?> <sup style="font-size: 20px"> บาท</sup></h3>

 <p> รายรับ</p>
</div>
<div class="icon">
 <i class="fa fa-money"></i>
</div>

</div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-12" >
<!-- small box -->
<div class="small-box bg-yellow" >
<div class="inner">
 <h3>  

         
                                  <?php 
                                    $total_lost=0;
                                  if(count($accunt)==0){

                                        echo "0";
                                    }else{
                                        $total1=0;
                                        
                                  foreach ($accunt as $key => $value) {

                                                  $total1+=$value['account_expenses'];
                                                  $total_lost+=$value['account_expenses'];

                                                if ($value === end($accunt)) {
                                                
                                                    echo number_format($total1,2) ;
                                                }
                                            }
                                    }
                                ?>

                                <sup style="font-size: 20px"> บาท</sup></h3>

                        <p> รายจ่าย</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-money"></i>
                        </div>

                        </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-12" >
                        <!-- small box -->
                        <?php 
                        if($total_pro == 0 && $total_lost == 0 ){

                        ?> 
                        <div class="small-box bg-blue" >     

                        <?php 
                        }else{

                                  
                                        if($total_pro > $total_lost ){
                                          ?>
                                            <div class="small-box bg-blue" >
                              <?php 
                                        }else{
                                          ?>

                                            <div class="small-box bg-red" >
                                      <?php   }

                          }

                            
                                        ?>

                        <div class="inner">
                        <h3>  

                                
                                  <?php 

                                  if(count($accunt)==0){

                                        echo "0";
                                    }else{

                                      $POL = $total_pro - $total_lost;
                                      echo number_format(abs($POL),2);
                                      
                                    }
                                ?>

                                <sup style="font-size: 20px"> บาท</sup></h3>

                        <p> <?php 
                                        if($total_pro == 0 && $total_lost == 0 ){
                                          ?>

                                          กำไร ขาดทุน
                                          
                              <?php 
                                        }else if($total_pro > $total_lost){
                                          ?>
                                                กำไร
                                      <?php   }else{

                                        ?>
                                                ขาดทุน
                                        <?php } 
                                        
                                        ?>
                        
                        </p>
         </div>
         <div class="icon">
           <i class="fa fa-money"></i>
         </div>
       
       </div>
     </div>
     <!-- ./col -->
     <div class="col-lg-3 col-xs-12" >
       <!-- small box -->
       <div class="small-box bg-green">
         <div class="inner">
           <h3>    <?php 
                            echo $accunt_row; ;
                   ?><sup style="font-size: 20px"> รายการ</sup></h3>

           <p>รายรับ - รายจ่าย</p>
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
          
                <table id="datatable-account" class="table table-striped " >
                    <thead >
                    <tr>
                        <th width="20%" style="text-align: center;">รหัสรายรับ-รายจ่าย</th>
                        <th  >รายละเอียด</th>
                        <th  style="text-align: center;">จำนวนเงิน</th>
                        <th  style="text-align: center;">ประเภท</th>
                        <th  style="text-align: center;">จัดการ</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($accunt as $value){ ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $value['account_id']; ?></td>
                                <td><?php echo $value['account_detail']; ?></td>
                               

                                <td style="text-align: center;">
                                    
                                    <?php if($value['account_type'] == "รายรับ" || $value['account_type'] == "รายรับจากการชำระหนี้" || $value['account_type'] == "รายรับจากการขายสินค้า" || $value['account_type'] == "รายรับจากการขายสินค้าจากการสั้งซื้อ"  ){ 

                                     echo number_format($value['account_income'],2); 
                                    
                                     }else{   

                                      echo number_format($value['account_expenses'],2);

                                      } ?>                                    
                                  บาท
                                </td>
                          
             <td style="text-align: center;">
                                
                                   <?php if($value['account_type'] == "รายรับ" || $value['account_type'] == "รายรับจากการชำระหนี้" || $value['account_type'] == "รายรับจากการขายสินค้า" || $value['account_type'] == "รายรับจากการขายสินค้าจากการสั้งซื้อ"){ ?>
                                      <span class="label label-success">
                                        <?php echo $value['account_type'] ?>
                                      </span>
                                    <?php }else{ ?>

                                      <span class="label label-danger">
                                        <?php echo $value['account_type'] ?>
                                      </span>


                                    <?php } ?>
                                </td>


                                <td style="text-align: center;">
                                      <?php if($value['account_type'] =="รายรับ" ||$value['account_type'] =="รายจ่าย" ){ ?>

                                       <?php if($_SESSION['type']=='manager'){ ?>
                                   <button type="button" class="btn btn-warning btn-xs  edit-account" id="<?php echo $value['account_id']; ?>" disabled><spen class='glyphicon glyphicon-cog' ></spen> เเกไข</button>

                                        <button type="button" class="btn btn-danger btn-xs delete-account" id="<?php echo $value['account_id']; ?>" data-toggle="modal" data-target="#delete_data_account" disabled><spen class='glyphicon glyphicon-trash' > </spen> ลบ</button>
        
                                 <?php }else{ ?>
                                   <button type="button" class="btn btn-warning btn-xs  edit-account" id="<?php echo $value['account_id']; ?>" ><spen class='glyphicon glyphicon-cog'></spen> เเกไข</button>

                                        <button type="button" class="btn btn-danger btn-xs delete-account" id="<?php echo $value['account_id']; ?>" data-toggle="modal" data-target="#delete_data_account"><spen class='glyphicon glyphicon-trash'> </spen> ลบ</button>
          
                                    <?php } ?>

                                      <?php }else{ ?>
                                          <button type="button" class="btn btn-warning btn-xs" disabled><spen class='glyphicon glyphicon-cog' ></spen> เเกไข</button>

                                        <button type="button" class="btn btn-danger btn-xs" disabled><spen class='glyphicon glyphicon-trash' > </spen> ลบ</button>
                                      <?php } ?>

                                </td>
                            </tr>
                            <?php } ?>
                    </tbody>


                </table>
                </div>
                    
                      <a href="<?php echo base_url(); ?>Genpdf/Account_y" class="btn btn-success btn-xs" target="_blank" style="float: right ;font-size:20px;" ><spen class='glyphicon glyphicon-print'></spen> พิมพ์  </a>


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

