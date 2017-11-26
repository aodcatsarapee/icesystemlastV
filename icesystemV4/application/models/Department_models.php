<?php 

	class department_models extends CI_Model
	{
		public function department_view ()
		{
			$this->db->select('*');
			
			$this->db->from('department');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->result_array();
			}
			else
			{
				return $sql->result_array();
			}

		}

		public function insert_data_depatment($ar){

				$this->db->insert('department',$ar);

		}

		public function select_data_department($id)
		{
			$this->db->select('*');
			
			$this->db->from('department');

			$this->db->where('department_id',$id);

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


	?>