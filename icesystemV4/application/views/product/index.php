<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_store' || $_SESSION['type']=='manager'){ ?>


 <?php require("edit/edit_model.php") ?>

<?php require("insert/insert_model.php") ?>

<?php require("delete_data/delete_data.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-product-hunt fa-1x "> </i> สินค้า <small></small>
         <?php if(@$_SESSION['type']=="manager"){  ?>
        
         <button type="button" class="btn btn-success btn-xs insert_data" id="insert"  data-toggle="modal" data-target="#modal-insert" style="float: right;font-size: 20px;" disabled><spen class="glyphicon glyphicon-plus"> </spen> เพิ่มสินค้า </button>

         <?php }else{ ?>
        <button type="button" class="btn btn-success btn-xs insert_data" id="insert"  data-toggle="modal" data-target="#modal-insert" style="float: right;font-size: 20px;" ><spen class="glyphicon glyphicon-plus"> </spen> เพิ่มสินค้า </button>
        <?php } ?>
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
              
              <div class="table-responsive">
                
              
                    <table id="datatable-product" class="table table-striped table-bordered">

            <thead class="">
              <tr  >
                 <th style="text-align: center;">รูป</th>
                <th>รหัสสินค้า</th>
                <th width="">ชื่อสินค้า</th>
                 <th >รายระเอียด</th>
                 <th style ="text-align: center;">ราคา</th>
                 <th  style ="text-align: center;">จัดการ</th>
                 
              </tr>
          </thead>

              <tbody>
                         <?php
              if (count($rs)==0) {
                  
                 
              }else{

                foreach ($rs as $r) { 
                   
                  ?>
             
                <tr>
                <td style="text-align: center;"><img src="img/<?php echo $r['product_img'];  ?>" width="60" height="60" ></td>
                <td ><p style="margin-top: 15px;"><?php echo "P".$r['product_id'].""; ?></p></td>
                <td width="">
                <p style="margin-top: 15px;"><?php echo "".$r['product_name'].""; ?></p>

                </td>
                <td  width =""><p style="margin-top: 15px;"><?php echo "".$r['product_detail'].""; ?></p></td>
                <td style  ="text-align: center;"><p style="margin-top: 15px;"><?php echo "".number_format($r['product_price'],2)." บาท"; ?></p></td>
                
                  <?php if(@$_SESSION['type']=="manager"){  ?>
                      <td  style ="text-align: center " ><p style="margin-top: 15px;" >

                      <button type ="button" class="btn btn-sm btn-warning btn-xs edit_data  "   id="<?php echo $r['product_id'] ?>" style='width: px;' disabled><spen class='glyphicon glyphicon-cog' ></spen> เเก้ไข</button>
                      <button type ="button" class="btn btn-sm btn-danger btn-xs delete_data"  id="<?php echo $r['product_id'] ?> " data-toggle="modal" data-target="#delete_data" disabled><spen class='glyphicon glyphicon-trash'> </spen> ลบ</button>
                      </p>
                      </td>
                      <?php }else{ ?>

                       <td  style ="text-align: center " ><p style="margin-top: 15px;" >

                      <button type ="button" class="btn btn-sm btn-warning btn-xs edit_data  "   id="<?php echo $r['product_id'] ?>" style='width: px;'><spen class='glyphicon glyphicon-cog' ></spen> เเก้ไข</button>
                      <button type ="button" class="btn btn-sm btn-danger btn-xs delete_data"  id="<?php echo $r['product_id'] ?> " data-toggle="modal" data-target="#delete_data"><spen class='glyphicon glyphicon-trash'> </spen> ลบ</button>
                      </p>
                      </td>


                      <?php  } ?>

              </tr>

              <?php 
                
                }
              }
              ?>
               </tbody>
                          
              </table>
              </div>
              <a href="<?php echo base_url(); ?>Genpdf/index" class="btn btn-success btn-xs" target="_blank" style="float: right ;font-size:20px;" ><spen class='glyphicon glyphicon-print'></spen> พิมพ์ </a>
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

