<?php
/**
 * Created by PhpStorm.
 * User: sorsak tonken
 * Date: 12/21/2017
 * Time: 8:55 PM
 */
class Savetime extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('emp_model');
        $this->load->model('Rest_models');  
    }
    public function index()
    {
        if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_account' || $_SESSION['type']=='manager'){
            $this->load->view('savetime/index');
        }else{
            redirect(base_url()."index");
        }
    }
    public function get_emp(){	
		if($this->emp_model->get($this->input->post('id'))==true){
			$emp = $this->emp_model->get($this->input->post('id'));
			$set_worktime = $this->emp_model->set_worktime($this->input->post('id'));
		if($set_worktime['Worktime_time_in'] == null)
		{
            $chek_rest = $this->Rest_models->check_rest($this->input->post('id'));
            $date_day = date('Y-m-d');
        if(strtotime($date_day) >= strtotime($chek_rest['rest_before']) && strtotime($date_day) <= strtotime($chek_rest['rest_after']) ){
            $data['name']=$chek_rest['employee_fname']." ".$chek_rest['employee_lname'];
            $data['time']='ลางาน';
            $data['status_emp']='ไม่สามารถบัททึกได้';
            $data['status']=false;
        }else{
            if(date('H') >='6' && date('H') <='16' ){
                $time = date('H');
                $worktime = array(
                    'employee_id' => $emp->employee_id,
                    'date' => date('Y-m-d H:i:s'), 
                    'Worktime_time_in' => date("H:i:s"),
                );
                $emp_id = $this->emp_model->insertworktime($worktime);
                $get_worktime = $this->emp_model->get_worktime($emp_id);
                $date=date_create($get_worktime->Worktime_time_in);
                $data['img']=$get_worktime->employee_image;
                $data['name']=$get_worktime->employee_fname." ".$get_worktime->employee_lname;
                $data['time']=date_format($date,"H:i")." นาที";
                $data['status_emp']='เข้างานเเล้ว';
                $data['status']=true;
            }else{
                $data['name']='ไม่อยู่ในช่วง';
                $data['time']='ลงเวลา';
                $data['status_emp']='เข้างาน';
                $data['status']=false;
            }
        }
		}else if($set_worktime['Worktime_time_in'] =! null && $set_worktime['Worktime_time_out'] == null){
            if(date('H') >='17' && date('H') <='18' ){
			$date_out = array(
				'Worktime_time_out' => date("H:i:s")
			);
				$this->db->where('employee_id',$set_worktime['employee_id']);
				$this->db->update("worktime", $date_out);	
							
							$get_worktime = $this->emp_model->get_worktime($set_worktime['employee_id']);
							$date=date_create($get_worktime->Worktime_time_out);
							 $data['img']=$get_worktime->employee_image;
							 $data['name']=$get_worktime->employee_fname." ".$get_worktime->employee_lname;
							 $data['time']=date_format($date,"H:i")." นาที";
							 $data['status_emp']='ออกงานเเล้ว';
							 $data['status']=true;
            }else{
                $data['name']='ไม่อยู่ในช่วง';
                $data['time']='ลงเวลา';
                $data['status_emp']='ออกงาน';
                $data['status']=false;
            }
		}else{
			$data['img']='';
			$data['name']='การบันทึกข้อมูลพนักงาน';
			$data['time']='เสร็จสิ้น';
			$data['status_emp']='แล้ว';
			$data['status']=false;
		}

		}else{
			$data['img']="";
			$data['name']='ไม่มีข้อมูล';
			$data['time']='ไม่มีข้อมูล';
			$data['status_emp']="ไม่มีข้อมูล";
			
			$data['status']=false;
		}
		echo  json_encode($data);
    }
   
    

}