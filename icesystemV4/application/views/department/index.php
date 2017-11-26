<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_account'){ ?>

  
  <?php require("insert_department/insert_department.php") ?>
<?php require("select_data_department/edit_department.php") ?>
<?php require("delete_department/delete_department.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <i class="fa fa-user"></i> เเผนก<small></small>
       <button type="button" class="btn btn-success btn-xs insert_amount234" id="insert"  data-toggle="modal" data-target="#modal-insert-department" style="float: right;font-size: 20px;"><spen class="glyphicon glyphicon-plus"> </spen> เพิ่มเเผนก </button>
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
              
                  <table id="datatable-depaartment" class="table">

            <thead >
              <tr  >
                <th style="text-align: center;">รหัสเเผนก</th>
                <th style="text-align: center;">ชื่อเเผนก</th>
                     <th style ="text-align: center;">จัดการ</th>


              </tr>
          </thead>

              <tbody>
              <?php foreach ($department as $d) {    ?>
              <tr>
                    <td style="text-align: center;">D<?php echo $d['department_id']; ?></td>  
                    <td style="text-align: center;"> <?php echo $d['name']; ?></td>
                    <td style="text-align: center;">
                         <button type ="button" class="btn btn-xs btn-warning edit_data_department "   id="<?php echo $d['department_id'] ?>" style='width: px;'><spen class='glyphicon glyphicon-cog'> </spen> เเก้ไข</button>
                      <button type ="button" class="btn btn-xs btn-danger delete_data_department"  id="<?php echo $d['department_id'] ?> " data-toggle="modal" data-target="#delete_data"><spen class='glyphicon glyphicon-trash'> </spen> ลบ</button>
                     </td>
                  
                   
              </tr>
            
            <?php } ?>
               </tbody>
          </table>
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
