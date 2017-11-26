<?php 

	class employee_models extends CI_Model
	{
		public function employee_view ()
		{
			$this->db->select('employee.*,department.*');
			
			$this->db->from('employee');

			$this->db->join('department', 'employee.department = department.department_id', 'left');
			
			$this->db->order_by('employee_id', 'DESC');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->result_array();
			}
			else
			{
				return $sql->result_array();
			}
		}

		public function insert_data_employee($ar){

				$this->db->insert('employee',$ar);


		}

		public function select_data_employee($id)
		{
		$this->db->select('employee.*,department.*');

			$this->db->from('employee');

			$this->db->join('department', 'employee.department = department.department_id', 'left');

			$this->db->where('employee_id',$id);

			$sql=$this->db->get();

			if ($sql->num_rows() > 0) {

				return $sql->row_array();
			}
			else
			{
				return $sql->row_array();
			}
		}
		public function edit_data_employee($employee_id,$ar)
		{
			$this->db->where("employee_id",$employee_id);
			$this->db->update('employee',$ar);
		}

		public function update_emp_img($employee_id,$ar)
		{
			$this->db->where("employee_id",$employee_id);
			$this->db->update('employee',$ar);
		}




		
	}