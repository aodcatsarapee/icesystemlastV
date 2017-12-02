<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

public function __construct()
	{
		parent::__construct();
			//load model
			$this->load->model('Account_models');
			
	}

public function index(){

		$this->load->model('employee_models');
			
			$data1['employee1'] =$this->employee_models->select_data_employee(@$_SESSION['employee_id']);
			 
			$this->load->view('header',$data1);
	                //Get all data from database
            $data['accunt'] = $this->Account_models->accunt_show();
            $data['accunt_row'] = $this->Account_models->accunt_show_row();
			
			$this->load->view('account/index',$data);

			$this->load->view('footer');

		}
public function insert_account()
	{

		$account_type = $_POST['account_type'];
		$account_detail = $_POST['account_detail'];
		$money = $_POST['money'];

		if($account_type =='รายรับ'){

				$account = array(

				"account_detail" => $account_detail,
				"account_income"=> $money,
				"account_type" => $account_type,
				"account_datasave" => date('Y-m-d H:i:s'),
				);

				$this->db->insert('account',$account);
		}else{
				$account = array(

				"account_detail" => $account_detail,
				"account_expenses"=> $money,
				"account_type" => $account_type,
				"account_datasave" => date('Y-m-d H:i:s'),
				);

				$this->db->insert('account',$account);

		}
	}

	public function select_data()
	{
		$id = $_POST['id'];

		$data['accunt'] = $this->Account_models->select_accunt_show($id);

		$this->load->view('account/edit/select_edit_account',$data);
	}
	public function update_account()
	{
		$account_id = $_POST['account_id'];
		$account_type = $_POST['account_type'];
		$account_detail = $_POST['account_detail'];
		$money = $_POST['money'];

		if($account_type =='รายรับ'){

				$account = array(

				"account_detail" => $account_detail,
				"account_income"=> $money,
				"account_type" => $account_type,
				"account_datasave" => date('Y-m-d H:i:s'),
				);

				$this->db->where('account_id',$account_id);
				$this->db->update('account',$account);
		}else{
				$account = array(

				"account_detail" => $account_detail,
				"account_expenses"=> $money,
				"account_type" => $account_type,
				"account_datasave" => date('Y-m-d H:i:s'),
				);

				$this->db->where('account_id',$account_id);
				$this->db->update('account',$account);

		}
	}
	public function delete_data()
	{
		$id = $_POST['id'];
		$this->db->where('account_id',$id);
		$this->db->delete('account');
	}
}

?>