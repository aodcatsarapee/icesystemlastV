<?php 
class Salaly_models extends CI_Model{

	public function salaly_show()
      {
       $this->db->select('employee.*,department.*');
      
      $this->db->from('employee');
      $this->db->join('department', 'employee.department = department.department_id', 'left'); 
     
      
      $this->db->order_by('employee.employee_id', 'ASC');
      
      $sql=$this->db->get();
      return $sql->result_array();
      }



      public function select_salaly()
    {
    $this->db->select('salary_month.*,employee.*,department.*');
      
      $this->db->from('salary_month');

      $this->db->join('employee', 'salary_month.employee_id = employee.employee_id', 'left');

      $this->db->join('department', 'employee.department = department.department_id', 'left'); 

      $this->db->where('MONTH(date_add)',date('m'));
      
      $this->db->where('YEAR(date_add)',date('Y'));

         
      $sql=$this->db->get();
      return $sql->result_array();
    }



       public function select_data_salaly($id)
    {
    $this->db->select('employee.*,department.*');
      
      $this->db->from('employee');

      $this->db->join('department', 'employee.department = department.department_id', 'left'); 


      // $this->db->select('employee.*,worktime.*');
      
      // $this->db->from('employee');

      // $this->db->join('worktime', 'employee.worktime = worktime.Employee_id', 'left'); 

      $this->db->where('employee_id',$id);

      $sql=$this->db->get();

      if ($sql->num_rows() > 0) {
        
        return $sql->row_array();
      }
      else
      {
        return $sql->row_array();
      }
    }



    public function show_work($id)
      {
       $this->db->select('*');
      
      $this->db->from('worktime');
       
      $this->db->where('MONTH(date)',date('m'));
      $this->db->where('YEAR(date)',date('Y'));
      $this->db->where('Employee_id',$id);
      
      $sql=$this->db->get();
      return $sql->num_rows();
      }



      public function show_absence($id)
      {
       $this->db->select('*');
      
      $this->db->from('absence');
       
      $this->db->where('MONTH(date)',date('m'));
      $this->db->where('YEAR(date)',date('Y'));
      $this->db->where('employee_id',$id);
      
      $sql=$this->db->get();
      return $sql->num_rows();
      }


       public function show_salaly_total($id)
      {
       $this->db->select('*');
      
      $this->db->from('salary_month');
       
       $this->db->where('employee_id',$id);
      
      $sql=$this->db->get();
      return $sql->row_array();
      }



       public function set_salaly($employee_id)
      {
       $this->db->select('*');
      
      $this->db->from('salary_month');

       $this->db->join('employee', 'salary_month.employee_id = employee.employee_id', 'left'); 

      $this->db->where('salary_month.employee_id',$employee_id);
      
    
      
      $this->db->where('MONTH(date_add)',date('m'));
      
      $this->db->where('YEAR(date_add)',date('Y'));
      
      $sql=$this->db->get();
      return $sql->row_array();
      }



       public function show_rest($id)
      {
       $this->db->select('*');
      
      $this->db->from('rest_work');
      $this->db->where('MONTH(date_add)',date('m'));
      
      $this->db->where('YEAR(date_add)',date('Y'));
       
      $this->db->where('employee_id',$id);
      $sql=$this->db->get();

      return $sql->row_array();
      }
      public function print_saraly()
    {
 
//         // สร้าง object สำหรับใช้สร้าง pdf 
//         $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
//         // กำหนดรายละเอียดของ pdf
//         $pdf->SetCreator(PDF_CREATOR);
//         $pdf->SetAuthor('Nicola Asuni');
//         $pdf->SetTitle('sell_detail');
//         $pdf->SetSubject('TCPDF Tutorial');
//         $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
//         // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
//         $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
//         $pdf->setFooterData(array(0,64,0), array(0,64,128));

//         $pdf->setPrintHeader(false);
//         $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
//         // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
//         $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//         $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
//         // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
//         $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
//         // กำหนด margins
//         $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//         $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//         $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
//         // กำหนดการแบ่งหน้าอัตโนมัติ
//         $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
//         // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
//         $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
//         // ---------------------------------------------------------
         
//         // set default font subsetting mode
//         $pdf->setFontSubsetting(true);
         
//         // กำหนดฟอนท์ 
//         // ฟอนท์ freeserif รองรับภาษาไทย
//         $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
//         // เพิ่มหน้า pdf
//         // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
//        $pdf->AddPage('L', 'A4');
         
//         // กำหนดเงาของข้อความ 
//         $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// // กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
        


       $id = $_GET['id'];

        

          $emp = $this->Salaly_models->set_salaly($id);

        


           //  $date=date_create($emp['date_add']);

           // $date_format = date_format($date,"d/m/Y");
  
  
  // -----------------------------------------------------------------------------
  

// $tbl = '<table width="100%" border="1" cellpadding="10">
//     <tbody>
//         <tr >
//             <td colspan="4" style="font-size: 20pt; text-align: center;">ใบสลิปเงินเดือน</td>
//         </tr>
//         <tr>
//             <th width="13%"  style="font-size: 15pt; ">รหัสพนักงาน</th>
//              <td width="50%" style="font-size: 15pt; ">'.$id .'</td>
//               <th width="12%" style="font-size: 15pt;">จ่ายวันที่</th>
//               <td style="font-size: 12pt; "></td>
//         </tr>
//          <tr>
//             <th width="13%"  style="font-size: 15pt; ">ชื่อพนักงาน</th>
//              <td width="50%" style="font-size: 15pt; ">สรศักดิ์ ต้นเกณฑ์</td>
//               <th width="12%" style="font-size: 15pt;">ประจำเดือน</th>
//               <td style="font-size: 12pt; ">10</td>
//         </tr>
//         <tr >
//             <td colspan="4" style="font-size: 15pt; text-align: center;">ข้อมูลเงินเดือน</td>
//         </tr>

//     </tbody>
// </table>
// <table width="100%" border="1"  >
//                <tbody>
//                    <tr>
//                        <th width="16.67%" style="font-size: 15pt; ">มาทำงาน </th>
//                         <td width="16.67%" style="font-size: 15pt; " >20 วัน</td>
//                          <th width="16.67%"  style="font-size: 15pt; ">ขาดงาน </th>
//                         <td width="16.67%" style="font-size: 15pt; ">2 วัน</td>
//                          <th width="16.67%" style="font-size: 15pt; " >ลางาน </th>
//                         <td width="16.67%" style="font-size: 15pt; ">2 วัน</td>
//                    </tr>
//                     <tr>
//                        <th  colspan="4" style="text-align: center; font-size: 15pt;">เงินเดือน </th>
//                         <td colspan="2" style="text-align: center; font-size: 15pt;"  >10000.00 บาท</td>  
//                    </tr>
//                    <tr>
//                        <th  colspan="6" style="text-align: right; font-size: 15pt;"><p style="margin-top: 100px;">
//                         <br> <br> <br><br>ลงชื่อผู้รับเงิน....................................................<br>วันที่..................../.........................../......................</p></th>
                        
//                    </tr>
//                </tbody>
//            </table>';



//   $pdf->writeHTML($tbl, true, false, false, false, '');


//     // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
//    // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// // write some JavaScript code
// $js = <<<EOD

// EOD;

// // force print dialog
// $js .= 'print(true);';

// // set javascript
// $pdf->IncludeJS($js);

// // ---------------------------------------------------------

// //Close and output PDF document
// $pdf->Output('stock.pdf', 'I');

// //============================================================+
// // END OF FILE
// //============================================================+
 
    }





			}



 


