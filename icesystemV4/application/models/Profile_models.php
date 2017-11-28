<?php 
        class Profile_models extends CI_Model{

            public function Profile_show($id)
            {
             $this->db->select('users.*','employee.*');
            
            $this->db->from('users');
            $this->db->join('employee','users.employee_id = employee.employee_id');           
            
            // $this->db->order_by('users.user_id', 'DESC');
            $this->db->where('users.employee_id',$id);
            $sql=$this->db->get();
            return $sql->row_array();
            }




        }


?>