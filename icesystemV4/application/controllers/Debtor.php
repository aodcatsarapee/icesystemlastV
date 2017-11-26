<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Debtor extends CI_Controller {

public function __construct()
	{
		parent::__construct();
			//load model
			$this->load->model('Debtor_model');
			$this->load->model('billing_model');

	}

public function index(){

			$this->load->model('employee_models');
			
			$data1['employee1'] =$this->employee_models->select_data_employee($_SESSION['employee_id']);
			 
			$this->load->view('header',$data1);
	                
	        $data['debtor']= $this->Debtor_model->debtor_view(); 

	        $data['debtor_num']= $this->Debtor_model->debtor_view_num_row();
	          
			$this->load->view('debtor/index',$data);

			$this->load->view('footer');

		}

	public function show_debtor_detail()
	{
		

			$result =$_POST['id'];

			$result_explode= explode('-', $result);

			$result_debtor_id= $result_explode[0];

			$result_sell= $result_explode[1];

			$data['sell'] =$this->billing_model->select_order_for_show_sell($result_sell);

			$data['debtor_detail'] = $this->Debtor_model->show_debtor_detail($result_debtor_id);

			$this->load->view('debtor/show/select_show_debtor_detail',$data);
	}
	
	}

?>