<table  class="table table-bordered">
   <tbody style="border: 1px solid black;">
     <tr>
       
        <td colspan="2">
          <p style="text-align: center; font-weight: bold; font-size: 20px;"> รูปประจำตัว <br><img  src="img/<?php echo $rs['customer_image'];  ?>" width="200" height="230" style="border: 1px solid grey; margin-top: 5px;" >
          </p>
        </td>
     </tr>
      <tr>
          <td width="50%"><p style="text-align: right; font-weight: bold;">ชื่อ นามสกุล  :</p></td>
          <td width="50%"><p><?php echo $rs['customer_fname']?> <?php echo $rs['customer_lname']?></p></td>
      </tr>
      
      <tr>
          <td><p style="text-align: right; font-weight: bold;">เพศ  :</p></td>
          <td>
             <p>   
          <?php 
          if($rs['customer_sex'] == 'male' ){

            echo "ชาย";
        } else{

            echo"หญิง";
        }

        ?> 
        </p>
          </td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">สัญชาติ  :</p></td>
          <td><p><?php echo $rs['customer_country']  ?></p></td>
      </tr>
      <tr>

      <?php 

  $this->load->helper('Datethai');

  $birthday = $rs['customer_birthday'];
  


?>
          <td><p style="text-align: right; font-weight: bold;">เกิดวันที่  :</p></td>
          <td><p><?php echo Datethai($birthday);  

        ?></p></td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">เลขประจำตัวประชาชน  :</p></td>
          <td><p><?php echo $rs['customer_IDcard']  ?></p></td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">ที่อยู่  :</p></td>
          <td><p><?php echo $rs['customer_address']  ?></p></td>
      </tr>
       <tr>
          <td><p style="text-align: right; font-weight: bold;">ตำบล  :</p></td>
          <td><p><?php echo $rs['customer_sub_area']  ?></p></td>
      </tr> 
      <tr>
          <td><p style="text-align: right; font-weight: bold;">อำเภอ  :</p></td>
          <td><p><?php echo $rs['customer_area']  ?></p></td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">จังหวัด  :</p></td>
          <td><p><?php echo $rs['customer_province']  ?></p></td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">รหัสไปรษณีย์  :</p></td>
          <td><p><?php echo $rs['customer_postal_code']  ?></p></td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">เบอร์โทรที่ติดต่อได้ :</p></td>
          <td><p><?php echo $rs['customer_phone']  ?></p></td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">Email: </p></td>
          <td><p><?php echo $rs['customer_email']  ?></p></td>
      </tr>
    
   </tbody>

 </table>
  
      <a href="Genpdf/print_customter_data?id=<?php echo $rs['customer_id'] ?>" class="btn btn-success btn-xs" target="_blank" style="float: right ;font-size:20px;" ><spen class='glyphicon glyphicon-print'  ></spen> พิมพ์ </a>
     <br>
     <br>
