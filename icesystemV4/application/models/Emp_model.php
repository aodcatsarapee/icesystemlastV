<?php 

	class emp_model extends CI_Model
	{
		public function get($id)
		{
			$this->db->select('*');
			
			$this->db->from('employee');

			$this->db->where('employee_id',$id);

			$sql=$this->db->get();
			
			return $sql->row();
			
        }

        public function insertworktime($data)
        {
            $this->db->insert('worktime', $data);
            
            $this->db->insert_id();
            
            return (isset($data['employee_id'])) ? $data['employee_id'] : FALSE;	
        }
        
        public function get_worktime($id)
        {
            $this->db->select('worktime.*,employee.*');
			
            $this->db->from('worktime');
            
            $this->db->join('employee','worktime.Employee_id = employee.employee_id','left');

            $this->db->where('worktime.employee_id', $id);
            
            $this->db->order_by('worktime.Worktime_id','DESC');

			$sql=$this->db->get();
			
			return $sql->row();
        }

        public function set_worktime($id)
        {
         $this->db->select('worktime.*,employee.*');
        
        $this->db->from('worktime');
  
         $this->db->join('employee', 'worktime.Employee_id = employee.employee_id', 'left'); 
  
        $this->db->where('worktime.Employee_id',$id);
        
        $this->db->where('DAY(date)',date('d'));
        
        $this->db->where('MONTH(date)',date('m'));
        
        $this->db->where('YEAR(date)',date('Y'));
        
        $sql=$this->db->get();
        return $sql->row_array();
        }
		
}

