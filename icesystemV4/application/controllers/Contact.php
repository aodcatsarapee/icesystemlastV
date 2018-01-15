<?php

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('analyze_model');
    }
    public function index()
    {
        $this->load->model('employee_models');
        $data1['employee1'] = $this->employee_models->select_data_employee(@$_SESSION['employee_id']);
        $this->load->view('header', $data1);
        $data['contact'] =$this->db->get('contact');
        $this->load->view('contact', $data);
        $this->load->view('footer');
    }
}