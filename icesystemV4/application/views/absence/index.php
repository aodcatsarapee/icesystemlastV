<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_account'){ ?>

 <?php require("set_date/form_set.php") ?>

<?php require("modal/modal-select-date.php") ?>

<?php require("modal/modal-alert-select-date.php") ?>

<?php require("modal/modal-alert-error-date.php") ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     <i class="fa fa-product-hunt fa-1x "> </i> บันทึกเวลาการขาดงาน<small></small>
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
              <li><a href="#tab_2" data-toggle="tab">พนักงานขาดงานวันนี้</a></li>
             
              
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="table-responsive">                
                    <table class="table table-hover " id="ab_work" >
                      <thead>
                        <tr>
                       <th  width="10%" style="text-align: center;">รูป</th>
                          <th width="10%" >รหัสพนักงาน</th>
                          <th >ชื่อ</th>
                            <th width="20%" style="text-align: center; ">เเผนก</th>
                          
                          <th width="10%" style="text-align: center;">ขาดงาน</th>
                        
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
                      <?php if ($this->session->flashdata('absencesave') != null) { ?>
                          <div class="alert alert-success">
                              <a href="#" class="close" data-dismiss="alert"
                                 aria-label="close">&times;</a>


                              <p style="font-size: 15pt"> <?php echo $this->session->flashdata('absencesave'); ?> </p>

                          </div>
                      <?php } ?>
                      
                      <?php foreach ($employee as $key => $value) { ?>

                           <?php foreach ($absence as $key => $absences) {?>

                            <?php if($value['employee_id'] == $absences['employee_id'] ){  ?>

                         <?php } } ?>
                  
                        <tr>
                        <td style="text-align: center; "><img src="<?php echo base_url() ?>img/<?php echo $value['employee_image'];  ?>" width="80" height="80" ></td>
                          <td><?php echo $value['employee_id']; ?></td>
                           <td ><?php echo $value['employee_fname']." ".$value['employee_lname']; ?></td>
                           <td style="text-align: center; padding-top: 30px;"><?php echo$value['name']; ?></td>

                            <form action="<?php echo base_url() ?>Absence/insert_absence" method="POST"  >
                           

                           

                           <input type="hidden" name="employee_id" class="form-control" value="<?php echo $value['employee_id']; ?>">
                           <input type="hidden" name="employee_name" class="form-control" value="<?php echo $value['employee_fname']; ?>"> 

                           </td>
                           <td style="text-align: center;padding-top: 30px;">
                             
                              <button type="submit" class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> ขาดงาน</button>

                </form>
                           </td>

                        </tr>
                    
                        <?php  } ?>

                      </tbody>
                    </table>

                       
                  </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
              <table class="table  table-hover" id="ab_work2" >
                 <thead>
                   <tr>
                    <th style="text-align: center">รูป</th>
                     <th style="text-align: center">รหัสพนักงาน</th>
                      <th style="text-align: center">ชื่อพนักงาน</th>
                     <th style="text-align: center">สถานะ</th>
                   </tr>
                 </thead>
                 <tbody>
                 <?php foreach ($absence as $key => $absences) {?>
                   <tr>
                   <td style="text-align: center; "><img src="<?php echo base_url() ?>img/<?php echo $absences['employee_image'];  ?>" width="80" height="80" ></td>
                     <td style="text-align: center"><?php echo $absences['employee_id'] ?></td>
                      <td style="text-align: center"><?php echo $absences['employee_fname']." ".$absences['employee_lname'] ?></td>
                     <td style="text-align: center"> <span class="label label-danger">ขาดงาน</span></td>

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