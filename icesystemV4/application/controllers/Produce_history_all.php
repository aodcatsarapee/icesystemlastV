<?php 

	class produce_history_all extends CI_Controller
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
			
			$data['rs']=$this->produce_product_models->stock_view_all_for_view();

			$this->load->view('produce_product/produce_history_all',$data);

			$this->load->view('footer');


		}

	}