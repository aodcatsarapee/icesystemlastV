<?php 

	class User extends CI_Controller
	{	
		public function __construct()
		{
			parent::__construct();

			$this->load->model('User_model');

			$this->load->model('employee_models');

			
		}

		public function index() {

			$data1['employee1'] =$this->employee_models->select_data_employee($_SESSION['employee_id']);

			$this->load->view('header',$data1);

			$data['user'] =$this->User_model->User_show();

			$data['employee'] =$this->employee_models->employee_view();
			
			
			
			$this->load->view('user/index',$data);
						
			$this->load->view('footer');

		
		}
		public function insert_user()
		{

		$user = array(

			'username' =>$_POST['username'],
			'password' =>$_POST['password'],
			'employee_id' =>$_POST['employee'],
			'type'     =>$_POST['type'],
			'date'     =>date("Y-m-d H:i:s"), 
		 );

		 $this->db->insert('users',$user);		
		}

	public function select_user ()
	{

		$id = $_POST['id'];

		$data['employee'] =$this->employee_models->employee_view();

		$data['customer'] =$this->User_model->customer_view();

		$data['user'] = $this->User_model->select_user($id);

		$this->load->view("user/edit/select",$data);
	}




	public function edit_user ()
	{



		$user_id = $_POST['user_id'];
		$username = $_POST['username'];
		$password = $_POST['p'];
		


		$user = array(

			'username' =>$_POST['username'],
			'password' =>$_POST['p'],
			'date'     =>date("Y-m-d H:i:s"),
		
			
		 );

			$this->db->where("user_id",$user_id);
			$this->db->update('users',$user);


	}

	public function delete_user(){

				$id=$_POST['id'];
				
				$this->db->where("user_id",$id);
				$this->db->delete('users');

		}	

}
?>