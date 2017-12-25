<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Absence extends CI_Controller {

			public function __construct()
	{
		parent::__construct();
			//load model
			$this->load->model('Absence_models');

            $this->load->model('Work_time_models');
            $this->load->model('Rest_models');  
            $this->load->library('Pdf');
			
	}


	public function index()
	{
			$this->load->model('employee_models');
			
			$data1['employee1'] =$this->employee_models->select_data_employee($_SESSION['employee_id']);
			 
			$this->load->view('header',$data1);
	                //Get all data from database
			$data['employee']= $this->Absence_models->ab_show();
			$data['absence']= $this->Absence_models->show_absence();
			
			$this->load->view('absence/index',$data);
			$this->load->view('footer');
	

	}


    public function insert_absence()
    {

        $set_worktime = $this->Work_time_models->set_worktime($_POST['employee_id']);
        $chek_rest = $this->Rest_models->check_rest($_POST['employee_id']);
        $date_day = date('Y-m-d');

        if(strtotime($date_day) >= strtotime($chek_rest['rest_before']) && strtotime($date_day) <= strtotime($chek_rest['rest_after'])){

            $data="ไม่สามารถบันทึกออกงานได้พนักงานชื่อ ".$chek_rest['employee_fname']." ".$chek_rest['employee_lname']." ลางาน";
            $this->session->set_flashdata('check',$data);   

        }else{

        if ($set_worktime['employee_id'] != null) {

            $data = "ไม่สามารถบันทึกได้พนักงานชื่อ " . $set_worktime['employee_fname'] . " " . $set_worktime['employee_lname'] . " มาทำงานเเล้ว";

            $this->session->set_flashdata('check', $data);

        } else {

            $set_absence = $this->Absence_models->set_absence($_POST['employee_id']);
            if ($set_absence['employee_id'] == null) {
                $date_in = array(
                    'employee_id' => $_POST['employee_id'],
                    'date' => date("Y-m-d"),
                );

                $this->db->insert("absence", $date_in);


                $this->session->set_flashdata('absencesave', 'บันทึกการขาดงานเรียบร้อยเเล้ว');

            } else {

                $data = "พนักงานชื่อ " . $set_absence['employee_fname'] . " " . $set_absence['employee_lname'] . " บันทึกขาดงานเเล้ว";

                $this->session->set_flashdata('check', $data);

            }



        }
    }

		redirect('absence');
	}


 public function print_absence()
    {
 		     
     // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('ขาดงาน');
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
        $pdf->AddPage();
         
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
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงานการขาดงาน<br> ข้อมูลวันที่ย้อนหลัง ตั้งแต่งวันที่ '.Datethai($nice_date_start) .' ถึงวันที่ '.Datethai($nice_date_end).'</th>

                   </tr> ';


  // ถึงวันที่ '.$nice_date_end
   
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <tr>
  

          <th width="30%" style="border: 1px solid #000000;  text-align:center;"><b>รหัสพนักงาน</b></th>
          <th width="50%" style="border: 1px solid #000000;  text-align:center;"><b>ชื่อ</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>วันที่</b></th>

      </tr>'; 

        

          $this->load->model('absence_models');

        $stock=$this->absence_models->absence_detail($id,$date_start,$date_end);


        foreach ($stock as $s) {

      $date=date_create($s['date']);
      $date_format = date_format($date,"d/m/Y");
           
        # code...
     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">P'.$s['employee_id'].'</td>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['employee_fname']." ".$s['employee_lname'].'</td>
          <td style="border: 1px solid #000000;  text-align:center; ">'.Datethai($s['date']).'</td>

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
    public function procss_absence(){
       $this->db->join('employee','employee.employee_id = worktime.employee_id','right');
       $worktime=$this->db->get('worktime')->result();
       foreach($worktime as $item){
        $chek_rest = $this->Rest_models->check_rest($item->employee_id);
        $date_day = date('Y-m-d');
        if(strtotime($date_day) >= strtotime($chek_rest['rest_before']) && strtotime($date_day) <= strtotime($chek_rest['rest_after']) ){
            // echo $item->employee_id." ลางาน <br/>";
        }elseif($item->date == date('Y-m-d')){
            // echo $item->employee_id." ".$item->Worktime_time_in." มาทำงาน <br/>";
           }else{
            $set_absence = $this->Absence_models->set_absence($item->employee_id);
            // echo $item->employee_id." ขาดงาน <br/>";
                if ($set_absence['employee_id'] == null) {  
                    $date_in = array(
                        'employee_id' => $item->employee_id,
                        'date' => date("Y-m-d"),
                    );
                    $this->db->insert("absence", $date_in);
                }   
           
           }
       }
       $data['status']=true;
       echo json_encode($data);
    }
}

?>