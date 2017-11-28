 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <i class="fa fa-user"></i> Profile<small></small>
       
        <small>advanced tables</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <div class="box-body">
             <div class="table-responsive">
              
             <!-- Main content -->
    <section class="content">
    
          <div class="row">
            <div class="col-md-3">
    
          <!-- Profile Image -->
          <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url()?>img/<?php echo $employee1['employee_image'];  ?>" alt="User profile picture">

            <h3 class="profile-username text-center"><?php echo $employee1['employee_fname'];?>  <?php echo $employee1['employee_lname'];?></h3>

            <p class="text-muted text-center">
            <?php 

                              if($_SESSION['type']=="admin"){

                               echo "ผู้ดูเเลระบบ";

                              } elseif($_SESSION['type']=="manager"){

                                echo "ผู้จัดการ";


                              }elseif($_SESSION['type']=="emp_store"){

                                 echo "พนักงานคลังสินค้า";

                              }elseif($_SESSION['type']=="emp_produce"){

                               echo "พนักงานผลิตสินค้า";

                              }elseif($_SESSION['type']=="emp_sale"){

                                echo "พนักงานขายสินค้า";

                              }elseif($_SESSION['type']=="emp_account"){

                                  echo "พนักงานบัญชี";

                              }elseif($_SESSION['type']=="customers"){

                                 echo "ลูกค้า";
                              }
                       ?>
            
            
            
            
            </p>

           
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->




          </div>
          <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#profile" data-toggle="tab">ข้อมูลผู้ใช้</a></li>           
              <li><a href="#settings" data-toggle="tab">แก้ไข</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="profile">
                <!-- Post -->
                <div class="tab-pane active" id="user_result">
                        <div class="form-horizontal" style="margin-top: 12px;">
                            <div class="form-group" style="margin-bottom: 10px;">
                                <label class="col-sm-4 control-label">ชื่อ - สกุล : </label>
                                <div class="col-sm-8">
                                    <label style="font-weight: normal" class="control-label"> <?php echo $employee1['employee_fname'];?>  &nbsp; <?php echo $employee1['employee_lname'];?>   &nbsp;</label>
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom: 10px;">
                                <label class="col-sm-4 control-label">ตำแหน่ง : </label>
                                <div class="col-sm-8">
                                    <label style="font-weight: normal" class="control-label">  
                                    
                                    <?php 

                              if($_SESSION['type']=="admin"){

                               echo "ผู้ดูเเลระบบ";

                              } elseif($_SESSION['type']=="manager"){

                                echo "ผู้จัดการ";


                              }elseif($_SESSION['type']=="emp_store"){

                                 echo "พนักงานคลังสินค้า";

                              }elseif($_SESSION['type']=="emp_produce"){

                               echo "พนักงานผลิตสินค้า";

                              }elseif($_SESSION['type']=="emp_sale"){

                                echo "พนักงานขายสินค้า";

                              }elseif($_SESSION['type']=="emp_account"){

                                  echo "พนักงานบัญชี";

                              }elseif($_SESSION['type']=="customers"){

                                 echo "ลูกค้า";
                              }
                       ?>                                             
                                     
                                      &nbsp;</label>
                                </div>
                            </div>
                            
                            <div class="form-group" style="margin-bottom: 10px;">
                                <label class="col-sm-4 control-label">อีเมล์ : </label>
                                <div class="col-sm-8">
                                    <label style="font-weight: normal" class="control-label">   &nbsp; <?php 
                                    
                                              if($employee1['employee_email'] == null){

                                                    echo "- ";

                                              }else{

                                                echo $employee1['employee_email'];

                                              }
                                                                        
                                    ?>  &nbsp;</label>
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom: 10px;">
                                <label class="col-sm-4 control-label">โทรศัพท์ : </label>
                                <div class="col-sm-8">
                                    <label style="font-weight: normal" class="control-label">   
                                                                        <?php 
                                    
                                             if($employee1['employee_phone'] == null){
                                      
                                                                 echo "- ";
                                      
                                               }else{
                                                     echo $employee1['employee_phone'];
                                                    }
                                     
                                    ?>
                                    
                                     &nbsp;</label>
                                </div>
                            </div>                           
                      
                            </div>
                        </div>
               
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->         

              <div class="tab-pane" id="settings">
              <form id="edit_form_user" name="edit_form_user" autocomplete="off" class="form-horizontal" method="post"  method="post" enctype="multipart/form-data">
              <input name="employee_id" type="hidden" value="<?php echo $employee['employee_id'] ; ?>">
              <input name="user_id" type="hidden" value="<?php echo $employee['user_id'] ; ?>">


              <div class="form-group">
                  <label class="col-sm-4 control-label">User name : <span class="text-danger">*</span></label>
                  <div class="col-sm-6">
                      <input name="username" type="text" value="<?php echo $employee['username']; ?>" class="form-control" readonly="">
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-4 control-label">ชื่อ : <span class="text-danger">*</span></label>
                  <div class="col-sm-6">
                      <input name="fname" id="fname" type="text" value="<?php echo $employee1['employee_fname'];?>" class="form-control" >
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-4 control-label">สกุล : <span class="text-danger">*</span></label>
                  <div class="col-sm-6">
                      <input name="lname" id="lname" type="text" value="<?php echo $employee1['employee_lname'];?>" class="form-control" required >
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-4 control-label">ตำแหน่ง : <span class="text-danger">*</span></label>
                  <div class="col-sm-6">
                  <input name="username" type="text" value="<?php 
                                    if($_SESSION['type']=="admin"){
                                      
                                                                     echo "ผู้ดูเเลระบบ";
                                      
                                                                    } elseif($_SESSION['type']=="manager"){
                                      
                                                                      echo "ผู้จัดการ";
                                      
                                      
                                                                    }elseif($_SESSION['type']=="emp_store"){
                                      
                                                                       echo "พนักงานคลังสินค้า";
                                      
                                                                    }elseif($_SESSION['type']=="emp_produce"){
                                      
                                                                     echo "พนักงานผลิตสินค้า";
                                      
                                                                    }elseif($_SESSION['type']=="emp_sale"){
                                      
                                                                      echo "พนักงานขายสินค้า";
                                      
                                                                    }elseif($_SESSION['type']=="emp_account"){
                                      
                                                                        echo "พนักงานบัญชี";
                                      
                                                                    }elseif($_SESSION['type']=="customers"){
                                      
                                                                       echo "ลูกค้า";
                                                                    }?>"
                                                                     class="form-control" readonly="">
                                                             </div>
                                                   </div>                            
              <div class="form-group">
                  <label class="col-sm-4 control-label">เบอร์โทรศัพท์ : <span class="text-danger">*</span></label>
                  <div class="col-sm-6">
                      <input name="phone" id="phone" type="text" value="<?php echo $employee1['employee_phone'];?>" class="form-control" >
                  </div>
              </div>
              
              <div class="form-group">
                  <label class="col-sm-4 control-label">E-mail : <span class="text-danger">*</span></label>
                  <div class="col-sm-6">
                      <input name="email" name="email" type="email" value="<?php echo $employee1['employee_email'];?>" class="form-control" >
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-4 control-label">รหัสผู้ใช้งาน : <span class="text-danger">*</span></label>
                  <div class="col-sm-6">
                      <input name="password" type="text" id="password" value="<?php echo $employee['password'];;?>" class="form-control" >
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-4 control-label">ยืนยันรหัสผู้ใช้งาน : <span class="text-danger">*</span></label>
                  <div class="col-sm-6">
                      <input name="cpassword" type="password" id="cpassword" value="<?php echo $employee['password'];;?>" class="form-control" >
                  </div>
              </div>
              

              <hr />
              <div class="form-group">
                  <div class="col-md-12 text-center" style="margin-bottom: 10px;">
                  
                      <button type="submit" class="btn btn-primary btn-sm" id="insert" data-toggle="tooltip" data-original-title="บันทึก"><i class="fa fa-save"></i>&nbsp;บันทึก</button>                                    
                  </div>
   
          </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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

