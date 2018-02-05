<?php 

class User_customer extends CI_Controller
{	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('user_model');
			$this->load->model('employee_models');	
        }
         public function index()
        {
            $data1['employee1'] =$this->employee_models->select_data_employee(@$_SESSION['employee_id']);
            $this->load->view('header',$data1);
            $data['customer_user'] =$this->user_model->get_customer_user();
            $this->load->view('user1/customer/index',$data);          
            $this->load->view('footer');

        }
        public function select_customer_user()
        {
            $data['user_customer']=$this->user_model->select_customer_user($this->input->post('id'));
            echo json_encode($data);
        }
        public function update_customer_user()
        {
             $check_user=$this->user_model->check_user($this->input->post('edit_username'));   
                if($this->input->post('edit_username') == $this->input->post('edit_username_old'))
                {
                    $data['check_username']=true;  
                        $user_update= array(
                            'username'=>$this->input->post('edit_username'),
                            'password'=>$this->input->post('edit_password'),
                            'customer_id'=>$this->input->post('edit_customer_id'),
                        );
                        $this->db->where('customer_id',$this->input->post('edit_customer_id'));
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
                        'customer_id'=>$this->input->post('edit_customer_id'),
                     );
                     $this->db->where('customer_id',$this->input->post('edit_customer_id'));
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
             $this->db->where('customer_id',$this->input->post('id'));
             $this->db->delete('users');
         }   
}
