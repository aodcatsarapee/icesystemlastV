 <!-- cart Section -->
<style type="text/css">
    .text-center
    {
        text-align: center;
    }

    .text-float-right{

        float: right;
    }
    .text-right
    {
        text-align: right;
    }

</style>
<?php require("show/show_order_detail.php") ?>
<?php require("select_customer/edit_customer.php") ?>

<?php require("delete_data.php") ?>
    <section id="cart"  style="padding-bottom: 0px;">
        <div class="container" style="margin-top: 50px;">
        <div id="cart" >                     
        </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>ตะกร้าสินค้า</h2>
                    <hr class="star-primary">
                </div>
            </div>

            <?php if(@$_SESSION['ses_cart_pro_id']!= null){ ?>
            <div class="row">

            <div class="table-responsive">


 <table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%" class="text-center">#</th>
            <th width="10%" class="text-center">รหัสสินค้า</th>
             <th >ชื่อสินค้า</th>
            <th  width="15%" class="text-center">ราคา/หน่วย</th>
            <th width="10%" class="text-center">จำนวน</th>
             <th width="15%" class="text-center" >ราคารวม</th>
            <th width="5%" class="text-center">ลบ</th>
        </tr>
    </thead>
<tbody>
                <?php
                if(count($_SESSION['ses_cart_pro_id'])>0){
                    $i=1;
                    foreach($_SESSION['ses_cart_pro_id'] as $k_pro_id=>$v_pro_id){
                        $qty_data=array_sum($_SESSION['ses_cart_pro_qty'][$k_pro_id]);
                ?>
                <tr>
                    <td class="text-center"><?=$i?></td>
                    <td class="text-center">P<?=$_SESSION['ses_cart_pro_id'][$k_pro_id]?></td>
                    <td ><?=$_SESSION['ses_cart_pro_name'][$k_pro_id]?></td>
                    <td class="text-center"><?=number_format($_SESSION['ses_cart_pro_price'][$k_pro_id])?>.00 บาท</td>
                    <td  class="text-center">
                    <select name="qty[]" onchange="window.location='?u_pro_id=<?=$k_pro_id?>&new_qty='+this.value+'&update'">
                       <?php for($v=1;$v<=999;$v++){?>
                        <option  value="<?=$v?>" <?=($qty_data==$v)?"selected":""?> ><?=$v?></option>
                        <?php } ?>
                    </select>                  
                      </td>
                    <td  class="text-center"><?=number_format($_SESSION['ses_cart_pro_total_price'][$k_pro_id])?>.00  บาท</td>
                    <td class="text-center"><a href="?d_pro_id=<?=$k_pro_id?>&remove" class="btn btn-danger">ลบ</a></td>
                </tr>
                <?php $i++; } } ?>
                <?php
                if(count($_SESSION['ses_cart_pro_total_price'])>0){
                ?>
                <form action="<?php  echo base_url() ?>index/checkout" method="POST">
                <tr>
                    
                  <!-- <td colspan="2" style="text-align: right;" >ต้องการรับสินค้า:</td>
                  <td><input id="order_out_customer_date" type="time" name="order_out_customer_date" value="15:00"> <br>*PM คือช่วงบ่าย AM คือช่วงเช้า</td> -->
                  <!-- <td ><input type="text" name="order_out_customer_date" id="input" class="form-control"  required="required" placeholder="เช่น วันนี้ เวลา 12.00 น"></td> -->

                   <td colspan="4" class="text-center">รวม</td>
                   <td  class="text-center" ><?=count($_SESSION['ses_cart_pro_qty'],1)-count($_SESSION['ses_cart_pro_qty'])?> </td>
                   <td class="text-center"> <?=number_format( array_sum($_SESSION['ses_cart_pro_total_price']))?>.00  บาท</td>
                    <td>
                    <button class="btn btn-success">สั่งชื่อสินค้า</button>
                    </td>
                </tr>
                 </form>

                <?php } ?>
</tbody>
</table>

      

         </div>
            <center><a href="<?php echo base_url() ?>index" class=" btn btn-success ">สั่งซื้อสินค้าต่อ</a></center>
        </div>
        <?php }else{ ?>
 <h3 class="text-center">ไม่มีรายการที่สั่งชื้อ</h3>
        <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="5%" class="text-center">#</th>
            <th width="10%" class="text-center">รหัสสินค้า</th>
             <th >ชื่อสินค้า</th>
            <th  width="15%" class="text-center">ราคา/หน่วย</th>
            <th width="10%" class="text-center">จำนวน</th>
             <th width="15%" class="text-center" >ราคารวม</th>
            <th width="5%" class="text-center">ลบ</th>
        </tr>
    </thead>
<tbody>
</tbody>
<tr>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>

</tr>
<tr>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>

</tr>
<tr>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>

</tr>
<tr>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>

</tr>
</table>
           
            <center><a href="<?php echo base_url() ?>index" class=" btn btn-success ">กลับหน้าเเรก</a></center>
        <?php } ?>
    </section>



  <section  id="order" style="padding-bottom: 0px;" >
        <div class="container" >
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>รายการที่สั่งซื้อ</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 ">
                <?php if(count($order)==0){ ?>

     <h3 class="text-center">ไม่มีออเดอร์ที่สั่งชื้อ</h3>
                 <table class="table table-bordered table-striped ">
    <thead>
        <tr>
                                <th class="text-center">รหัสสั่งซื้อสินค้า</th>
                                 <th class="text-center" width="20%">ราคารวม</th>
                                  <th class="text-center">สถานะการสั่งซื้อสินค้า</th>
                                  <th class="text-center">จัดการ</th>
          </tr>
    </thead>
<tbody>
</tbody>
<tr>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    

</tr>
<tr>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    

</tr>
<tr>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    

</tr>
<tr>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    <td><BR></td>
    

</tr>
</table>

       

                <?php }else{ ?>

                
                    <table class="table table-bordered table-striped" id="datatable-order-customer">
                        <thead>
                            <tr>
                                <th class="text-center">รหัสสั่งซื้อสินค้า</th>
                                 <th class="text-center" width="20%">ราคารวม</th>
                                  <th class="text-center">สถานะการสั่งซื้อสินค้า</th>
                                                            
                                  <th class="text-center">เวลาที่สั่งสินค้า</th>
                                  <th class="text-center">เวลานัดรับ</th>
                                   <th class="text-center">ว/ด/ป</th>  
                                   <th class="text-center">จัดการ</th>
                                     
                            </tr>
                        </thead>
                        <tbody>
                        <?php 	$this->load->helper('Datethai'); ?>
                        <?php foreach ($order as $key => $value) {
                            # code...
                         ?>
                            <tr>
                                <td class="text-center"><?php echo $value['order_detail_id']; ?></td>
                                 <td class="text-center"><?php echo number_format($value['order_detail_total'],2); ?> บาท</td>
                                 <td class="text-center"><?php echo $value['order_detail_status']; ?></td>              
                                  <td><?php echo $value['order_out_customer_date'].' น.' ?></td>

                                 <td width="16%"><?php echo $value['order_out_date'] ?></td>
                                 
                                  <td class="text-center"><?php echo Datethai($value['order_detail_date']); ?></td>              
                                 <td class="text-center">
                                     <button type="button" class="btn btn-xs btn-primary show_order_detail_customer" id="<?php echo $value['order_detail_id']; ?>">เรียกดู</button>
                                      <?php if($value['order_detail_status']=="กำลังดำเนินการ"){ ?>

                                        <button type ="button" class="btn btn-sm btn-danger btn-xs delete_data_order"  id="<?php echo $value['order_detail_id'] ?> " data-toggle="modal" data-target="#delete_data"> ยกเลิก</button>
                                      <?php }else{ ?>
                                        <button type ="button" class="btn btn-sm btn-danger btn-xs " disabled=""> ยกเลิก</button>
                                      <?php }?>
                                 </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                


               <?php } ?>
                </div>
            </div>
        </div>
    </section>

     <section  id="Customter" style="padding-bottom: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>ข้อมูลผู้ใช้</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 ">
                  <table  class="table table-bordered">
   <tbody style="border: 1px solid black;">
     <tr>
       
        <td colspan="2">
          <p style="text-align: center; font-weight: bold; font-size: 20px;"> รูปประจำตัว <br><img  src="<?php echo base_url() ?>img/<?php echo $rs['customer_image'];  ?>" width="200" height="230" style="border: 1px solid grey; margin-top: 5px;" >
          </p>
        </td>
     </tr>
      <tr>
          <td width="50%" style="text-align: right; font-weight: bold;">ชื่อ นามสกุล  :</td>
          <td width="50%" ><?php echo $rs['customer_fname']?> <?php echo $rs['customer_lname']?></td>
      </tr>
      
      <tr>
          <td style="text-align: right; font-weight: bold;">เพศ  :</td>
          <td>
            
          <?php 
          if($rs['customer_sex'] == 'male' ){

            echo "ชาย";
        } else{

            echo"หญิง";
        }

        ?> 
        
       
          </td>
      </tr>
      <tr>
          <td style="text-align: right; font-weight: bold;">สัญชาติ  :</td>
          <td><?php echo $rs['customer_country']  ?></td>
      </tr>
      <tr>
          <td style="text-align: right; font-weight: bold;">เกิดวันที่  :</td>
          <td><?php echo $rs['customer_birthday']  

        ?></td>
      </tr>
      <tr>
          <td style="text-align: right; font-weight: bold;">เลขประจำตัวประชาชน  :</td>
          <td><?php echo $rs['customer_IDcard']  ?></td>
      </tr>
      <tr>
          <td style="text-align: right; font-weight: bold;">ที่อยู่  :</td>
          <td><?php echo $rs['customer_address']  ?></td>
      </tr>
       <tr>
          <td style="text-align: right; font-weight: bold;">ตำบล  :</td>
          <td><?php echo $rs['customer_sub_area']  ?></td>
      </tr> 
      <tr>
          <td style="text-align: right; font-weight: bold;">อำเภอ  :</td>
          <td><?php echo $rs['customer_area']  ?></td>
      </tr>
      <tr>
          <td style="text-align: right; font-weight: bold;">จังหวัด  :</td>
          <td><?php echo $rs['customer_province']  ?></td>
      </tr>
      <tr>
          <td style="text-align: right; font-weight: bold;">รหัสไปรษณีย์  :</td>
          <td><?php echo $rs['customer_postal_code']  ?></td>
      </tr>
      <tr>
          <td style="text-align: right; font-weight: bold;">เบอร์โทรที่ติดต่อได้ :</td>
          <td><?php echo $rs['customer_phone']  ?></td>
      </tr>
      <tr>
          <td style="text-align: right;font-weight: bold;">Email: </td>
          <td><?php echo $rs['customer_email']  ?></td>
      </tr>
      

      <tr>
        <td colspan="2">
          
           <a href="<?php echo base_url() ?>Genpdf/print_customter_data?id=<?php echo $rs['customer_id'] ?>" class="btn btn-success btn-xs" target="_blank" style="float: right ;font-size:20px;" > พิมพ์ </a>

              <button  class="btn btn-warning btn-xs  edit_customer1"  id="<?php echo $rs['customer_id']; ?>"   style="float: right ;font-size:20px; margin-right: 5px;"> เเก้ไข</button> 
        </td>
      </tr>
    
   </tbody>

 </table>
  
     

     
     <br>
     <br>

                </div>
                
        </div>
    </section>
