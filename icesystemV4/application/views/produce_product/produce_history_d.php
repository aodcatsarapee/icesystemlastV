<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_produce' || $_SESSION['type']=='manager'){ ?>

<?php require("show/show_stock_detail.php") ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <?php 	$this->load->helper('Datethai'); 
         $date = Datethai(date('Y-m-d'));			
         $get_mount = explode(" ",$date);
				?> 
     <i class="fa fa-product-hunt fa-1x "> </i> การผลิตสินค้าเดือน <?php echo $get_mount[1] ?><small></small>
        
        
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

                <?php foreach ($rs as $stock) { 

                        if($stock['stock_detail_status']=='รับสินค้าเข้าคลังเเล้ว'){

                  ?>
                  
                  <tr>

                      <td  style="text-align: center;"><?php echo $stock['stock_detail_id']; ?></td>


                      
                      
                      <?php if($stock['stock_detail_status']=='รับสินค้าเข้าคลังเเล้ว'){ ?>

                      <td style="text-align: center;" ><span class="label label-success">ผลิตสินค้าเรียบร้อยเเล้ว</span></td>
                      
                      <?php } ?>
                      <td style ="text-align: center;"><button type ="button" class="btn btn-sm btn-primary btn-xs show_stock_detail"  id="<?php echo $stock['stock_detail_id']; ?>"> <spen class='glyphicon glyphicon-play-circle'> </spen> เรียกดู</button></td>

                 </tr>



              <?php } } ?>
                 
          </tbody>


    </table>
    </div>
             <a href="<?php echo base_url(); ?>Genpdf/produce_d" class="btn btn-success btn-xs" target="_blank" style="float: right ;font-size:20px;" ><spen class='glyphicon glyphicon-print'></spen> พิมพ์  </a>
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
                
                unset($_SESSION['type']);

                redirect('login','refresh');

        }

     }else{

            redirect('login','refresh');
      }
         ?>

