<?php 

	class product extends CI_Controller
	{	
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Product_models');

			
		}

		public function index()
		{
			$this->load->model('employee_models');
			$data1['employee1'] =$this->employee_models->select_data_employee(@$_SESSION['employee_id']);

			$this->load->view('header',$data1);
			
			$data['rs']=$this->Product_models->product_view();

			$this->load->view('product/index',$data);
			
			$this->load->view('footer');
		}

		public function select_data()
		{
			$id=$_POST['id'];

			$data['rs']=$this->Product_models->select_data($id);

			$this->load->view('product/edit/select',$data);

		}

		public function insert_data()
		{
			$name=$_POST['name'];

			$detail=$_POST['detail'];

			$price=$_POST['price'];

			$product_type=$_POST['type'];

			$product_alert=$_POST['amount_alert'];

			$datasave = date("Y-m-d H:i:s"); 

			$this->load->library('upload');

			$config['upload_path'] = 'img/';  // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
		    $config['allowed_types'] = 'gif|jpg|png'; // ปรเเภทไฟล์ 
		    $config['max_size']     = '0';  // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
		    //$config['max_width'] = '1024';  // ความกว้างรูปไม่เกิน
		    //$config['max_height'] = '768'; // ความสูงรูปไม่เกิน
		    //$config['file_name'] = 'mypicture';  // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเพิม
		    $config['encrypt_name'] = TRUE;
		 
		    $this->upload->initialize($config);    // เรียกใช้การตั้งค่า  
		   
		    if($this->upload->do_upload('product_img')==true){

		     $product_img = $this->upload->data('file_name');

		     $ar=array(

					"product_name" =>$name,

					"product_detail" =>$detail,

					"product_price" =>$price,

					"product_img"=>$product_img,

					"product_type" =>$product_type,

					"product_alert"=>$product_alert,

					"date" =>$datasave,
		
				);

		     $this->Product_models->insert_data($ar);


		    }

		}

		public function update_data()
		{
			$id=$_POST['id'];

			$name=$_POST['name'];

			$detail=$_POST['detail'];

			$price=$_POST['price'];

			$product_type=$_POST['type'];

			$product_alert=$_POST['amount_alert'];

			$datasave = date("Y-m-d H:i:s"); 

			if(($_FILES['product_img']['size'])=="0"){

				$ar=array(

                    "product_name" =>$name,

                    "product_detail" =>$detail,

                    "product_price" =>$price,

                    "product_type" =>$product_type,

                    "product_alert"=>$product_alert,

                    "date" =>$datasave,
					);

				$this->Product_models->update_data($id,$ar);

			}else{

				   $product_img_old=$_POST['product_img_old']; //รับค้่รูปเก่ามาเผื่อลบรูปเก่าเมือมีการเพิ่มรูปใหม่
				
					@unlink('img/'.$product_img_old);
				
				$ar=array(
					
					"product_img" =>" ",

					);

				$this->Product_models->update_product_img($id,$ar);

				$this->load->library('upload');

			$config['upload_path'] = 'img/';  // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
		    $config['allowed_types'] = 'gif|jpg|png'; // ปรเเภทไฟล์ 
		    $config['max_size']     = '0';  // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
		    //$config['max_width'] = '1024';  // ความกว้างรูปไม่เกิน
		    //$config['max_height'] = '768'; // ความสูงรูปไม่เกิน
		    //$config['file_name'] = 'mypicture';  // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเพิม
		    $config['encrypt_name'] = TRUE;
		 
		    $this->upload->initialize($config);    // เรียกใช้การตั้งค่า  
		   
		    if($this->upload->do_upload('product_img')==true){

		       $product_img = $this->upload->data('file_name');

                $ar = array(
                    "product_name" => $name,

                    "product_detail" => $detail,

                    "product_price" => $price,

                    "product_type" => $product_type,

                    "product_alert" => $product_alert,

                    "product_img" => $product_img,

                    "date" => $datasave,

                );


		       $this->Product_models->update_product_img($id,$ar);
		    }
				
		}

	}

	
		public function delete_data()
		{

			$id=$_POST['id'];

			$data=$this->Product_models->select_data($id);

			unlink('img/'.$data['product_img']);

			$this->Product_models->delete_data($id);
		 

		}
			// stock product
		public function stock()
		{
			$this->load->model('employee_models');
			
			$data1['employee1'] =$this->employee_models->select_data_employee($_SESSION['employee_id']);
			 
			$this->load->view('header',$data1);
			
			$data['rs']=$this->Product_models->product_view();

			$this->load->view('product/stock/stock',$data);
			
			$this->load->view('footer');

		}

		


		

	}
 ?>


 