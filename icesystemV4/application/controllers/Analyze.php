<?php

class Analyze extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('analyze_model');
    }
    public function index()
    {
        $this->load->model('employee_models');
        $data1['employee1'] = $this->employee_models->select_data_employee(@$_SESSION['employee_id']);
        $this->load->view('header', $data1);
        $data['get_product'] = $this->analyze_model->get_product()->result();
        $this->load->view('analyze/index', $data);
        $this->load->view('footer');
    }
    public function load_analyze()
    {
        $product= explode('-',$this->input->post('product'));
        $product_id= $product[0]; 
        $product_type= $product[1];
    //------------------------------ คำนวณรายวัน 7 วันย้อนหลัง--------------------------------------//
        $n=0;
        $n1=7;
        $n_total=0;
        $total_all=0;
        for($i=-1; $i>= -7;$i--){ // ลูปเพื่อไป get ค่า จำนวนตามยอดขายในเเต่ล่ะวัน
             $data['d'][]=$this->analyze_model->get_sell($product_id,$i)->row();  //รับค่าจำนวนย้อนหลังตั่งเเต่ วันที่ 1 - 7 วัน        
              $total[]=(@$data['d'][$n]->qty*($n1)); // คำนวณค่าเฉีอยเเบบถ่วงน้ำหนักให้วันเเรกมีน้ำหนักมากที่สุด 7 6 5 4 3 2 1
              $total_all +=$total[$n]; //รวมค่าทั้งหมด
              $n_total+= $n1; //ค่าน้ำหนักเพื่อไปคำนวณ
              $n1--;   // เนื่องจากเริ้มต้นที่ 7 ให้คำนวญจาก มากไปน้อย
              $n++;    // เรียก index arrary เพื่อจัดเก็บค่า
        }
      $data['get_d']=ceil($total_all/$n_total);
    //------------------------------ คำนวณรายสัปดาห์ 3ปดาห์ย้อนหลัง--------------------------------------//     
        $n_w=0;
        $n1_w=3;
        $n_total_w=0;
        $total_all_w=0;
        for($i=-1; $i>= -3;$i--){
            $data['w'][]=$this->analyze_model->get_sell_w($product_id,$i)->row();
            $total_w[]=(@$data['w'][$n_w]->qty*($n1_w));
            $total_all_w+=$total_w[$n_w];
            $n_total_w+=$n1_w;
            $n1_w--;   
            $n_w++;   
     }
     $data['get_w'] = ceil($total_all_w /$n_total_w) ;
     //------------------------------ คำนวณรายสัปดาห์ 4เดือนย้อนหลัง--------------------------------------//    
     $n_m=0;
     $n1_m=4;
     $n_total_m=0;
     $total_all_m=0;
     for($i=-1; $i>= -4;$i--){
        $data['m'][]=$this->analyze_model->get_sell_m($product_id,$i)->row();
        $total_m[]=(@$data['m'][$n_m]->qty*($n1_m));
        $total_all_m+=$total_m[$n_m];
        $n_total_m+=$n1_m;
        $n1_m--;   
        $n_m++;
     }
     $data['get_m']=ceil($total_all_m /$n_total_m) ;
     $data['get_type']=$product_type;
     echo json_encode($data);
    }
}

?>