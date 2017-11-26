<?php 

	
	class department extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();

			$this->load->model('department_models');
		}

		public function index()
		{
			$this->load->model('employee_models');
			
			$data1['employee1'] =$this->employee_models->select_data_employee($_SESSION['employee_id']);
			 
			$this->load->view('header',$data1);
			
			$data['department']=$this->department_models->department_view();



			$this->load->view('department/index',$data);
			
			$this->load->view('footer');
		}

		public function insert_data_depatment()
		{

			$department_name = $_POST['department_name'];
			$ar = array(

						"name" => $department_name,


				);
			$this->department_models->insert_data_depatment($ar);


		}


		public function select_data_department()

		{
			$id=$_POST['id'];

			$data['rs']=$this->department_models->select_data_department($id);

			$this->load->view('department/select_data_department/select',$data);
		}

		public function edit_data_depatment()	

		{
			$department_id =  $_POST['department_id'];
			$department_name = $_POST['department_name'];
			$ar = array(

						"name" => $department_name,

				);

			$this->db->where("department_id",$department_id);
			$this->db->update('department',$ar);


		}


		public function delete_depaetment(){

				$id=$_POST['id'];
				
				$this->db->where("department_id",$id);
				$this->db->delete('department');



		}	

	}

	
	 ?>