<?php 

	class produce_product extends CI_Controller
	{	
		public function __construct()
		{
			parent::__construct();

			$this->load->model('produce_product_models');
			
		}

		public function index()
		{
			$this->load->model('employee_models');
			
			$data1['employee1'] =$this->employee_models->select_data_employee($_SESSION['employee_id']);
			 
			$this->load->view('header',$data1);
			
			$data['rs']=$this->produce_product_models->stock_view();

			$this->load->view('produce_product/produce_product',$data);

			$this->load->view('footer');

		}

		public function update_status()
		{
			$id=$_POST['id'];

			$datasave = date("Y-m-d H:i:s"); 

			$ar=array(

					"stock_detail_status" =>"กำลังผลิตสินค้า",
					"stock_detail_date" => $datasave,
				);
				$this->produce_product_models->update_status($id,$ar);
			
		}
		
	}
?>