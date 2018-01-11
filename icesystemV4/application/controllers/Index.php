<?php 

	class Index extends CI_Controller
	{	
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Product_models');

			$this->load->model('Cart_models');

			$this->load->model('customer_models');

			
			$this->load->library('cart');
		}

		public function index()
		{
            $data['product']=$this->Product_models->product_view();


            $this->load->view('index/header-index');

			$this->load->view('index/index-home-page',$data);

            $this->load->view('index/footer-index');

		}

		
		public function cart()

		{


			if(isset($_POST['add_to_cart'])){

		      echo $keyProID=$_POST['h_pro_id'];
		       if($_POST['h_pro_id']!="" && $_POST['h_pro_name']!="" && $_POST['h_pro_price']!=""){
		        $_SESSION['ses_cart_pro_id'][$keyProID]=$_POST['h_pro_id'];
		        $_SESSION['ses_cart_pro_name'][$keyProID]=$_POST['h_pro_name'];
		        $_SESSION['ses_cart_pro_qty'][$keyProID][]=1;
		        $_SESSION['ses_cart_pro_price'][$keyProID]=$_POST['h_pro_price'];
		        $_SESSION['ses_cart_pro_total_price'][$keyProID]=
		       array_sum($_SESSION['ses_cart_pro_qty'][$keyProID])*$_SESSION['ses_cart_pro_price'][$keyProID];
			    }
			    
			    redirect('index');

			}

			if(isset($_GET['remove']) && $_GET['d_pro_id']!=""){
			    $keyProID=$_GET['d_pro_id'];
			    unset($_SESSION['ses_cart_pro_id'][$keyProID]);
			    unset($_SESSION['ses_cart_pro_name'][$keyProID]);
			    unset($_SESSION['ses_cart_pro_qty'][$keyProID]);
			    unset($_SESSION['ses_cart_pro_price'][$keyProID]);
			    unset($_SESSION['ses_cart_pro_total_price'][$keyProID]);
			    
			    redirect('index/cart');
			    exit;
}
// ส่วนของการอัพเดทจำนวนและราคาของแต่ละรายการ เมื่อเปลี่ยนแปลงจำนวน
				if(isset($_GET['update']) && $_GET['u_pro_id']!="" && $_GET['new_qty']!="" ){
				    $keyProID=$_GET['u_pro_id'];
				    unset($_SESSION['ses_cart_pro_qty'][$keyProID]);
				    for($i=0;$i<$_GET['new_qty'];$i++){
				        $_SESSION['ses_cart_pro_qty'][$keyProID][]=1;
				    }
				    $_SESSION['ses_cart_pro_total_price'][$keyProID]=
				        array_sum($_SESSION['ses_cart_pro_qty'][$keyProID])*$_SESSION['ses_cart_pro_price'][$keyProID];
				
				 redirect('index/cart');

			    exit;
}

			 if(!empty($_SESSION['type'])){

               if( $_SESSION['type']=='customers'){ 

			$data['order']=$this->Cart_models->order_view();

			$data['rs']=$this->Cart_models->select_data_customer_user($_SESSION['customer_id']);
			
			$this->load->view('index/header-cart');

			 $this->load->view('index/cart',$data);

			$this->load->view('index/footer-cart');

	          }else{
	           redirect('Login/sign_out_customer');
	          }


	      }else{

	      		 redirect('Login/sign_out_customer');
	    }
}


		public function checkout(){

			// echo $_POST['order_out_customer_date'];

			$order = array(

				
				 'order_detail_total'       =>array_sum($_SESSION['ses_cart_pro_total_price']),
				 'order_detail_status'		=>'กำลังดำเนินการ',
				 'order_out_customer_date'	=>date("H:i"),
				 'order_detail_date'  =>date("Y-m-d H:i:s"),
			);	

			$ord_id = $this->Cart_models->insert_order($order);




			$i =1 ;
		 	foreach($_SESSION['ses_cart_pro_id'] as $k_pro_id=>$v_pro_id){
                         $qty_data=array_sum($_SESSION['ses_cart_pro_qty'][$k_pro_id]);

         // echo $i++." ".$_SESSION['ses_cart_pro_name'][$k_pro_id]." ".$_SESSION['ses_cart_pro_price'][$k_pro_id]." ".$qty_data."<br>";
		
         		$order = array(
					'customer_id'     =>$_SESSION['customer_id'],
         			'order_detail_id'=>$ord_id,
         			'product_id'=>$_SESSION['ses_cart_pro_id'][$k_pro_id],
         			'order_product_name'=>$_SESSION['ses_cart_pro_name'][$k_pro_id],
         			'order_product_price'=>$_SESSION['ses_cart_pro_price'][$k_pro_id],
         			'order_product_quantity'=>$qty_data,
         			'order_product_total_price'=>$_SESSION['ses_cart_pro_total_price'][$k_pro_id],

         		);

         		$this->db->insert('order',$order);


         	$keyProID=$k_pro_id;
	            unset($_SESSION['ses_cart_pro_id'][$keyProID]);
	            unset($_SESSION['ses_cart_pro_name'][$keyProID]);
	            unset($_SESSION['ses_cart_pro_qty'][$keyProID]);
	            unset($_SESSION['ses_cart_pro_price'][$keyProID]);
	            unset($_SESSION['ses_cart_pro_total_price'][$keyProID]);


		 }

		 redirect('index/cart');

	}

	 public function show_order_detail_customer()
	{
		$this->load->model('Order_models');

		$order_id =$_POST['id'];

		$data['order_detail']=$this->Order_models->show_order_detail($order_id);

		$this->load->view("Index/show/select_order_detail",$data);


	}

	 public function delete_data()
	{
     $order_id =$_POST['id'];

	     $this->db->where('order_detail_id', $order_id);

		$this->db->delete('order');

		$this->db->where('order_detail_id', $order_id);

		$this->db->delete('order_detail');
	}

	public function select_customer()

		{

			$id=$_POST['id'];

			$data['rs']=$this->Cart_models->select_data_customer_user($id);

			$this->load->view('index/select_customer/select_customer',$data);
			
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


				$user  = array('password' =>$_POST['cus_pass']);


			    $this->db->where('customer_id',$cus_id);

			    $this->db->update("users",$user);

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
				"customer_email" => $cus_mail,				
				"customer_image" => $cus_img,
				"customer_datasave"=>$datasave
						
					);

		      $this->customer_models->update_cus_img($cus_id,$ar);

		      $user  = array('password' => $_POST['cus_pass']);


			    $this->db->where('customer_id',$cus_id);

			    $this->db->update("users",$user);
					
		    }

		   }
			
		}

}
 ?>

