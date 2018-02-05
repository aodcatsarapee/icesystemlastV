<?php  
class Rest_models extends CI_Model
  {

  	 public function rest_show()
      {
       $this->db->select('employee.*,department.*');
      
      $this->db->from('employee');
      $this->db->join('department', 'employee.department = department.department_id', 'left'); 
     
      
      $this->db->order_by('employee.employee_id', 'ASC');
      
      $sql=$this->db->get();
      return $sql->result_array();
      }


      public function select_data_rest($id)
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


     public function show_rest()
      {
      $this->db->select('rest_work.*,employee.*');
      
      $this->db->from('rest_work');

       $this->db->join('employee', 'rest_work.employee_id = employee.employee_id', 'left'); 

      $this->db->where('MONTH(date_add)',date('m'));
      
      $this->db->where('YEAR(date_add)',date('Y'));
           
      $sql=$this->db->get();

      return $sql->result_array();
      }

       
       public function set_rest($employee_id)
       {
        $this->db->select('rest_work.*,employee.*');
      
      $this->db->from('rest_work');

       $this->db->join('employee', 'rest_work.employee_id = employee.employee_id', 'left'); 

      $this->db->where('rest_work.employee_id',$employee_id);
   
      $this->db->where('MONTH(date_add)',date('m'));
      
      $this->db->where('YEAR(date_add)',date('Y'));
      
      $sql=$this->db->get();
      return $sql->row_array();



       }




       public function rest_detail($id,$date_start,$date_end)
  {
    
      $this->db->select('rest_work.*,employee.*');
      
      $this->db->from('rest_work');
      
      $this->db->join('employee', 'rest_work.employee_id = employee.employee_id', 'left'); 
      

      $this->db->where('date_add >=', $date_start);

          list($Y,$m,$d) = explode('-',$date_end);

      $this->db->where('date_add <=', $Y."-".$m."-".($d));


      $sql=$this->db->get();
      
      if ($sql->num_rows() > 0) {
        
        return $sql->result_array();
      }
      else
      {
        return $sql->result_array();
      }    
  }
    public function check_rest($employee_id){
          $this->db->select('rest_work.*,employee.*');
          $this->db->from('rest_work');
          $this->db->join('employee', 'rest_work.employee_id = employee.employee_id', 'left');

          $this->db->where('rest_work.employee_id',$employee_id);
         

          $sql=$this->db->get();
          return $sql->row_array();
          
          



    }


    public function set_salaly($employee_id)
      {
       $this->db->select('salary_month.*,employee.*');
      
      $this->db->from('salary_month');

       $this->db->join('employee', 'salary_month.employee_id = employee.employee_id', 'left'); 

      $this->db->where('salary_month.employee_id',$employee_id);
      
    
      
      $this->db->where('MONTH(date_add)',date('m'));
      
      $this->db->where('YEAR(date_add)',date('Y'));
      
      $sql=$this->db->get();
      return $sql->row_array();
      }







  }



