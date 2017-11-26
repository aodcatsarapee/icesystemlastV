<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping_show_sell_detail_m extends CI_Controller {

public function __construct()
	{
		parent::__construct();
			//load model
			$this->load->model('billing_model');

	}

public function index(){

			$this->load->model('employee_models');
			
			$data1['employee1'] =$this->employee_models->select_data_employee($_SESSION['employee_id']);
			 
			$this->load->view('header',$data1);
	                //Get all data from database
			$data['orders'] = $this->billing_model->orders_m();

			$data['cash']= $this ->billing_model->orders_selcet_cash_m();

			$data['cash_sell']= $this ->billing_model->orders_selcet_cash_m_sell();

			$data['credit']= $this ->billing_model->orders_selcet_credit_m();

			$data['credit_sell']= $this ->billing_model->orders_selcet_credit_m_sell();
	                //send all orders data to "shopping_view", which fetch from database.		
			$this->load->view('shopping-show-sell-detail/show_order_m', $data);



			$this->load->view('footer');

		}
	
	}

?>