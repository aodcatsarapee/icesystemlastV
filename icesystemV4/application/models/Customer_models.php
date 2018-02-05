<?php 
class Customer_models extends CI_Model
	{ 

		public function customer_view ()
		{
			$this->db->select('customers.*');
			
			$this->db->from('customers');

		
			

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->result_array();
			}
			else
			{
				return $sql->result_array();
			}

		}


		public function insert_data_customer($ar){

				$this->db->insert('customers',$ar);

				$id = $this->db->insert_id();

				return (isset($id)) ? $id : FALSE;


		}



		public function select_data_customer($id)
		{
			$this->db->select('*');
			
			$this->db->from('customers');

			$this->db->where('customer_id',$id);

			$sql=$this->db->get();

			if ($sql->num_rows() > 0) {
				
				return $sql->row_array();
			}
			else
			{
				return $sql->row_array();
			}
		}


		public function edit_data_customer($cus_id,$ar)	

		{

			$this->db->where("customer_id",$cus_id);
			$this->db->update('customers',$ar);


		}


		public function update_cus_img($cus_id,$ar)
		{
			
			$this->db->where("customer_id",$cus_id);
			$this->db->update('customers',$ar);
		}



	}




 