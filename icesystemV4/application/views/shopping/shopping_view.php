<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_sale'){ ?>




<?php require("modal/alert_select.php") ?>
<?php require("modal/alert_select_customer.php") ?>
<?php require("modal/alert_cancel.php") ?>
<?php require("modal/alert_received.php") ?>
<?php require("modal/alert_change.php") ?>
 
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-shopping-cart "></i> </i> ขายสินค้า<small></small>
        
        <small></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                
                <div class="row" >
           <div class="col-md-9 col-sm-9" >
                   
         <div class="panel panel-default " >
                    <div class="panel-heading">
                        <h3 class="panel-title">รายการสินค้า</h3>
                    </div>

                    <div class="panel-body">
     
                <div class="table-responsive">
                <table > 
                    <tbody>
                        <tr >
      
            <?php
            // "$products" send from "shopping" controller,its stores all product which available in database. 
            foreach ($products as $product) {
                $id = $product['product_id'];
                $name = $product['product_name'];
                $amount = $product['product_amount'];
                $description = $product['product_detail'];
                $price = $product['product_price'];
                 $type = $product['product_type'];
                ?>
                        <?php                      
                        // Create form and send values in 'shopping/add' function.
                        echo form_open('shopping/add');
                        echo form_hidden('id', $id);
                        echo form_hidden('name', $name);
                        echo form_hidden('price', $price);
                        ?>  
                                       
                      <td >

                          
                                    
                          <?php if($amount==0){?> 
                          <button type='submit' class='btn  btn-danger' style='padding: 0px; border: 0px ;margin-left:10px; ' >

                             <img src="img/<?php echo $product['product_img'];  ?>" width="225" height="165" alt='submit'><br> 

                              <div style="text-align: left; margin-top:10px;" >

                                  <h4 style="text-align: center;"><?php echo $name; ?></h4>
                              

                                   <h4 style="text-align: center;">คงเหลือ : <?php echo "<span >".$amount." ".$type."</span>"; ?></h4>

                                 </div>
                                </button>
                            <?php }else{ ?>
                            <button type='submit' class='btn  btn-success' style='padding: 0px; border: 0px;margin-left:10px; ' >
                               <img src="img/<?php echo $product['product_img'];  ?>" width="225" height="165" alt='submit' ><br> 

                             <div style="text-align: left; margin-top:10px;" >

                                   <h4 style="text-align: center;"><?php echo $name; ?></h4>
                              
                              

                                  <h4 style="text-align: center;">คงเหลือ : <?php echo "<span >".$amount." ".$type."</span>"; ?></h4>

                                 </div>
                              </button>
                            <?php } ?>
                          

                       </td> 
                        <?php
                        echo form_close();
                       
                               $cart = $this->cart->contents(); 

                                foreach ($cart as $item){


                                        if ($id==$item['id']) {
                                            if ($amount >=$item['qty']) {
 
                                            }else{

                                                    $disabled='disabled';
                                                    $text='สินค้าไม่เพียงพอ!';
                                            }
                                        }
                                }

                           } ?>
                    
                         </tr>
                    </tbody>
                </table>
                </div>
                 </div>

                </div>
                    
                    <?php if (@$text) {?>
                      


                        <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4 style="text-align: center;">สินค้าไม่เพียงพอ! </h4>
                        </div>
                
                   <?php $border="1px red solid;"; $table_bg_color="background:#f56954;color:#fff;";}
                   else if(count($this->cart->contents())==0){
                           $border=""; $table_bg_color="";
                   }else{
                          $border="1px green solid;"; $table_bg_color="background:green;color:#fff;"; } ?>

                            <div class="table-responsive">

                     <table id="table"   class="table table-striped tabl-bordered " style="border:<?php echo @$border;  ?>" >
                  <?php
                  // All values of cart store in "$cart". 
                  $cart = $this->cart->contents(); ?>
                    <thead  style="<?php echo $table_bg_color;?>">
                    <tr >
                        <th>ลำดับ</th>
                        <th>ชื่อ</th>
                        <th>ราคา / หน่วย</th>
                        <th>จำนวน</th>
                        <th>ราคารวม</th>
                        <th style="text-align: center;">ลบ</th>
                    </tr>
                    </thead>
                    <?php
                     // Create form and send all values in "shopping/update_cart" function.
                    echo form_open('shopping/update_cart');
                    $grand_total = 0;
                    $i = 1;

                    foreach ($cart as $item):
                                
                        echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                        echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                        echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                        ?>
                        <tr>
                            <td width="5%">
                       <?php echo $i++; ; ?>


                            </td>
                            <td>
                      <?php echo $item['name']; ?>
                            </td>
                            <td >
                                $ <?php echo number_format($item['price'], 2); ?>
                            </td>
                            <td>                 
                            <input type="number" name="<?php echo 'cart[' . $item['id'] . '][qty]', $item['qty'] ?>" min="1" style="width: 40px; text-align: right;"  value="<?php echo $item['qty']; ?>" >

                            </td>
                        <?php $grand_total = $grand_total + $item['subtotal']; ?>
                            <td>
                                $ <?php echo number_format($item['subtotal'], 2) ?>
                            </td>
                            <td  style="text-align: left;" width="5%">
                              
                            <?php 
                            // cancle image.
                            $path = "<button type='button' class='btn btn-sm btn-danger'>ลบ</button>";
                            echo anchor('shopping/remove/' . $item['rowid'], $path); ?>
                            </td>

                         
                     <?php endforeach; ?>

                        
                    </tr>
                     <?php if(empty($cart)){ 

                        for ($i=0; $i < 7 ; $i++) {

                      ?>
                   <tr>
                           <td> <br><br></td>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                    </tr>
                   
    
                    <?php } } ?>
                     
                             
            </table>
            </div>

  <?php    //<a href="genpdf"  target="_blank" class="btn btn-success">view</a> ?>
                    </div>

                    <div class="col-md-3 col-sm-3" > 

                     <div class="panel panel-" style="border: 1px solid #2A3F54;">
                        <div class="panel-heading bg-success" style=" background: #2A3F54; color: #fff;">
                           <h3>
                                <p style="text-align: right;"> ยอดรวม</p>
                                <p align="right">
                                

                                        <?php 

                                            // $grand_total += $vat - $discount;

                                             ;echo number_format($grand_total, 2); //Grand Total ?>
                        
                                </p>
                                <hr />
                                <p style="text-align: right;"> รับเงิน</p>
                                <p align="right">

                                         <?php $received=@$_POST['received']; echo @number_format($received, 2) ?>

                                </p>
                                 <hr>
                                <p style="text-align: right;"> เงินถอน</p>
                                <p align="right">

                                         <?php 

                                                  if($received == 0){

                                                    echo "0.00";

                                                  }else{

                                                     $change=$received-$grand_total;
                                                    echo @number_format($change, 2);
                                                  }

                                          ?>

                                </p>
                                
                                
                            
                            </h3>

                        </div>

                    </div>
              
                       
                       <button type="button" class="btn btn-danger  btn-block " data-toggle="modal" data-target="#alert_cancel" style="" >ยกเลิกรายการขาย</button>
                        
                        <?php //submit button. ?>
                        <button type="submit" class="btn btn-warning btn-block " style="margin-top: 5px;">อัพเดตรายการขาย</button>
                      
                       <?php echo form_close(); ?>
                            
                         
                              <form action="" method="POST" role="form" id="form_total_success">
                             <!-- "Place order button" on click send "billing" controller  -->
                                 <input type="hidden" name="received" id="received" value="<?php echo $received; ?>">

                                 <input type="hidden" name="change" id="change" value="<?php echo @$change; ?>">

                                 <input type="hidden" name="total" id="total" value="<?php echo $grand_total; ?>">

                         <button type="submit" class="btn btn-success  btn-block  " style="margin-top: 5px;"<?php echo @$disabled; ?>>จบการขาย</button>

                          </form>
                        
                        <span style="color: #fff; font-size: 5px;">555</span>

<!-- -------------------------------------------------------รับเงิน------------------------------------------  -->
                           <div class="panel " style="margin-top:; ">
                               <div class="panel-heading" style="color: #fff; background:#2A3F54; text-align: center;">
                                   <h3 class="panel-title">รับเงินจากลูกค้า</h3>
                               </div>

                          <div class="panel-body" style="border: 1px solid;">
                            
                           <form action="" method="POST" role="form" id="test" class="form-horizontal">
                              
                               <div class="form-group">
                                  <div class="col-sm-12">
                            <?php if(empty($grand_total) ||@$disabled=='disabled' ){ ?>    
                                        <fieldset disabled>
                                                 <input type="text"  class="form-control" placeholder="เงินสด เช่น 100 500 1000 บาท">
                                      </fieldset>

                                <?php $disabled='disabled'; }else{ ?>      
                                   <input type="text" class="form-control" name='received'  placeholder="เงินสด เช่น 100 500 1000 บาท" >
                                   
                                   <?php } ?>
                                   </div>
                               </div>
                              
                                <div class="form-group">
                                  <div class="col-sm-12">
                               <button type="submit" class="btn btn-success  btn-block "  <?php echo @$disabled; ?>>คำนวณ</button>
                               </div>
                               </div>
                           </form>

                       
                    
                     </div>
                    </div>
<!-- -------------------------------------------------------รับเงิน------------------------------------------  -->
                     
 <!-- -----------------------------------------------------------ขายสินค้าเป็นเงินเชื่อ--------------------------------------  -->
                       <div class="panel " style="margin-top: 10px; ">
                        
                       <div class="panel-heading" style="color: #fff; background:#2A3F54; text-align: center;">
                                  
                                   <h3 class="panel-title">ขายสินค้าเป็นเงินเชื่อ</h3>
                               
                               </div>

                           <div class="panel-body" style="border: 1px solid;">
                      
                             <form action="" method="POST" role="form" id="form_total_success1" class="form-horizontal">


                             <input type="hidden" name="total" id="total" value="<?php echo $grand_total; ?>">

                              <div class="form-group ">   

                              <div class="col-sm-12">
                              
                              <?php if(@$disabled =='disabled'){ ?>
                                    
                              <select name="select_customer" id="select_customer" class="form-control" <?php echo @$disabled; ?>>
                                <option value="">เลือกลูกค้า</option> 
                              </select>
                              <?php }else{ ?>

                              <select name="select_customer" id="select_customer" class="form-control" >
                                <option value="">เลือกลูกค้า</option>
                                <?php foreach ($customer as $cus) {?>

                                <option value="<?php echo $cus['customer_id']."-".$cus['customer_fname']." ".$cus['customer_lname']; ?>"><?php echo $cus['customer_fname']." ".$cus['customer_lname']; ?></option>

                                   <?php } ?>
                              </select>

                              <?php } ?>
                              </div>
                              </div>  
                            <div class="form-group ">   
                              <div class="col-sm-12">
                         <button type="submit" class="btn btn-success  btn-block " style=""<?php echo @$disabled; ?>>จบการขาย</button>
                            </div>
                              </div>

                               </form>
                            </div>
                        </div>

                   </div>

                   </div>        
                  </div> 
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

