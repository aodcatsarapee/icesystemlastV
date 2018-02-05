<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping_show_sell_detail extends CI_Controller {

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
			
			$data['orders'] = $this->billing_model->orders();

			$data['cash']= $this ->billing_model->orders_selcet_cash();

			$data['cash_sell']= $this ->billing_model->orders_selcet_cash_sell();

			$data['credit']= $this ->billing_model->orders_selcet_credit();

			$data['credit_sell']= $this ->billing_model->orders_selcet_credit_sell();
	                //send all orders data to "shopping_view", which fetch from database.		
			$this->load->view('shopping-show-sell-detail/show_order', $data);



			$this->load->view('footer');

		}


		public function select_order_for_show_sell()
		{
			$id = $_POST['id'];


			$data['sell'] =$this->billing_model->select_order_for_show_sell($id);
			$data['sell_detail'] =$this->billing_model->select_sell_for_sell_detail($id);

			$this->load->view('shopping-show-sell-detail/show/select_show_sell_detail',$data);
		}
	}

