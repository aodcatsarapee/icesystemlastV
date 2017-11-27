<?php 

class User extends CI_Controller
{	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('User_model');
			$this->load->model('employee_models');	
        }
         public function index()
        {
            $data1['employee1'] =$this->employee_models->select_data_employee($_SESSION['employee_id']);
            $this->load->view('header',$data1);
            $data['emp_user'] =$this->User_model->get_emp_user();       
            $this->load->view('user1/index',$data);          
            $this->load->view('footer');
        }
        public function search_employee()
        {
            $data['employee']=$this->User_model->search_employee($this->input->post('search_employee'));

            if( $data['employee'] != null)
            {
                $data['status']=true;  
                $check_user_employee=$this->User_model->check_user_employee($this->input->post('search_employee'));
                if( count($check_user_employee) == 0)
                {
                    $data['check_user']=true;  
                }else
                {
                    $data['check_user']=false;
                }
            }else{
                $data['status']=false;
            }
            echo json_encode($data);
        }
        public function insert_user()
		{
            $check_user=$this->User_model->check_user($this->input->post('username'));

           if($check_user == 0)
           {
            $data['check_username']=true;  
            $user_insert= array(
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password'),
                'employee_id'=>$this->input->post('employee_id'),
                'user_type'=>$this->input->post('type'),
            );
            $this->db->insert('users',$user_insert);
           }
           else
           {
            $data['check_username']=false;
           }

           echo json_encode($data);
        }
        public  function select_emp_user()
        {
            $data['user']=$this->User_model->select_emp_user($this->input->post('id'));
            echo json_encode($data);
        }
        public function update_emp_user()
        {
            $check_user=$this->User_model->check_user($this->input->post('edit_username'));
            
                if($this->input->post('edit_username') == $this->input->post('edit_username_old'))
                {
                    $data['check_username']=true;  
                        $user_update= array(
                            'username'=>$this->input->post('edit_username'),
                            'password'=>$this->input->post('edit_password'),
                            'employee_id'=>$this->input->post('edit_employee_id'),
                            'user_type'=>$this->input->post('edit_type'),
                        );
                        $this->db->where('employee_id',$this->input->post('edit_employee_id'));
                        $this->db->update('users',$user_update);
                }
                else
                {
                    if($check_user == 0)
                    {
                     $data['check_username']=true;  
                     $user_update= array(
                         'username'=>$this->input->post('edit_username'),
                         'password'=>$this->input->post('edit_password'),
                         'employee_id'=>$this->input->post('edit_employee_id'),
                         'user_type'=>$this->input->post('edit_type'),
                     );
                     $this->db->where('employee_id',$this->input->post('edit_employee_id'));
                     $this->db->update('users',$user_update);
                    }
                    else
                    {
                     $data['check_username']=false;
                    }
                }
                       echo json_encode($data); 
        }
        public function delete_user()
        {
            $this->db->where('employee_id',$this->input->post('id'));
            $this->db->delete('users');
        }
            
}