<?php
class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('emp_model');
         $this->load->model('Rest_models');  
    }
    public function index()
    {
    //    $this->db->where('DAY(worktime.date)',date('d'));
    //    $this->db->where('MONTH(worktime.date)',date('m'));
    //    $this->db->where('YEAR(worktime.date)',date('Y'));
     //  $this->db->join('employee','employee.employee_id = worktime.employee_id','right');
    //    $this->db->join('rest_work','rest_work.employee_id = employee.employee_id');
    //    $worktime=$this->db->get('worktime')->result();
    //     foreach($worktime as $item){
    //         $chek_rest = $this->Rest_models->check_rest($item->employee_id);
    //         $date_day = date('Y-m-d');
    //         if(strtotime($date_day) >= strtotime($chek_rest['rest_before']) && strtotime($date_day) <= strtotime($chek_rest['rest_after']) ){
    //           echo $item->employee_id." ".$item->Worktime_time_in." ลางาน <br/>";
    //         }elseif($item->Worktime_time_in ==NULL){
    //           echo $item->employee_id." ".$item->Worktime_time_in." ขาดงาน <br/>";
    //         }elseif($item->Worktime_time_in !=NULL){
    //           echo $item->employee_id." ".$item->Worktime_time_in." มาทำงาน <br/>";
    //         }
    //     }

       $this->db->join('employee','employee.employee_id = worktime.employee_id','right');
       $worktime=$this->db->get('worktime')->result();
       foreach($worktime as $item){
        $chek_rest = $this->Rest_models->check_rest($item->employee_id);
        $date_day = date('Y-m-d');
        if(strtotime($date_day) >= strtotime($chek_rest['rest_before']) && strtotime($date_day) <= strtotime($chek_rest['rest_after']) ){
            echo $item->employee_id." ลางาน <br/>";
        }elseif($item->date == date('Y-m-d')){
            echo $item->employee_id." ".$item->Worktime_time_in." มาทำงาน <br/>";
           }else{
            echo $item->employee_id." ขาดงาน <br/>";
           }
       }
    }
}
?>