<?php

class Analyze extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Analyze_model');
    }

    public function index()
    {
        $this->load->model('employee_models');
        $data1['employee1'] = $this->employee_models->select_data_employee(@$_SESSION['employee_id']);
        $this->load->view('header', $data1);
        $data['get_product'] = $this->Analyze_model->get_product()->result();
        $this->load->view('analyze/index', $data);
        $this->load->view('footer');
    }
}

?>