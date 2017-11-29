<?php 

	class product_models extends CI_Model
	{
		public function product_view ()
		{
			$this->db->select('*');
			
			$this->db->from('product');
			
			$this->db->order_by('product_id', 'DESC');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->result_array();
			}
			else
			{
				return $sql->result_array();
			}

			}

		public function select_data($id)
		{
			$this->db->select('*');
			
			$this->db->from('product');

			$this->db->where('product_id',$id);

			$sql=$this->db->get();

			if ($sql->num_rows() > 0) {
				
				return $sql->row_array();
			}
			else
			{
				return $sql->row_array();
			}
		}
		public function insert_data($ar)
		{
			$this->db->insert('product',$ar);
		}


		public function update_data($id,$ar)
		{
			
			$this->db->where("product_id",$id);
			$this->db->update('product',$ar);
		}

		public function update_product_img($id,$ar)
		{
			
			$this->db->where("product_id",$id);
			$this->db->update('product',$ar);
		}



		public function delete_data($id)
		{
			$this->db->where('product_id', $id);
			
			$this->db->delete('product');


			$this->db->where('product_id', $id);
			
			$this->db->delete('stock');


		}

		public function insert_data_produce($ar)
		{
			$this->db->insert('stock',$ar);
		}
	
		
}
?>
