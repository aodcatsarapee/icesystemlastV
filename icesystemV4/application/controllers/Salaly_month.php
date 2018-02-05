<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Salaly_month extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('Salaly_models');

        $this->load->library('Pdf');

    }


    public function index()
    {
        $this->load->model('employee_models');

        $data1['employee1'] = $this->employee_models->select_data_employee($_SESSION['employee_id']);

        $this->load->view('header', $data1);
        //Get all data from database
        $data['employee'] = $this->Salaly_models->salaly_show();
        $data['employee2'] = $this->Salaly_models->select_salaly();


        $this->load->view('salaly_month/index', $data);
        $this->load->view('footer');


    }


    public function select_data_salaly()

    {
        $id = $_POST['id'];

        $data['os'] = $this->Salaly_models->select_data_salaly($id);
        $data['rs'] = $this->Salaly_models->show_work($id);
        $data['ab'] = $this->Salaly_models->show_absence($id);
        $data['md'] = $this->Salaly_models->show_salaly_total($id);
        $data['re'] = $this->Salaly_models->show_rest($id);

        $this->load->view('salaly_month/salaly_insert/salaly_form', $data);
    }


    public function select_data_ab()

    {


        $data['ab'] = $this->Salaly_models->show_absence();


        $this->load->view('salaly_month/avg_absence/avg_form', $data);
    }

    public function insert_salaly()
    {

        $salaly_months = $_POST['salaly_months'];
        $emp_id = $_POST['employee_id'];
        $total = $_POST['salaly_total'];
        $absence_total = $_POST['absence_total'];
        $salaly_rest = $_POST['salaly_rest'];
        $salaly_in_work = $_POST['salaly_in_work'];

        $fullname = $_POST['fullname'];

        $set_worktime = $this->Salaly_models->set_salaly($_POST['employee_id']);
        if ($set_worktime['employee_id'] == null) {

            $date_in = array(

                'salaly_month' => $salaly_months,
                'employee_id' => $emp_id,
                'date_add' => date("Y-m-d"),
                // 'salaly_total' => $total,
                'absence' => $absence_total,
                'worktime' => $salaly_in_work,
                'rest_work' => $salaly_rest,
            );

            $this->session->set_flashdata('pay', 'จ่ายเงินเดือนเรียบร้อยเเล้ว');

            $this->db->insert("salary_month", $date_in);

            $account = array(

                "account_detail" => 'จ่ายเงินเดือนให้พนักงานชื่อ ' . $fullname,
                "account_expenses" => $salaly_months,
                "account_type" => 'จ่ายเงินเดือนให้พนักงาน',
                "account_datasave" => date('Y-m-d H:i:s'),
            );

            $this->db->insert('account', $account);


        } else {


            $this->session->set_flashdata('check', 'จ่ายเงินเดือนให้พนักงานคนนี้เเล้ว');


        }

        redirect('Salaly_month');

    }

    public function print_saraly()
    {


    }

}


