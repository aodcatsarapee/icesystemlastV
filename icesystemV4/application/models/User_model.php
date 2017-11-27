<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class User_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
	parent::__construct();	
	
	}

	public function resolve_user_login($username, $password){
		
		$this->db->select('*');
		
		$this->db->from('users');
		
		$this->db->where('username', $username);
		
		$this->db->where('password', $password);
	    
	    $sql = $this->db->get()->row_array();
		
		return  $sql;
		
	}

	// User//
	public function User_show()
	{
		$this->db->select('*');
		
		$this->db->from('users');

		return $sql = $this->db->get()->result_array();
	}


	public function select_user($id)
	{
		$this->db->select('*');
		
		$this->db->from('users');


		$this->db->where("user_id",$id);

		$sql=$this->db->get();

		return $sql->row_array();
	}

	public function customer_view ()
		{
			$this->db->select('customers.*,users.*');
			
			$this->db->from('customers');

			$this->db->join('users', 'customers.customer_id = users.customer_id', 'left'); 		
					
			$sql=$this->db->get();
							
			return $sql->result_array();
			
		}

//-------------------------User1------------------------------------//
		public function search_employee($search_employee){
			return $this->db->select('*')
			->from('employee')
			->join('department', 'employee.department = department.department_id', 'left')
			->where(" ( employee_id LIKE '%" .$search_employee. "%' ) ")
			->get()
			->row();
		}
		public function check_user_employee($id)
		{
			return $this->db->select('*')
			->from('users')
			->where("employee_id",$id)
			->get()
			->row();		
		}
		public function check_user($username)
		{
			return $this->db->select('*')
			->from('users')
			->where("username",$username)
			->get()
			->num_rows();			
		}

		public function get_emp_user()
		{
			 return $this->db->select('*')
				->from('users')
				->join('employee', 'users.employee_id = employee.employee_id')
				 ->get()
				 ->result();
		}
		public function select_emp_user($id)
		{
			return $this->db->select('*')
			->from('users')
			->join('employee', 'users.employee_id = employee.employee_id')
			->join('department', 'employee.department = department.department_id')
			->where("users.employee_id",$id)
			->get()
			->row();
		}
  //----------------------------customer----------------------------------//
  public function get_customer_user()
  {
	   		return $this->db->select('*')
			->from('users')
			->join('customers', 'users.customer_id = customers.customer_id')
			->get()
			->result();
  }

  public function select_customer_user($id)
  {
	  return $this->db->select('*')
	  ->from('users')
	  ->join('customers', 'users.customer_id = customers.customer_id')
	  ->where("users.customer_id",$id)
	  ->get()
	  ->row();
  }

}	
?>