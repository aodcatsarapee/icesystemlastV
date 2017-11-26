<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_account'){ ?>


<?php require("modal/modal-select-date.php") ?>

<?php require("modal/modal-alert-select-date.php") ?>

<?php require("modal/modal-alert-error-date.php") ?>

<?php require("rest_insert/form_rest.php")  ?>
<?php require("delete_rest/delete.php") ?>





<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     <i class="fa fa-product-hunt fa-1x "> </i> บันทึกการลางาน<small></small>
      </h1>

       <button type="button" class="btn btn-success btn-xs " id="insert"  data-toggle="modal" data-target="#modal-select-date" style="float: right;font-size: 20px;"><spen class="glyphicon glyphicon-plus"> </spen> เลือกวันที่ </button>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- Small boxes (Stat box) -->
      
          <div class="box">
                      
                      <!-- /.box-header -->
                      <div class="box-body">
                                                               
<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">บันทึกพนักงานขาดงาน</a></li>
              <li><a href="#tab_2" data-toggle="tab">รายงานพนักงานขาดงาน</a></li>
             
              
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="table-responsive">                
                    <table class="table table-hover " id="rest_work" >
                      <thead>
                        <tr>
                         <th  width="10%" style="text-align: center;">รูป</th>
                          <th width="10%" style="text-align: center;">รหัสพนักงาน</th>
                          <th  width="" >ชื่อ</th>
                            <th  width="20%" style="text-align: center; ">เเผนก</th>
                          
                          <th width="10%" style="text-align: center;">ลางาน</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                     
                         <?php if ($this->session->flashdata('check') != null) { ?>
                          <div class="alert alert-success">
                              <a href="#" class="close" data-dismiss="alert"
                                 aria-label="close">&times;</a>


                                  <p style="font-size: 15pt"> <?php echo $this->session->flashdata('check'); ?> </p>

                          </div>
                      <?php } ?>
                      
                      <?php foreach ($employee as $key => $value) { ?>
         
                  
                        <tr>
                           <td style="text-align: center; "><img src="<?php echo base_url() ?>img/<?php echo $value['employee_image'];  ?>" width="80" height="80" ></td> 


                          <td style="text-align: center;padding-top: 30px;">E<?php echo $value['employee_id']; ?></td>
                           <td style="padding-top: 30px; "><?php echo $value['employee_fname']." ".$value['employee_lname']; ?></td>
                           <td style="text-align: center; padding-top: 30px;"><?php echo$value['name']; ?></td>

                          
                           </td>
                           <td style="text-align: center;padding-top: 30px;">
                             
                              <button type ="button" class="btn btn-xs btn-primary insert_rest "  id="<?php echo $value['employee_id'] ?>" style='width: px;'><spen class='glyphicon glyphicon-plus'> </spen> ลางาน</button>
             
                           </td>

                        </tr>
                    
                        <?php  } ?>

                      </tbody>
                    </table>                     
                  </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">

                          <!-- ==========================

                          <?php
        
        // $thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
        // $thai_month_arr=array(
        //     "0"=>"",
        //     "1"=>"มกราคม",
        //     "2"=>"กุมภาพันธ์",
        //     "3"=>"มีนาคม",
        //     "4"=>"เมษายน",
        //     "5"=>"พฤษภาคม",
        //     "6"=>"มิถุนายน", 
        //     "7"=>"กรกฎาคม",
        //     "8"=>"สิงหาคม",
        //     "9"=>"กันยายน",
        //     "10"=>"ตุลาคม",
        //     "11"=>"พฤศจิกายน",
        //     "12"=>"ธันวาคม"                 
        // );
        // function thai_date($time){
        //     global $thai_day_arr,$thai_month_arr;
        //     $thai_date_return="วัน".$thai_day_arr[date("w",$time)];
        //     $thai_date_return.= "ที่ ".date("j",$time);
        //     $thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
        //     $thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);
        //     $thai_date_return.= "  ".date("H:i",$time)." น.";
        //     return $thai_date_return;
        // }
        




?>

                          ========================== -->




              <table class="table table-hover" id="rest_work2">
                 <thead>
                   <tr>
                      <th style="text-align: center;">รูป</th> 
                      <th>รหัส</th> 
                      <th>ชื่อ</th>              
                     <th>วันที่ลางาน</th>
                     <th>ลบข้อมูล</th>

                   </tr>
                 </thead>
                 <tbody>
                 <?php foreach ($rest_work as $key => $rest_works) {?>
                   <tr>
                   <?php 

  $this->load->helper('Datethai');

  $rest_before = $rest_works['rest_before'];
  $re_after = $rest_works['rest_after'];


?>
                    <td style="text-align:center; "><img src="<?php echo base_url() ?>img/<?php echo $rest_works['employee_image'];  ?>" width="80" height="80" ></td> 
                     <td><?php echo $rest_works['employee_id'] ?></td>
                     <td><?php echo $rest_works['employee_fname']." ".$rest_works['employee_lname'] ?></td>
                      <td><?php echo "ตั้งเเต่วันที่ ".DateThai($rest_before) ?>  ถึงวันที่ <?php echo DateThai($re_after) ?></td>
                      <td><button type="button" class="btn btn-danger delete_rest btn-xs" id="<?php echo $rest_works['employee_id']; ?>
                      " data-toggle="modal" data-target="#delete_data" ><spen class='glyphicon glyphicon-trash'> </spen> ลบ</button></p></td>
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