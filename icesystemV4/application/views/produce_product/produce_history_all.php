<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_produce' || $_SESSION['type']=='manager'){ ?>

<?php require("show/show_stock_detail.php") ?>

<?php require("modal/modal-select-date.php") ?>

<?php require("modal/modal-alert-select-date.php") ?>

<?php require("modal/modal-alert-error-date.php") ?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-product-hunt fa-1x "> </i> รายงานการผลิตสินค้า<small></small>
         <button type="button" class="btn btn-success btn-xs " id="insert"  data-toggle="modal" data-target="#modal-select-date" style="float: right;font-size: 20px;"><spen class="glyphicon glyphicon-plus"> </spen> เลือกวันที่ </button>
        
       
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">

             <div class="table-responsive">
            <table id="datatable-produce" class="table table-striped ">

           <thead >
              <tr >
               <th style="text-align: center;">รหัสการผลิตสินค้า</th>              
                 <th style="text-align: center;" >สถานะการผลิตสินค้า</th>
                  <th style ="text-align: center;">จัดการผลิตสินค้า</th>
                 
              </tr>
          </thead>
          <tbody>

                <?php 



                  if (count(@$rs)==0) {
                  
                         
             
                    }else{

                foreach ($rs as $stock) { 



                        if($stock['stock_detail_status']=='รับสินค้าเข้าคลังเเล้ว'){

                  ?>
                  
                  <tr>

                      <td  style="text-align: center;">S<?php echo $stock['stock_detail_id']; ?></td>


                      
                      
                      <?php if($stock['stock_detail_status']=='รับสินค้าเข้าคลังเเล้ว'){ ?>

                      <td style="text-align: center;" ><span class="label label-success">ผลิตสินค้าเรียบร้อยเเล้ว</span></td>
                      
                      <?php } ?>
                      <td style ="text-align: center;"><button type ="button" class="btn btn-sm btn-primary btn-xs show_stock_detail"  id="<?php echo $stock['stock_detail_id']; ?>"> <spen class='glyphicon glyphicon-play-circle'> </spen> เรียกดู</button></td>

                 </tr>



              <?php } } } ?>
                 
          </tbody>


    </table>
    </div>

             <a href="<?php echo base_url(); ?>Genpdf/produce_all" class="btn btn-success btn-xs" target="_blank" style="float: right ;font-size:20px;" ><spen class='glyphicon glyphicon-print'></spen> พิมพ์  </a>

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

