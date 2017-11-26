<?php
class Work_time_models extends CI_Model
  {

    
      public function emp_show()
      {
       $this->db->select('employee.*,department.*');
      
      $this->db->from('employee');
      $this->db->join('department', 'employee.department = department.department_id', 'left'); 
     
      
      $this->db->order_by('employee.employee_id', 'DESC');
      
      $sql=$this->db->get();
      return $sql->result_array();
      }




      public function show_worktime()
      {
       $this->db->select('worktime.*,employee.*');
      
      $this->db->from('worktime');
      $this->db->join('employee', 'worktime.employee_id = employee.employee_id', 'left'); 

       $this->db->where('DAY(date)',date('d'));
      $this->db->where('MONTH(date)',date('m'));
      $this->db->where('YEAR(date)',date('Y'));
      
      $sql=$this->db->get();
      return $sql->result_array();
      }

      

       public function set_worktime($employee_id)
      {
       $this->db->select('worktime.*,employee.*');
      
      $this->db->from('worktime');

       $this->db->join('employee', 'worktime.employee_id = employee.employee_id', 'left'); 

      $this->db->where('worktime.employee_id',$employee_id);
      
      $this->db->where('DAY(date)',date('d'));
      
      $this->db->where('MONTH(date)',date('m'));
      
      $this->db->where('YEAR(date)',date('Y'));
      
      $sql=$this->db->get();
      return $sql->row_array();
      }


      public function show_absence()
      {
       $this->db->select('*');
      
      $this->db->from('absence');
       $this->db->where('DAY(date)',date('d'));
      $this->db->where('MONTH(date)',date('m'));
      $this->db->where('YEAR(date)',date('Y'));
      
      $sql=$this->db->get();
      return $sql->result_array();
      }



       public function work_in_detail($id,$date_start,$date_end)
  {
    
      $this->db->select('worktime.*,employee.*');
      
      $this->db->from('worktime');
      
      $this->db->join('employee', 'worktime.employee_id = employee.employee_id', 'left'); 
      

      $this->db->where('date >=', $date_start);

          list($Y,$m,$d) = explode('-',$date_end);

      $this->db->where('date <=', $Y."-".$m."-".($d));


      $sql=$this->db->get();
      
      if ($sql->num_rows() > 0) {
        
        return $sql->result_array();
      }
      else
      {
        return $sql->result_array();
      }

      
  }


  }
?>