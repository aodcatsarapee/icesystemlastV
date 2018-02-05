<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Account_show_detail_m extends CI_Controller {

public function __construct()
	{
		parent::__construct();
			//load model
			$this->load->model('Account_models');
			
	}

public function index(){

			$this->load->model('employee_models');
			
			$data1['employee1'] =$this->employee_models->select_data_employee($_SESSION['employee_id']);
			 
			$this->load->view('header',$data1);
	                //Get all data from database
            $data['accunt'] = $this->Account_models->accunt_show_m();
            $data['accunt_row'] = $this->Account_models->accunt_show_row_m();
			
			$this->load->view('account/account_show_detail_m',$data);

			$this->load->view('footer');

		}

}
