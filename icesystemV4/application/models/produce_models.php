<?php 	

		class produce_models extends CI_Model
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

		 public function stock_view ()
		{
			$this->db->select('*');
			
			$this->db->from('stock_detail');
			
			$this->db->order_by('stock_detail_id', 'DESC');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->result_array();
			}
			else
			{
				return $sql->result_array();
			}

			}

		public function select_product_amount()
		{
			$this->db->select('*');
			
			$this->db->from('product');

			$sql=$this->db->get();

	      return $sql->result_array();

		}

			public function select_stock_detail($stock_detail_id)
		{
			$this->db->select('*');
			
			$this->db->from('stock');

			$this->db->where('stock_detail_id',$stock_detail_id);

			$sql=$this->db->get();

	       return $sql->result_array();

		}


		public function insert_amount($stock_id,$ar)
		{
			$this->db->where("stock_detail_id",$stock_id);
			$this->db->update('stock_detail',$ar);
		}

		public function delete_amount($id)
		{
			$this->db->where("stock_detail_id",$id);
			$this->db->delete('stock');

			$this->db->where("stock_detail_id",$id);
			$this->db->delete('stock_detail');

		}

	/* new sotck*/

		public function insert_sotck_new($stock)
		{
			$this->db->insert('stock_detail',$stock);
			
			$id = $this->db->insert_id();

			return (isset($id)) ? $id : FALSE;	
		}


		public function select_data_stock_detail($id)
		{
			$this->db->select("*");

			$this->db->from("stock");

			$this->db->where("stock_detail_id",$id);

			$sql=$this->db->get();

			return $sql->result_array();


		}


	}

 ?>