<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_account' || $_SESSION['type']=='manager'){ ?>



<?php require("salaly_insert/form_salaly.php")  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-money fa-1x "> </i> เงินเดือน<small></small>
        
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          
            <div class="box-body">
              
                  <!--  <table id="datatable-emp" class="table">

            <thead style="background: #2A3F54; color: #fff;">
              <tr  >
              <th style="text-align: center;">รูป</th>
                <th style="text-align: center;">รหัส</th>
                
                <th style="text-align: center;">ชื่อ</th>
                 
                 <th style ="text-align: center;">เบอร์โทร</th>
                
                     <th style ="text-align: center;">....</th>


              </tr>
          </thead>

              <tbody>
             
                  <?php  foreach ($employee as $employees) { ?>
                     <tr>
                  <td style="text-align: center; "><img src="img/<?php echo $employees['employee_image'];  ?>" width="80" height="80" ></td>
                  <td style="text-align: center; padding-top: 30px;"><?php echo "".$employees['employee_id'] ; ?></td>
 

                  <td style="text-align: center; padding-top: 30px;"><?php echo $employees['employee_fname']." ".$employees['employee_lname'] ; ?></td>
                 
                  
                  
                  <td style="text-align: center;padding-top: 30px;"><?php echo $employees['employee_phone'] ; ?></td>

                

                   <td width="20%" style="text-align: center;padding-top: 30px;"><button  type="button" class="btn btn-success btn-xs inset_salaly" id="<?php echo $employees['employee_id']; ?>"  ><spen class='glyphicon glyphicon-play-circle'> </spen> จ่ายเงินเดือน</button>

           

                    

                    </tr>

                  <?php } ?>
              

               </tbody>

          </table> -->
  
                  
            </div>


            <!-- ================================================================================== -->
            <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">บันทึกจ่ายเงินเดือนพนักงาน</a></li>
              <li><a href="#tab_2" data-toggle="tab">รายชื่อพนักงานที่จ่ายเงินเดือนนี้แล้ว</a></li>
             
              
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="table-responsive">                
                    <table class="table table-hover" id="month_money">
                      <thead>
                        <tr>
                       <th  width="10%" style="text-align: center;">รูป</th>  
                          <th width="10%" style="text-align: center;">รหัสพนักงาน</th>
                          <th  style="">ชื่อพนักงาน</th>
                            <th width="15%" style="text-align: center; ">เเผนก</th>
                          
                          <th width="5%" style="text-align: center;">จ่ายเงิน</th>
                        
                        </tr>
                      </thead>
                     
              <tbody>
                 <?php if ($this->session->flashdata('check') != null) { ?>
                          <div class="alert alert-danger">
                              <a href="#" class="close" data-dismiss="alert"
                                 aria-label="close">&times;</a>


                                  <p style="font-size: 15pt"> <?php echo $this->session->flashdata('check'); ?> </p>

                          </div>
                      <?php } ?>
                      <?php if ($this->session->flashdata('pay') != null) { ?>
                          <div class="alert alert-success">
                              <a href="#" class="close" data-dismiss="alert"
                                 aria-label="close">&times;</a>


                                  <p style="font-size: 15pt"> <?php echo $this->session->flashdata('pay'); ?> </p>

                          </div>
                      <?php } ?>
             
                  <?php  foreach ($employee as $employees) { ?>
                     <tr>
                  <td style="text-align: center; "><img src="img/<?php echo $employees['employee_image'];  ?>" width="80" height="80" ></td>
                  <td style="text-align: center; padding-top: 30px;"><?php echo "E".$employees['employee_id'] ; ?></td>
 

                  <td style="padding-top: 30px;"><?php echo $employees['employee_fname']." ".$employees['employee_lname'] ; ?></td>
                 
                  
                  
                  <td style="text-align: center;padding-top: 30px;"><?php echo $employees['name'] ; ?></td>

                

                   <td width="20%" style="text-align: center;padding-top: 30px;">
                   <?php if( $_SESSION['type']=='manager'){?>
                   <button  type="button" class="btn btn-primary btn-xs inset_salaly" id="<?php echo $employees['employee_id']; ?>"  disabled><spen class='glyphicon glyphicon-plus'> </spen> จ่ายเงินเดือน</button>
                   <?php }else{ ?>
                    <button  type="button" class="btn btn-primary btn-xs inset_salaly" id="<?php echo $employees['employee_id']; ?>"  ><spen class='glyphicon glyphicon-plus'> </spen> จ่ายเงินเดือน</button>
                    <?php } ?>
                     <a href="<?php echo base_url(); ?>Genpdf/print_saraly?id=<?php echo $employees['employee_id'] ?>" class="btn btn-success btn-xs" target="_blank" style="float: right ;"  ><spen class='glyphicon glyphicon-print'></spen> พิมพ์  </a>

 

                    </tr>

                  <?php } ?>
              

               </tbody>

                    </table>

                       
                  </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
              <table class="table  table-hover" id="month_money2">
                 <thead>
                   <tr>
                     <th  width="20%" style="text-align: center;">รูป</th>  
                          <th width="10%" style="text-align: center;">รหัสพนักงาน</th>
                          <th style="">ชื่อพนักงาน</th>
                          <th   style="text-align: center; ">เเผนก</th>
                         <th  style="text-align: center;">ว/ด/ป </th>
                          
                          <th width="5%" style="text-align: center;">จำนวนเงิน</th>
                   </tr>
                 </thead>
                
              <tbody>
             
                  <?php  foreach ($employee2 as $employees2) { ?>
                     <tr>
                  <td style="text-align: center; "><img src="img/<?php echo $employees2['employee_image'];  ?>" width="80" height="80" ></td>
                  <td style="text-align: center; padding-top: 30px;"><?php echo "E".$employees2['employee_id'] ; ?></td>
 

                  <td style=" padding-top: 30px;"><?php echo $employees2['employee_fname']." ".$employees2['employee_lname'] ; ?></td>
                 
                  <?php 

                     $this->load->helper('Datethai');

                      $date_add = $employees2['date_add'];
                     

?>
                  
                  <td style="text-align: center;padding-top: 30px;"><?php echo $employees2['name'] ; ?></td>
                   <td style="text-align: center;padding-top: 30px;"><?php echo Datethai($date_add) ; ?></td>

                

                   <td width="20%" style="text-align: center;padding-top: 30px;">
                    <?php echo $employees2['salaly_month'] ; ?> </td>

           

                    

                    </tr>

                  <?php } ?>
              

               </tbody>

               </table>
              </div>
              <!-- /.tab-pane -->
            

                 


              </div>
              <!-- /.tab-pane -->

              



            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
<!-- ================================================================ -->

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
