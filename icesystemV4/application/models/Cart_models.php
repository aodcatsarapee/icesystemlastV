<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart_models extends CI_Model {


public function insert_order($data)
	{
		$this->db->insert('order_detail', $data);

		$id = $this->db->insert_id();

		return (isset($id)) ? $id : FALSE;
	}

	public function order_view()
	{
		$this->db->select("*");

		$this->db->from('order');

		$this->db->join('order_detail', 'order.order_detail_id = order_detail.order_detail_id','right'); 

		$this->db->group_by('order.order_detail_id');
		
		$this->db->where('customer_id',$_SESSION['customer_id']);

		$sql=$this->db->get();

       return $sql->result_array();


	}

	public function select_data_customer_user($id)
		{
			$this->db->select('customers.*,users.*');
			
			$this->db->from('customers');

			$this->db->join('users', 'customers.customer_id = users.customer_id', 'left'); 

			$this->db->where('customers.customer_id',$id);

			$sql=$this->db->get();

			if ($sql->num_rows() > 0) {
				
				return $sql->row_array();
			}
			else
			{
				return $sql->row_array();
			}
		}





}

