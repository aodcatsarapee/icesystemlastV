<?php 

	class Customer extends CI_Controller
	{	
		public function __construct()
		{
			parent::__construct();

			$this->load->model('customer_models');
		}


		public function index()
		{
			$this->load->model('employee_models');
			
			$data1['employee1'] =$this->employee_models->select_data_employee($_SESSION['employee_id']);
			 
			$this->load->view('header',$data1);
			
			$data['customer']=$this->customer_models->customer_view();

			$this->load->view('customers/index',$data);
			
			$this->load->view('footer');
		}


			public function insert_data_customer()
		{

			$datasave = date("Y-m-d H:i:s"); 
			$cus_name = $_POST['cus_name'];
			$cus_lname = $_POST['cus_lname'];
			$cus_blood = $_POST['cus_blood'];
			$id_card = $_POST['id_card'];
			$gender = $_POST['gender'];
			$cus_date = $_POST['cus_date'];			
			$cus_adress = $_POST['cus_adress'];
			$cus_sub_area = $_POST['cus_sub_area'];
			$cus_area = $_POST['cus_area'];
			$cus_province = $_POST['cus_province'];
			$cus_post_code = $_POST['cus_post_code'];
			$cus_phone = $_POST['cus_phone'];
			$cus_mail = $_POST['cus_mail'];
			// $cus_id = $_POST['cus_id'];
			$cus_pass= $_POST['cus_pass'];
			
					
			$this->load->library('upload');

			$config['upload_path'] = 'img/';  // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
		    $config['allowed_types'] = 'gif|jpg|png'; // ปรเเภทไฟล์ 
		    $config['max_size']     = '0';  // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
		    //$config['max_width'] = '1024';  // ความกว้างรูปไม่เกิน
		    //$config['max_height'] = '768'; // ความสูงรูปไม่เกิน
		    //$config['file_name'] = 'mypicture';  // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเพิม
		    $config['encrypt_name'] = TRUE;
		 
		    $this->upload->initialize($config);    // เรียกใช้การตั้งค่า  
		   
		    if($this->upload->do_upload('cus_img')==true){

 		$cus_img = $this->upload->data('file_name');

		    
			$ar = array(

						"customer_fname" => $cus_name,
						"customer_lname" => $cus_lname,
						"customer_country" => $cus_blood,
						"customer_IDcard" => $id_card,
						"customer_sex" => $gender,
						"customer_birthday" => $cus_date,						
						"customer_address" => $cus_adress,
						"customer_sub_area" => $cus_sub_area,
						"customer_area" => $cus_area,
						"customer_province" => $cus_province,
						"customer_postal_code" => $cus_post_code,
						"customer_phone" => $cus_phone,						
						"customer_image" => $cus_img,
						"customer_email" => $cus_mail,
						"customer_datasave" =>$datasave,
						
				);

			$id = $this->customer_models->insert_data_customer($ar);

			$user = array(
				"username" =>$id_card,
				"password" =>$cus_pass,
				"user_type"=> "customers",
				"customer_id"=> $id,
				"user_date"=> $datasave,
				);

			$this->db->insert("users",$user);

		}

	}

		public function select_customer()

		{

			$id=$_POST['id'];

			$data['rs']=$this->customer_models->select_data_customer($id);

			$this->load->view('customers/select_customer/select_customer',$data);
			
		}



			public function edit_data_customer()	

		{
			$cus_id =  $_POST['cus_id'];
			$datasave = date("Y-m-d H:i:s"); 
			$cus_name = $_POST['cus_name'];
			$cus_lname = $_POST['cus_lname'];
			$cus_blood = $_POST['cus_blood'];
			$id_card = $_POST['id_card'];
			$gender = $_POST['gender'];
			$cus_date = $_POST['cus_date'];			
			$cus_adress = $_POST['cus_adress'];
			$cus_sub_area = $_POST['cus_sub_area'];
			$cus_area = $_POST['cus_area'];
			$cus_province = $_POST['cus_province'];
			$cus_post_code = $_POST['cus_post_code'];
			$cus_phone = $_POST['cus_phone'];
			$cus_mail = $_POST['cus_mail'];



			if(($_FILES['cus_img']['size'])=="0"){

				$ar = array(

						
						"customer_fname" => $cus_name,
						"customer_lname" => $cus_lname,
						"customer_country" => $cus_blood,
						"customer_IDcard" => $id_card,
						"customer_sex" => $gender,
						"customer_birthday" => $cus_date,						
						"customer_address" => $cus_adress,
						"customer_sub_area" => $cus_sub_area,
						"customer_area" => $cus_area,
						"customer_province" => $cus_province,
						"customer_postal_code" => $cus_post_code,
						"customer_phone" => $cus_phone,						
						"customer_email" => $cus_mail,
						"customer_datasave" =>$datasave,
						
				);
			$this->customer_models->edit_data_customer($cus_id,$ar);

			// $this->db->where("employee_id",$employee_id);
			// $this->db->update('employee',$ar);

			}else{

				   $cus_img_old=$_POST['cus_img_old']; //รับค้่รูปเก่ามาเผื่อลบรูปเก่าเมือมีการเพิ่มรูปใหม่
				
					unlink('img/'.$cus_img_old);
				
				$ar=array(
					
					"customer_image" =>" ",

					);

				$this->customer_models->update_cus_img($cus_id,$ar);
 
			$this->load->library('upload');

			$config['upload_path'] = 'img/';  // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
		    $config['allowed_types'] = 'gif|jpg|png'; // ปรเเภทไฟล์ 
		    $config['max_size']     = '0';  // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
		    //$config['max_width'] = '1024';  // ความกว้างรูปไม่เกิน
		    //$config['max_height'] = '768'; // ความสูงรูปไม่เกิน
		    //$config['file_name'] = 'mypicture';  // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเพิม
		    $config['encrypt_name'] = TRUE;
		 
		    $this->upload->initialize($config);    // เรียกใช้การตั้งค่า  
		   
		    if($this->upload->do_upload('cus_img')==true){

		       $cus_img = $this->upload->data('file_name');

		       $ar=array(
						
						
						"customer_fname" => $cus_name,
						"customer_lname" => $cus_lname,
						"customer_country" => $cus_blood,
						"customer_IDcard" => $id_card,
						"customer_sex" => $gender,
						"customer_birthday" => $cus_date,						
						"customer_address" => $cus_adress,
						"customer_sub_area" => $cus_sub_area,
						"customer_area" => $cus_area,
						"customer_province" => $cus_province,
						"customer_postal_code" => $cus_post_code,
						"customer_phone" => $cus_phone,						
						"customer_image" => $cus_img,
						"customer_email" => $cus_mail,
						"customer_datasave" =>$datasave,
					);

		      $this->customer_models->update_cus_img($cus_id,$ar);
					
		    }

		   }
			
		}

		public function delete_customer(){

			$id=$_POST['id'];

			$data=$this->customer_models->select_data_customer($id);
				
			unlink('img/'.$data['customer_image']);

			$this->db->where("customer_id",$id);
			$this->db->delete('customers');

			$this->db->where("customer_id",$id);
			$this->db->delete('users');

		}	


		public function show_customer()

		{

			$id=$_POST['id'];

			$data['rs']=$this->customer_models->select_data_customer($id);

			$this->load->view('customers/detail_customer/show_select_customer',$data);
			
		}




	}



 ?>