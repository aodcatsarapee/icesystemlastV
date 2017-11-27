<table  class="table table-bordered">
   <tbody style="border: 1px solid black;">
     <tr>
       
        <td colspan="2">
          <p style="text-align: center; font-weight: bold; font-size: 20px;"> รูปประจำตัว <br><img  src="img/<?php echo $rs['employee_image'];  ?>" width="200" height="230" style="border: 1px solid grey; margin-top: 5px;" >
          </p>
        </td>
     </tr>
      <tr>
          <td width="50%"><p style="text-align: right; font-weight: bold;">ชื่อ นามสกุล  :</p></td>
          <td width="50%"><p><?php echo $rs['employee_fname']?> <?php echo $rs['employee_lname']?></p></td>
      </tr>
      
      <tr>
          <td><p style="text-align: right; font-weight: bold;">เพศ  :</p></td>
          <td>
             <p>   
          <?php 
          if($rs['employee_sex'] == 'male' ){

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
          <td><p><?php echo $rs['employee_country']  ?></p></td>
      </tr>
      <tr>
      <?php 

  $this->load->helper('Datethai');

  $birthday = $rs['employee_birthday'];
 


?>

          <td><p style="text-align: right; font-weight: bold;">เกิดวันที่  :</p></td>
          <td><p><?php echo Datethai($birthday);  

        ?></p></td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">เลขประจำตัวประชาชน  :</p></td>
          <td><p><?php echo $rs['employee_IDcard']  ?></p></td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">ที่พักปัจจุบัน  :</p></td>
          <td><p>   
          <?php 
          if($rs['employee_home_type'] == 'home' ){

            echo "บ้านพักของตนเอง";
        } else if($rs['employee_home_type'] == 'hotel' ){

            echo"หอพัก";
        }else{

               echo"บ้านพักโรงงาน";

        }

        ?> 
        </p></td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">ที่อยู่  :</p></td>
          <td><p><?php echo $rs['employee_address']  ?></p></td>
      </tr>
       <tr>
          <td><p style="text-align: right; font-weight: bold;">ตำบล  :</p></td>
          <td><p><?php echo $rs['employee_sub_area']  ?></p></td>
      </tr> 
      <tr>
          <td><p style="text-align: right; font-weight: bold;">อำเภอ  :</p></td>
          <td><p><?php echo $rs['employee_area']  ?></p></td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">จังหวัด  :</p></td>
          <td><p><?php echo $rs['employee_province']  ?></p></td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">รหัสไปรษณีย์  :</p></td>
          <td><p><?php echo $rs['employee_postal_code']  ?></p></td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">เบอร์โทรที่ติดต่อได้ :</p></td>
          <td><p><?php echo $rs['employee_phone']  ?></p></td>
      </tr>
    
 <?php 
          if($rs['employee_pastpost'] == null ){        ?> 

            <tr>
          <td><p style="text-align: right; font-weight: bold;">เลขที่หนังสือเดินทาง :</p></td>
          <td><p> - </p></td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">เดินทางข้ามาวันที่ :</p></td>
          <td><p> - </p></td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">จากประเทศ :</p></td>
          <td><p> - </p></td>
      </tr>


         <?php 

        }else{
 ?> 
              <tr>
          <td><p style="text-align: right; font-weight: bold;">เลขที่หนังสือเดินทาง :</p></td>
          <td><p><?php echo $rs['employee_pastpost']  ?></p></td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">เดินทางข้ามาวันที่ :</p></td>
          <td><p><?php echo $rs['employee_date_county']  ?></p></td>
      </tr>
      <tr>
          <td><p style="text-align: right; font-weight: bold;">จากประเทศ :</p></td>
          <td><p><?php echo $rs['employee_truecoun']  ?></p></td>
      </tr>
<?php 
        }

        ?> 

      
     
    
   </tbody>

 </table>
  
  <a href="Genpdf/print_employee_data?id=<?php echo $rs['employee_id'] ?>" class="btn btn-success btn-xs" target="_blank" style="float: right ;font-size:20px;" ><spen class='glyphicon glyphicon-print'  ></spen> พิมพ์ </a>
<br><br>