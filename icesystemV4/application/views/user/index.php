<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin'){ ?>


<?php require("insert/insert_model.php") ?>

<?php require("edit/edit_model.php") ?>
<?php require("delete/delete.php") ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <i class="fa fa-user-o" aria-hidden="true"></i> ผู้ใช้งาน <small></small>
        <button type="button" class="btn btn-success btn-xs " id="insert"  data-toggle="modal" data-target="#modal-insert-user" style="float: right;font-size: 20px;"><spen class="glyphicon glyphicon-plus"> </spen> ผู้ใช้งาน </button>
        <small></small>
       
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <?php if (isset($error)) : ?>
                <div class="col-md-12">
                          <div class="alert alert-danger" role="alert">
                           <?= $error ?>
                      </div>
                    </div>
          <?php endif; ?>

          <div class="table-responsive">

					<table class="table table-bordered table-hover" id="datatable-users">
            <thead>
              <tr>
                 <th width="25%">ชื่อผู้ใช้</th>
                 <th width="25%">รหัสผ่าน</th>
                 <th width="20%" style="text-align: center;">สิทธ์การเข้าใช้งาน</th>
                 <th width="20%" style="text-align: center;">จัดการ</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach ($user as $value) {
              # code...
             ?>
              <tr>
                  <td><?php echo $value['username'];?></td>
                  <td><?php echo $value['password'];?></td>
                  <td style="text-align: center;" >
                    

                      <?php 

                              if($value['type']=="admin"){

                               echo "ผู้ดูเเลระบบ";

                              } elseif($value['type']=="manager"){

                                echo "ผู้จัดการ";


                              }elseif($value['type']=="emp_store"){

                                 echo "พนักงานคลังสินค้า";

                              }elseif($value['type']=="emp_produce"){

                               echo "พนักงานผลิตสินค้า";

                              }elseif($value['type']=="emp_sale"){

                                echo "พนักงานขายสินค้า";

                              }elseif($value['type']=="emp_account"){

                                  echo "พนักงานบัญชี";

                              }elseif($value['type']=="customers"){

                                 echo "ลูกค้า";
                              }
                       ?>

                  </td>
                  <td style="text-align: center;">
                    <button type ="button" class="btn btn-sm btn-warning btn-xs edit_data_user"   id="<?php echo $value['user_id']; ?>"><spen class='glyphicon glyphicon-cog'></spen> เเก้ไข</button>
                      <button type ="button" class="btn btn-sm btn-danger btn-xs delete_dataa"  id="<?php echo $value['user_id']; ?> " data-toggle="modal" data-target="#delete_data"><spen class='glyphicon glyphicon-trash'> </spen> ลบ</button>
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