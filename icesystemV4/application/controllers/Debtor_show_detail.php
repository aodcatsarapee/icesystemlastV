<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Debtor_show_detail extends CI_Controller {

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
	                //Get all data from database
			 $data['debtor'] = $this->Debtor_model->debtor_view_d();

			 $data['debtor_num']= $this->Debtor_model->debtor_view_d_num_row();
			
			$this->load->view('debtor/debtor_show',$data);

			$this->load->view('footer');


		}
	
	}

?>