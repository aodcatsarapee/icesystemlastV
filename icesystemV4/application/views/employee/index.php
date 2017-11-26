<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_account' || $_SESSION['type']=='manager'){ ?>

<?php require("insert_employee/insert_employee.php") ?>
<?php require("select_employee/edit_employee.php") ?>
<?php require("delete_employee/delete.php") ?>
<?php require("detail_employee/show_data.php") ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <i class="fa fa-user"></i> พนักงาน<small></small>
          <?php if($_SESSION['type']=='manager'){ ?>

                     <button type="button" class="btn btn-success btn-xs insert_data" id="insert"  data-toggle="modal" data-target="#modal-insert-employee" style="float: right;font-size: 20px;" disabled><spen class="glyphicon glyphicon-plus"> </spen> เพิ่มพนักงาน </button>


               

                    <?php }else{ ?>
                         <button type="button" class="btn btn-success btn-xs insert_data" id="insert"  data-toggle="modal" data-target="#modal-insert-employee" style="float: right;font-size: 20px;" ><spen class="glyphicon glyphicon-plus"> </spen> เพิ่มพนักงาน </button>


                    <?php } ?>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          
            <div class="box-body">
             <div class="table-responsive">
              
                   <table id="datatable-emp" class="table">

            <thead >
              <tr  >
              <th style="text-align: center;">รูป</th>
                <th style="text-align: center;">รหัส</th>
                
                <th style="text-align: center;">ชื่อ</th>
                 
                 <th style ="text-align: center;">เบอร์โทร</th>
                 <th style ="text-align: center;">เเผนก</th>
                     <th style ="text-align: center;">....</th>


              </tr>
          </thead>

              <tbody>
             
                  <?php  foreach ($employee as $employees) { ?>
                     <tr>
                  <td style="text-align: center; "><img src="img/<?php echo $employees['image'];  ?>" width="80" height="80" ></td>
                  <td style="text-align: center; padding-top: 30px;"><?php echo "E".$employees['employee_id'] ; ?></td>
 

                  <td style="text-align: center; padding-top: 30px;"><?php echo $employees['fname']." ".$employees['lname'] ; ?></td>
                 
                  
                  
                  <td style="text-align: center;padding-top: 30px;"><?php echo $employees['phone'] ; ?></td>

                  <td style="text-align: center;padding-top: 30px;"><?php echo $employees['name'] ; ?></td>

                   <td width="20%" style="text-align: center;padding-top: 30px;">

                   <button  type="button" class="btn btn-success btn-xs showdata" id="<?php echo $employees['employee_id']; ?>"  ><spen class='glyphicon glyphicon-play-circle'> </spen> ดูข้อมูล</button>


                    <?php if($_SESSION['type']=='manager'){ ?>

                   <button type="button" class="btn btn-warning btn-xs edit_employee"  id="<?php echo $employees['employee_id']; ?>"  disabled> <spen class='glyphicon glyphicon-cog'> </spen> เเก้ไข</button> 



                   <button type="button" class="btn btn-danger btn-xs delete_employee" id="<?php echo $employees['employee_id']; ?>" data-toggle="modal" data-target="#delete_data" disabled><spen class='glyphicon glyphicon-trash'> </spen> ลบ</button>


                     <?php }else{ ?>

                        <button type="button" class="btn btn-warning btn-xs edit_employee"  id="<?php echo $employees['employee_id']; ?>"  > <spen class='glyphicon glyphicon-cog'> </spen> เเก้ไข</button> 



                   <button type="button" class="btn btn-danger btn-xs delete_employee" id="<?php echo $employees['employee_id']; ?>" data-toggle="modal" data-target="#delete_data" ><spen class='glyphicon glyphicon-trash'> </spen> ลบ</button>
                      <?php } ?>

                   </td>

                    

                    </tr>

                  <?php } ?>
              

               </tbody>
          </table>
          </div>
               <div class="dropdown" style="float: right ;margin-right: 60px; ">
                            <button class="btn btn-success  btn-xs dropdown-toggle" type="button" data-toggle="dropdown"><spen class='glyphicon glyphicon-print' style="font-size:20px;"> </spen> <spen style="font-size:20px;">พิมพ์</spen>
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="Genpdf/print_employee_list" target="_blank" ><p style="font-size: 18px; text-align: center;">รายชื่พนักงาน</p></a></li>
                               <li><a href="<?php echo base_url(); ?>img/ใบสมัครงาน.pdf" target="_blank" ><p style="font-size: 18px; text-align: center;">ใบสมัครงาน</p></a></li>
                              
                              
                            </ul>
                          </div>
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
