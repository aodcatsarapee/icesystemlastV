<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_sale'){ ?>

<div class="right_col" role="main">
          <div class="">
         <div class="page-title">
              <div class="title_left">
                <h1><i class="fa fa-shopping-cart fa-1x "> </i> รายการขาย<small></small></h1>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                
                </div>
              </div>
            </div>
            <div class="x_panel">
           
                    <table id="datatable-orders" class="table table-striped ">
                     <thead style="background: #2A3F54; color: #fff;">
                        <tr>
                          <th> รหัส </th>                          
                          <th style=" text-align: center;">ราคารวม </th>
                           <th style=" text-align: center;">สถานะ </th>
                          <th> date </th>
                          <th style=" text-align: center;"> จัดการ </th>
                         
                        </tr>
                      </thead>
  
                      <tbody>
                        
                            <?php foreach ($orders as  $order) { ?>

                            <tr>
                              <td>S<?php echo $order['order_id']; ?></td> 
                                <td style=" text-align: center;"><?php echo $order['total']; ?> บาท </td>
                                <td style=" text-align: center;" >

                                  <?php if($order['sell_status']=='ขายสินค้าเป็นเงินสด'){ ?>

                                  <span class="label label-primary">

                                       <?php echo $order['sell_status']; ?>
                                </span>
                                  
                                <?php }else{ ?>
                                      <span class="label label-success">
                                        <?php echo $order['sell_status']; ?>
                                        </span>
                                 <?php } ?>
                                </td> 
                                <td><?php echo $order['date']; ?></td>
                                <td style=" text-align: center;">
                                  <button type ="button" class="btn btn-sm btn-success show_order_sell"  id="<?php echo $order['order_id']; ?>" ><spen class='glyphicon glyphicon-play-circle'> </spen> เรียกดู</button>



                                </td>
                            </tr>

                            <?php } ?>
                      </tbody>
                    </table>
                   
                </div>
          </div>
        </div>


        
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

