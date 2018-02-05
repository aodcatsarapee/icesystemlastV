<?php 

	
	class employee extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();

			$this->load->model('employee_models');
			$this->load->model('department_models');
			
		}

		public function index()
		{
			
			$data1['employee1'] =$this->employee_models->select_data_employee(@$_SESSION['employee_id']);
			 
			$this->load->view('header',$data1);
			
			$data['employee']=$this->employee_models->employee_view();

			$data['department']=$this->department_models->department_view();

			$this->load->view('employee/index',$data);
			
			$this->load->view('footer');
		}

		public function insert_data_employee()
		{

			$datasave = date("Y-m-d H:i:s"); 
			$emp_name = $_POST['emp_name'];
			$emp_lname = $_POST['emp_lname'];
			$emp_blood = $_POST['emp_blood'];
			$id_card = $_POST['id_card'];
			$gender = $_POST['gender'];
			$emp_date = $_POST['emp_date'];
			$home = $_POST['home'];
			$emp_adress = $_POST['emp_adress'];
			$emp_sub_area = $_POST['emp_sub_area'];
			$emp_area = $_POST['emp_area'];
			$emp_province = $_POST['emp_province'];
			$emp_post_code = $_POST['emp_post_code'];
			$emp_phone = $_POST['emp_phone'];
			$condition = $_POST['emp_condition'];
			$date_county = $_POST['date_county'];
			$emp_pastpost = $_POST['emp_pastpost'];
			$emp_truecoun = $_POST['emp_truecoun'];
			$department_id = $_POST['department_id'];
		
			
			
$this->load->library('upload');

			$config['upload_path'] = 'img/';  // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
		    $config['allowed_types'] = 'gif|jpg|png'; // ปรเเภทไฟล์ 
		    $config['max_size']     = '0';  // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
		    //$config['max_width'] = '1024';  // ความกว้างรูปไม่เกิน
		    //$config['max_height'] = '768'; // ความสูงรูปไม่เกิน
		    //$config['file_name'] = 'mypicture';  // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเพิม
		    $config['encrypt_name'] = TRUE;
		 
		    $this->upload->initialize($config);    // เรียกใช้การตั้งค่า  
		   
		    if($this->upload->do_upload('emp_img')==true){

 $emp_img = $this->upload->data('file_name');

		    
			$ar = array(

						"employee_fname" => $emp_name,
						"employee_lname" => $emp_lname,
						"employee_country" => $emp_blood,
						"employee_IDcard" => $id_card,
						"employee_sex" => $gender,
						"employee_birthday" => $emp_date,
						"employee_home_type" => $home,
						"employee_address" => $emp_adress,
						"employee_sub_area" => $emp_sub_area,
						"employee_area" => $emp_area,
						"employee_province" => $emp_province,
						"employee_postal_Code" => $emp_post_code,
						"employee_phone" => $emp_phone,
						"employee_status" => $condition,
						"employee_image" => $emp_img,
						"employee_datasave" => $datasave,
						"employee_date_county" => $date_county,
						"employee_pastpost" => $emp_pastpost,
						"employee_truecoun" => $emp_truecoun,
						"department" => $department_id,
						

				);


			$this->employee_models->insert_data_employee($ar);
		}

		}

		public function select_employee()

		{

			$id=$_POST['id'];

			$data['rs']=$this->employee_models->select_data_employee($id);

			$data['department']=$this->department_models->department_view();

			$this->load->view('employee/select_employee/select_employee',$data);
			
		}

		public function edit_data_employee()	

		{
			$employee_id =  $_POST['employee_id'];
			$employee_name = $_POST['emp_name'];
			$emp_lname = $_POST['emp_lname'];
			$emp_blood = $_POST['emp_blood'];
			$id_card = $_POST['id_card'];
			$gender = $_POST['gender'];
			$emp_date = $_POST['emp_date'];
			$home = $_POST['home'];
			$emp_adress = $_POST['emp_adress'];
			$emp_sub_area = $_POST['emp_sub_area'];
			$emp_area = $_POST['emp_area'];
			$emp_province = $_POST['emp_province'];
			$emp_post_code = $_POST['emp_post_code'];
			$emp_phone = $_POST['emp_phone'];
			$emp_condition = $_POST['emp_condition'];
			$department_id = $_POST['department_id'];
			$date_county = $_POST['date_county'];
			$emp_pastpost = $_POST['emp_pastpost'];
			$emp_truecoun = $_POST['emp_truecoun'];


			if(($_FILES['emp_img']['size'])=="0"){

				$ar = array(

						"employee_fname" => $employee_name,
						"employee_lname" => $emp_lname,
						"employee_country" => $emp_blood,
						"employee_IDcard" => $id_card,
						"employee_sex" => $gender,
						"employee_birthday" => $emp_date,
						"employee_home_type" => $home,
						"employee_address" => $emp_adress,
						"employee_sub_area" => $emp_sub_area,
						"employee_area" => $emp_area,
						"employee_province" => $emp_province,
						"employee_postal_Code" => $emp_post_code,
						"employee_phone" => $emp_phone,
						"employee_status" => $emp_condition,
						"department" => $department_id,
						"employee_date_county" => $date_county,
						"employee_pastpost" => $emp_pastpost,
						"employee_truecoun" => $emp_truecoun,
						
				);
			$this->employee_models->edit_data_employee($employee_id,$ar);

			// $this->db->where("employee_id",$employee_id);
			// $this->db->update('employee',$ar);

			}else{

				   $emp_img_old=$_POST['emp_img_old']; //รับค้่รูปเก่ามาเผื่อลบรูปเก่าเมือมีการเพิ่มรูปใหม่
				
					@unlink('img/'.$emp_img_old);
				
				$ar=array(
					
					"employee_image" =>" ",

					);

				$this->employee_models->update_emp_img($employee_id,$ar);
 
			$this->load->library('upload');

			$config['upload_path'] = 'img/';  // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
		    $config['allowed_types'] = 'gif|jpg|png'; // ปรเเภทไฟล์ 
		    $config['max_size']     = '0';  // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
		    //$config['max_width'] = '1024';  // ความกว้างรูปไม่เกิน
		    //$config['max_height'] = '768'; // ความสูงรูปไม่เกิน
		    //$config['file_name'] = 'mypicture';  // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเพิม
		    $config['encrypt_name'] = TRUE;
		 
		    $this->upload->initialize($config);    // เรียกใช้การตั้งค่า  
		   
		    if($this->upload->do_upload('emp_img')==true){

		       $emp_img = $this->upload->data('file_name');

		       $ar=array(
						
				"employee_fname" => $employee_name,
				"employee_lname" => $emp_lname,
				"employee_country" => $emp_blood,
				"employee_IDcard" => $id_card,
				"employee_sex" => $gender,
				"employee_birthday" => $emp_date,
				"employee_home_type" => $home,
				"employee_address" => $emp_adress,
				"employee_sub_area" => $emp_sub_area,
				"employee_area" => $emp_area,
				"employee_province" => $emp_province,
				"employee_postal_Code" => $emp_post_code,
				"employee_phone" => $emp_phone,
				"employee_status" => $emp_condition,
				"department" => $department_id,
				"employee_date_county" => $date_county,
				"employee_pastpost" => $emp_pastpost,
				"employee_truecoun" => $emp_truecoun,
				"employee_image" => $emp_img,

					);


		      $this->employee_models->update_emp_img($employee_id,$ar);
					
		    }


		   }

			
		}



		public function show_employee()

		{

			$id=$_POST['id'];

			$data['rs']=$this->employee_models->select_data_employee($id);

			$this->load->view('employee/detail_employee/show_select_employee',$data);
			
		}
		public function delete_employee(){

			$id=$_POST['id'];

			$data=$this->employee_models->select_data_employee($id);
				
			@unlink('img/'.$data['employee_image']);
				
				$this->db->where("employee_id",$id);
				$this->db->delete('employee');

		}
		
		
		public function testCoe(){

			//load library
		$this->load->library('Zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		
		for($i = 20; $i <= 24; $i++){
			$barcode = '5656549563131646646797';
			$imageResource = Zend_Barcode::factory('code128', 'image', array('text'=>$barcode , 'barHeight' => 300 ), array())->draw();
			imagepng($imageResource, 'img/barcode'.$i.'.png');
		}
		
		}


		public function print_card() {
			$id = $_GET['id'];
			
			
				$this->load->library('Pdf');
				$pdf = $this->pdf->loadPDFA5L();
				$pdf->AddPage();
				$pdf->SetTitle('ใบสมัครการเเข่งขัน', 'isUTF8');
				$page = 1;
				// setmargin left top right
				$pdf->SetMargins(10, 10, 10);
				// add font
				$pdf->AddFont('THSarabun', '', 'THSarabun.php');
				$pdf->AddFont('THSarabun', 'B', 'THSarabun Bold.php');
				// head
			
				
				//ข้อควาวม
				$pdf->SetFont('THSarabun', 'B', 25);
				$pdf->SetY(10);
				$pdf->SetX(3);
				$pdf->SetFillColor(222, 222, 222);
				$pdf->Cell(200, 10, iconv('UTF-8', 'cp874', 'บัตรประจำตัวพนักงาน'), 0, 0, 'C');

				$pdf->SetFont('THSarabun', 'B', 16);
				$pdf->SetY(18);
				$pdf->SetX(3);
				$pdf->SetFillColor(222, 222, 222);
				$pdf->Cell(200, 10, iconv('UTF-8', 'cp874', 'ห้างหุ้นส่วนจำกัดโรงน้ำแข็งทวีชัย '), 0, 0, 'C');

				$pdf->SetFont('THSarabun', 'B', 14);
				$pdf->SetY(20);
				$pdf->SetX(3);
				$pdf->SetFillColor(222, 222, 222);
				$pdf->Cell(200, 10, iconv('UTF-8', 'cp874', '______________________________________________________________________________________ '), 0, 0, 'C');
				
				
				$result = $this->employee_models->select_data_employee($id);

				$row = $result;
				//รูป
				// if ($row->player_photo != "") {
				// 	$photo = $row->player_photo;
				// } else {
				// 	$photo = "avatar.png";
				// }
				// $pdf->Image(base_url() . 'assets/uploads/player/' . $photo, 20, 55, 24, 0, '', '', '');
				//ประวัติ
				$pdf->SetFont('THSarabun', 'B', 18);
				$pdf->SetY(30); // ตำเเหน่งเเถว
				$pdf->SetX(22); // col
				
				$pdf->Cell(138, 8, iconv('UTF-8', 'cp874', 'ตำแหน่ง : '), '', 0, 'L');

				$pdf->SetFont('THSarabun', 'B', 18);
				$pdf->SetY(30); // ตำเเหน่งเเถว
				$pdf->SetX(40); // col
				$pdf->Cell(138, 8, iconv('UTF-8', 'cp874', $row['name']), '', 0, 'L');
	
				$pdf->SetFont('THSarabun', 'B', 18);
				$pdf->SetY(40); // ตำเเหน่งเเถว
				$pdf->SetX(22); // col
				$pdf->Cell(138, 8, iconv('UTF-8', 'cp874', 'เลขประจำตัวประชาชน : '), '', 0, 'L');
					
				
				$pdf->SetFont('THSarabun', 'B', 18);
				$pdf->SetY(40); // ตำเเหน่งเเถว
				$pdf->SetX(66); // col
				$pdf->Cell(138, 8, iconv('UTF-8', 'cp874', $row['employee_IDcard']), '', 0, 'L');
			
				$pdf->SetFont('THSarabun', 'B', 18);
				$pdf->SetY(40); // ตำเเหน่งเเถว
				$pdf->SetX(110); // col
				$pdf->Cell(138, 8, iconv('UTF-8', 'cp874', 'สัญชาติ: '), '', 0, 'L');
				
				$pdf->SetFont('THSarabun', 'B', 18);
				$pdf->SetY(40); // ตำเเหน่งเเถว
				$pdf->SetX(126); // col
				$pdf->Cell(138, 8, iconv('UTF-8', 'cp874',  $row['employee_country'] ), '', 0, 'L');

				$photo = $row['employee_image'];
			
				$pdf->Image(base_url() . 'img/' . $photo, 145, 30, 60, 80, '', '', '');	
				
				$pdf->SetFont('THSarabun', 'B', 18);
				$pdf->SetY(50); // ตำเเหน่งเเถว
				$pdf->SetX(22); // col
				$pdf->Cell(138, 8, iconv('UTF-8', 'cp874',  'ชื่อ - สกุล : ' ), '', 0, 'L');

				if($row['employee_sex'] == 'male' ){
					 $gender = "นาย";
				} else{
		
					$gender = "น.ส.";
				}

				$pdf->SetFont('THSarabun', 'B', 18);
				$pdf->SetY(50); // ตำเเหน่งเเถว
				$pdf->SetX(43); // col
				$pdf->Cell(138, 8, iconv('UTF-8', 'cp874',  $gender.' '.$row['employee_fname'].' '.$row['employee_lname'] ), '', 0, 'L');
				
				
				$pdf->SetFont('THSarabun', 'B', 18);
				$pdf->SetY(60); // ตำเเหน่งเเถว
				$pdf->SetX(22); // col
				$pdf->Cell(138, 8, iconv('UTF-8', 'cp874', 'วันเกิด : ' ), '', 0, 'L');

				$birthday = $row['employee_birthday'];
				$this->load->helper('Datethai');
				 
				$pdf->SetFont('THSarabun', 'B', 18);
				$pdf->SetY(60); // ตำเเหน่งเเถว
				$pdf->SetX(37); // col
				$pdf->Cell(138, 8, iconv('UTF-8', 'cp874', Datethai($birthday) ), '', 0, 'L');

				$pdf->SetFont('THSarabun', 'B', 18);
				$pdf->SetY(60); // ตำเเหน่งเเถว
				$pdf->SetX(85); // col
				$pdf->Cell(138, 8, iconv('UTF-8', 'cp874', 'วันออกบัตร : ' ), '', 0, 'L');

				$date_card = date("Y-m-d");

				$pdf->SetFont('THSarabun', 'B', 18);
				$pdf->SetY(60); // ตำเเหน่งเเถว
				$pdf->SetX(109); // col
				$pdf->Cell(138, 8, iconv('UTF-8', 'cp874', Datethai($date_card) ), '', 0, 'L');

				$this->load->library('Zend');
				//load in folder Zend
				$this->zend->load('Zend/Barcode');
				//generate barcode
				
				
					$barcode = $row['employee_id'];
					$imageResource = Zend_Barcode::factory('code128', 'image', array('text'=>$barcode , 'barHeight' => 100 ), array())->draw();
					imagepng($imageResource,'img/'.$barcode.'.png');
			
					$pdf->Image(base_url() . 'img/' . $barcode.'.png', 10, 82, 135, 30, '', '', '');	
				

				$pdf->Output();
		}




	}
	