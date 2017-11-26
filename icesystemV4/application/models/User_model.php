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


}	
?>