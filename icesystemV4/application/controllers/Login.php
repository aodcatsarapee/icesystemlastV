<?php 

	class Login extends CI_Controller
	{	
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Product_models');
			$this->load->model('User_model');
			
		}

		public function index() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required'
			,
        array(
                'required'      => 'กรุณากรอก username!'
        ));
		$this->form_validation->set_rules('password', 'Password', 'required',array(
                
                'required'      => 'กรุณากรอก password!'
        ));
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			
			$this->load->view('login/login');
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			
			$password = $this->input->post('password');

			$check_login=$this->User_model->resolve_user_login($username, $password);
			
			if (!empty($check_login)) {

				// set session user datas
				$_SESSION['username']     = $check_login['username'];
				$_SESSION['customer_id']  = $check_login['customer_id'];
				$_SESSION['employee_id']  = $check_login['employee_id'];
				$_SESSION['type']         = $check_login['user_type'];

				// user login ok
				
				if($_SESSION['type']=="admin"){

					redirect('user');  

				} elseif($_SESSION['type']=="manager"){

					redirect('product'); 
				}elseif($_SESSION['type']=="emp_store"){

					redirect('product'); 
				}elseif($_SESSION['type']=="emp_produce"){

					redirect('produce_product');

				}elseif($_SESSION['type']=="emp_sale"){

					redirect('shopping'); 
				}elseif($_SESSION['type']=="emp_account"){

					redirect('account'); 
				}elseif($_SESSION['type']=="customers"){

					redirect('index'); 	
				}

			} else {
				
				// login failed
				$data->error = ' username หรือ password ไม่ถูกต้อง!';
				
				// send error to the view
				
				$this->load->view('login/login', $data);		
				
			}
			
		}
		
	}public function sign_out()
	{
		unset($_SESSION['username']);
		unset($_SESSION['customer_id']);
		unset($_SESSION['employee_id']);  
		unset($_SESSION['type']);


		redirect('login'); 

	}
	public function sign_out_customer()
	{
		unset($_SESSION['username']);
		unset($_SESSION['Customer_id']); 
		unset($_SESSION['employee_id']);  
		unset($_SESSION['type']);
		
		redirect('index'); 

	}
	
}
	
?>