<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_sale' || $_SESSION['type']=='manager'){ ?>

<?php require("insert_customer/insert_customer.php") ?>
<?php require("select_customer/edit_customer.php") ?>
<?php require("delete_customer/delete_customer.php") ?>
<?php require("detail_customer/show_data.php") ?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user"></i> ลูกค้า<small></small>
      


         <?php if($_SESSION['type']=='manager'){ ?>
                    <button type="button" class="btn btn-success btn-xs insert_data" id="insert"  data-toggle="modal" data-target="#modal-insert-customer" style="float: right;font-size: 20px;" disabled><spen class="glyphicon glyphicon-plus"> </spen> เพิ่มลูกค้า </button>

               

                    <?php }else{ ?>
                        <button type="button" class="btn btn-success btn-xs insert_data" id="insert"  data-toggle="modal" data-target="#modal-insert-customer" style="float: right;font-size: 20px;"><spen class="glyphicon glyphicon-plus"> </spen> เพิ่มลูกค้า </button>


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
                   <table id="datatable-customer" class="table">

            <thead >
              <tr  >
              <th style="text-align: center;">รูป</th>
                <th style="text-align: center;">รหัสลูกค้า</th>
                
                <th style="text-align: center;">ชื่อลูกค้า</th>
                 
                 <th style ="text-align: center;">เบอร์โทร</th>
                 <th style ="text-align: center;">E-mail</th>
                
                     <th style ="text-align: center;">จัดการ</th>


          </tr>
          </thead>

              <tbody>
             
                  <?php  foreach ($customer as $customers) { ?>
                     <tr>
                  <td style="text-align: center;"><img src="img/<?php echo $customers['customer_image'];  ?>" width="80" height="80" ></td>
                  <td style="text-align: center; "><p style="margin-top: 18px;"><?php echo "".$customers['customer_id'] ; ?></p></td>
 

                  <td style="text-align: center;"><p style="margin-top: 18px;"><?php echo $customers['customer_fname']." ".$customers['customer_lname'] ; ?></p></td>
                 
                  
                  
                  <td style="text-align: center;"><p style="margin-top: 18px;"><?php echo $customers['customer_phone'] ; ?></p></td>

                  <td style="text-align: center;"><p style="margin-top: 18px;"><?php echo $customers['customer_email'] ; ?></p></td>

                   <td width="20%" style="text-align: center;"><p style="margin-top: 18px;"><button  type="button" class="btn btn-success btn-xs showdata" id="<?php echo $customers['customer_id']; ?>"  ><spen class='glyphicon glyphicon-play-circle'> </spen> เรียกดู</button>



                    <?php if($_SESSION['type']=='manager'){ ?>


                   <button type="button" class="btn btn-warning btn-xs  edit_customer"  id="<?php echo $customers['customer_id']; ?>"  disabled><spen class='glyphicon glyphicon-cog'></spen> เเก้ไข</button> 

                   <button type="button" class="btn btn-danger delete_customer btn-xs" id="<?php echo $customers['customer_id']; ?>" data-toggle="modal" data-target="#delete_data" disabled><spen class='glyphicon glyphicon-trash' > </spen> ลบ</button></p>

                    <?php }else{ ?>


                   <button type="button" class="btn btn-warning btn-xs  edit_customer"  id="<?php echo $customers['customer_id']; ?>"  ><spen class='glyphicon glyphicon-cog'></spen> เเก้ไข</button> 

                   <button type="button" class="btn btn-danger delete_customer btn-xs" id="<?php echo $customers['customer_id']; ?>" data-toggle="modal" data-target="#delete_data" ><spen class='glyphicon glyphicon-trash'> </spen> ลบ</button></p>

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
                              <li><a href="Genpdf/print_customter_list" target="_blank" ><p style="font-size: 18px; text-align: center;">รายชื่อลูกค้า</p></a></li>
                              <li><a href="<?php echo base_url(); ?>img/ใบสมัครสมาชิก.pdf" target="_blank"><p style="font-size: 18px; text-align: center;">ใบสมัครสมาชิก</p></a></li>
                              
                              
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
