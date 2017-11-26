<?php 

	class produce extends CI_Controller
	{	
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Produce_models');
			
		}

		public function index()
		{
			$this->load->model('employee_models');
			
			$data1['employee1'] =$this->employee_models->select_data_employee($_SESSION['employee_id']);
			 
			$this->load->view('header',$data1);
			
			$data['rs']=$this->Produce_models->product_view();

			$data['rs1']=$this->Produce_models->stock_view();

			$this->load->view('produce/index',$data);


			
			$this->load->view('footer');

		}

        public function insert_data()
        {
            $stock_detail = array(
                "stock_detail_status" => "กำลังดำเนินการ",
                "stock_detail_date" => date("Y-m-d H:i:s"),
            );
            $stock_detail_id = $this->Produce_models->insert_sotck_new($stock_detail);

            foreach ($_POST['product_name'] as $key => $product_name) {

                foreach ($_POST['product_amount'] as $key1 => $product_amount) {

                    foreach ($_POST['product_type'] as $key2 => $product_type) {

                        foreach ($_POST['product_id'] as $key3 => $product_id) {

                            if ($key == $key1 && $key1 == $key2 && $key2 == $key3) {

                                $stock = array(

							        "stock_detail_id" => $stock_detail_id,

                                    "product_id" => $product_id,

                                    "stock_product_name" => $product_name,

                                    "stock_amount" => $product_amount,

                                    "stock_product_type" => $product_type,

                                    "employee_id" => $_SESSION['employee_id'],
                                );

                                $this->db->insert("stock",$stock);
                            }
                        }
                    }
                }
            }

        }

		public function select_data_stock_detail() //เเสดงรายละเอียดการสั่งผลิตสินค้า
		{
			$id = $_POST['id'];

			$data['stock_detail']=$this->Produce_models->select_data_stock_detail($id);



			$this->load->view("produce/show/select_show_stock_detail",$data);
		}


		public function insert_amount()
		{

            $stock_id = $_POST['id'];

            $datasave = date("Y-m-d H:i:s"); 

			$product=$this->Produce_models->select_product_amount();

			$stock=$this->Produce_models->select_stock_detail($stock_id);

          foreach ($product as  $value) {

      			foreach ($stock as  $value1) {

      				if($value['product_id']==$value1['product_id']){

      						if($value1['order_id']==null){

      				$amount = array(

      			          "product_amount" => $value['product_amount'] += $value1['stock_amount'],
      			          "date"           => $datasave,

      					);
      				$this->db->where("product_id",$value['product_id']);
      				$this->db->update("product", $amount);
      				
      				}else{

      					$amount = array(

      			          "product_amount_order" => $value['product_amount_order'] += $value1['stock_amount'],
      			          "date"           => $datasave,

      					);
      				$this->db->where("product_id",$value['product_id']);
      				$this->db->update("product", $amount);


      					$order  = array(

      					'order_detail_status'	 => 'พร้อมขายสินค้า'  , 
      					'order_detail_date' =>  $datasave,

      				);

      				$this->db->where("order_detail_id",$value1['order_id']);
      				$this->db->update("order_detail", $order);




      				 }

      				}

          	# code...


             }
          	# code...
          }

				$ar=array(

					"stock_detail_status"  =>"รับสินค้าเข้าคลังเเล้ว",
					"stock_detail_date" =>$datasave,
					
					);

					

				$this->Produce_models->insert_amount($stock_id,$ar);

		}

		public function delete_amount()
		{
			$id=$_POST['id'];
								
			$this->Produce_models->delete_amount($id);

		}
	}
?>