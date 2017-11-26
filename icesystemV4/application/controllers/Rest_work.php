<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Rest_work extends CI_Controller {

			public function __construct()
	{
		parent::__construct();
			//load model
			$this->load->model('Rest_models');

			$this->load->library('Pdf');
			
	}


	public function index()
	{
			$this->load->model('employee_models');
			
			$data1['employee1'] =$this->employee_models->select_data_employee($_SESSION['employee_id']);
			 
			$this->load->view('header',$data1);
	                //Get all data from database
			$data['employee']= $this->Rest_models->rest_show();
			$data['rest_work']= $this->Rest_models->show_rest();
			

			$this->load->view('rest_work/index',$data);
			$this->load->view('footer');
	


	}



	public function select_data_rest()

		{
			$id=$_POST['id'];

			$data['rs']=$this->Rest_models->select_data_rest($id);

			$this->load->view('rest_work/rest_insert/rest_form',$data);
		}


		public function insert_rest()
	{
    $this->session->set_flashdata('check','บันทึกลางานเเล้ว');

			$rest_before =  $_POST['rest_before'];
			$rest_after =  $_POST['rest_after'];
			$employee_id = $_POST['employee_id'];

			$set_rest=$this->Rest_models->set_rest($_POST['employee_id']);
		
		if ($set_rest['employee_id']==null ) {


		$date_in = array(
			'rest_before' => $rest_before ,			
			'rest_after'=> $rest_after ,
			'employee_id'=>$employee_id,
			'date_add'=>date("Y-m-d"),
			
			);

		$this->db->insert("rest_work",$date_in);

		}
		
  }
  


  public function delete_rest(){
    
            $id=$_POST['id'];
            
            $this->db->where("employee_id",$id);
            $this->db->delete('rest_work  ');
    
    $this->session->set_flashdata('check','ลบข้อมูลเเล้ว');
    
        }	
    


// =================
// $rest_before =  $_POST['rest_before'];
// 			$rest_after =  $_POST['rest_after'];
// 			$employee_id = $_POST['employee_id'];



// 		$date_in = array(
// 			'rest_before' => $rest_before ,			
// 			'rest_after'=> $rest_after ,
// 			'employee_id'=>$employee_id,
// 			'date_add'=>date("Y-m-d"),
			
// 			);


// 		$this->db->insert("rest_work",$date_in);
// =================
		

public function print_rest()
    {
 		     
     // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('stock');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage('L','A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค



$id=$_GET['id'];

         $date_start= date($_GET['date_start']);

         $date_end= date($_GET['date_end']);


         $nice_date_start = date('d-m-Y', strtotime($date_start));

         $nice_date_end = date('d-m-Y', strtotime($date_end));
         $this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงานการลางาน<br> ข้อมูลวันที่ย้อนหลัง ตั้งแต่งวันที่ '.Datethai($nice_date_start) .' ถึงวันที่ '.Datethai($nice_date_end).'</th>

                   </tr> ';


  // ถึงวันที่ '.$nice_date_end
   
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <tr>
  

          <th width="15%" style="border: 1px solid #000000;  text-align:center;"><b>รหัสพนักงาน</b></th>
          <th width="30%" style="border: 1px solid #000000;  text-align:center;"><b>ชื่อ</b></th>          
           <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>ลาตั้งแต่วันที่</b></th>
            <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>ถึงวันที่</b></th>
            <th width="15%" style="border: 1px solid #000000;  text-align:center;"><b>วันที่บันทึกข้อมูล</b></th>

      </tr>'; 

        

          $this->load->model('Rest_models');

        $stock=$this->Rest_models->rest_detail($id,$date_start,$date_end);


        foreach ($stock as $s) {

      $date=date_create($s['date_add']);
      $date_format = date_format($date,"d/m/Y");

      
      
        $this->load->helper('Datethai');
      
        $date_add = $s['date_add'];
        
        
      
      
      
           
        # code...
     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['employee_id'].'</td>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['employee_fname']." ".$s['employee_lname'].'</td>
        
          <td style="border: 1px solid #000000;  text-align:center; ">'.Datethai($s['rest_before']).'</td>
          <td style="border: 1px solid #000000;  text-align:center; ">'.Datethai($s['rest_after']).'</td>


          
            <td style="border: 1px solid #000000;  text-align:center; ">'.Datethai($date_add).'</td>

      </tr>'; 

    }
      
  $tbl = $tbl . '</table>';


  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('amount_detail.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
        
     
 

    }



}



?>