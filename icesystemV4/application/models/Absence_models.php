<?php  
class Absence_models extends CI_Model
  {

  	 public function ab_show()
      {
       $this->db->select('employee.*,department.*');
      
      $this->db->from('employee');
      $this->db->join('department', 'employee.department = department.department_id', 'left'); 
     
      
      $this->db->order_by('employee.employee_id', 'ASC');
      
      $sql=$this->db->get();
      return $sql->result_array();
      }


       public function show_absence()
      {
       $this->db->select('*');
      $this->db->from('absence');
       $this->db->join('employee', 'absence.employee_id = employee.employee_id', 'left'); 
       $this->db->where('DAY(date)',date('d'));
      $this->db->where('MONTH(date)',date('m'));
      $this->db->where('YEAR(date)',date('Y'));
      
      $sql=$this->db->get();
      return $sql->result_array();
      }




       public function set_absence($employee_id)
      {
       $this->db->select('absence.*,employee.*');
      
      $this->db->from('absence');

       $this->db->join('employee', 'absence.employee_id = employee.employee_id', 'left'); 

      $this->db->where('absence.employee_id',$employee_id);
      
      $this->db->where('DAY(date)',date('d'));
      
      $this->db->where('MONTH(date)',date('m'));
      
      $this->db->where('YEAR(date)',date('Y'));
      
      $sql=$this->db->get();
      return $sql->row_array();
      }



       public function absence_detail($id,$date_start,$date_end)
  {
    
      $this->db->select('absence.*,employee.*');
      
      $this->db->from('absence');
      
      $this->db->join('employee', 'absence.employee_id = employee.employee_id', 'left'); 
      

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



