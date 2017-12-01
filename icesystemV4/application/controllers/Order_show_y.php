<?php 

	class Order_show_y extends CI_Controller
	{	
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Order_models');

			$this->load->model('Produce_models');

			$this->load->model('billing_model');
			$this->load->library('Pdf');

		}

		public function index()
		{
			$this->load->model('employee_models');
			$data1['employee1'] =$this->employee_models->select_data_employee(@$_SESSION['employee_id']);

			$this->load->view('header',$data1);
			
			$data['order']=$this->Order_models->order_view_y();

			$this->load->view('order/order_show_y',$data);
			
			$this->load->view('footer');
		}

		public function show()
		{
			// $order_id =$_POST['id'];

			// $data['order_detail']=$this->Order_models->show_order_detail($order_id);

			// $this->load->view('order/show/select_show_order_detail',$data);
		}



	
		

}

?>