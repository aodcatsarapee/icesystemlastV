<?php 
        class Profile extends CI_Controller{

            public function __construct()
            {
                parent::__construct();
    
                
                $this->load->model('employee_models');
                $this->load->model('User_model');
                $this->load->model('Profile_models');
            }
    

            public function index(){
         

               $data1['employee1'] =$this->employee_models->select_data_employee($_SESSION['employee_id']);                
               $this->load->view('header',$data1);               
               $data['employee'] = $this->Profile_models->Profile_show($_SESSION['employee_id']);
                $this->load->view('profile/index',$data);
                
                $this->load->view('footer');

            }


            public function toProfile(){

            redirect('profile'); 

            }


            public function editProfile(){
                   $user = array(  
                        'password' => $this->input->post('password'),
                   );
                   $this->db->where("user_id",$this->input->post('user_id'));
                   $this->db->update('users',$user);

                   $employees = array(

                            'employee_fname' => $this->input->post('fname'),
                            'employee_lname' => $this->input->post('lname'),
                            'employee_phone'=> $this->input->post('phone'),
                            'employee_email'=>$this->input->post('email'),

                   );
                    $this->db->where("employee_id",$this->input->post('employee_id'));
                    $this->db->update('employee',$employees);



            }



        }

