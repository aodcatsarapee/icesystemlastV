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
        $product_name= $product[2];
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
        $n1_w=4;
        $n_total_w=0;
        $total_all_w=0;
        for($i=-1; $i>= -4;$i--){
            $data['w'][]=$this->analyze_model->get_sell_w($product_id,$i)->row();
            $total_w[]=(@$data['w'][$n_w]->qty*($n1_w));
            $total_all_w+=$total_w[$n_w];
            $n_total_w+=$n1_w;
            $n1_w--;   
            $n_w++;   
     }
     $data['get_w'] = ceil($total_all_w /$n_total_w) ;
     //------------------------------ คำนวณรายสัปดาห์ 4สัปดาห์ย้อนหลัง--------------------------------------//    
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
     //------------------------------ คำนวณรายเดือน 4เดือนย้อนหลัง--------------------------------------//    

     //คำนวณตามฤดูกาล
     if(date('m')>= 2 && date('m')<= 5){
         //ผลิตสินค้าเพิ่มขึ้น 20 %
        $data['water'] = 'กำลังอยู่ในช่วงฤดูร้อนการผลิตสินค้าเพิ่มขึ้น 20 %';
         //d
         $water_d = (($data['get_d'])*0.20 );
         $data['get_d'] = ceil($data['get_d'] + $water_d);
         //w
         $water_w = (($data['get_w'])*0.20 );
         $data['get_w'] = ceil($data['get_w'] + $water_w);
         //m
         $water_m = (($data['get_m'])*0.20 );
         $data['get_m'] = ceil($data['get_m'] + $water_m);

     }elseif(date('m')>= 6 && date('m')<= 9){
        $data['water'] = 'กำลังอยู่ในช่วงฤดูฝนการผลิตสินค้าเท่าเดิม';
         //ผลิตสินค้าเท่าเดิม %
     }else{
         //ผลิตสินค้าลดลง 20 %
        $data['water'] = 'กำลังอยู่ในช่วงฤดูหนาวการผลิตสินค้าลดลง 20 %';
        //d
        $water_d = (($data['get_d'])*0.20 );
        $data['get_d'] = ceil($data['get_d'] - $water_d);
        //w
        $water_w = (($data['get_w'])*0.20 );
        $data['get_w'] = ceil($data['get_w'] - $water_w);
        //m
        $water_m = (($data['get_m'])*0.20 );
        $data['get_m'] = ceil($data['get_m'] - $water_m);
     }
     $data['get_type']=$product_type;
     $data['get_name']=$product_name;
     echo json_encode($data);
    }

    public function print_analyze()
    {
        $get_analyze= explode('-',$this->input->get('get_analyze'));

        $get_d = $get_analyze[0];
        $get_w = $get_analyze[1];
        $get_m = $get_analyze[2];
        $get_name = $get_analyze[3];
        $get_type = $get_analyze[4];
        
        $this->load->library('Pdf');
				$pdf = $this->pdf->loadPDFA5L();
				$pdf->AddPage();
				$pdf->SetTitle('รานยงานปริมาณที่เหมาะสมในการผลิต', 'isUTF8');
                $page = 1;
                $this->load->helper('Datethai');
				// setmargin left top right
				$pdf->SetMargins(10, 10, 10);
				// add font
				$pdf->AddFont('THSarabun', '', 'THSarabun.php');
                $pdf->AddFont('THSarabun', 'B', 'THSarabun Bold.php');
                
                //ข้อควาวม
				$pdf->SetFont('THSarabun', 'B', 25);
				$pdf->Ln();
				$pdf->SetX(3);
				$pdf->SetFillColor(222, 222, 222);
				$pdf->Cell(200, 10, iconv('UTF-8', 'cp874', 'ห้างหุ้นส่วนจำกัดโรงน้ำแข็งทวีชัย'), 0, 0, 'C');

				$pdf->SetFont('THSarabun', 'B', 16);
				$pdf->Ln();
				$pdf->SetX(3);
				$pdf->SetFillColor(222, 222, 222);
                $pdf->Cell(200, 10, iconv('UTF-8', 'cp874', 'รายยงาน '), 0, 0, 'C');
                
                $pdf->SetFont('THSarabun', 'B', 16);
				$pdf->Ln();
				$pdf->SetX(3);
				$pdf->SetFillColor(222, 222, 222);
                $pdf->Cell(200, 10, iconv('UTF-8', 'cp874','ข้อมูลปริมาณที่เหมาะสมในการผลิต('.$get_name.')'), 0, 0, 'C');
                
                $pdf->SetFont('THSarabun', 'B', 16);
				$pdf->Ln();
				$pdf->SetX(3);
				$pdf->SetFillColor(222, 222, 222);
				$pdf->Cell(200, 10, iconv('UTF-8', 'cp874', 'ณ วันที่ '.Datethai(date("d-m-Y"))), 0, 0, 'C');

				$pdf->SetFont('THSarabun', 'B', 14);
				$pdf->Ln();
				$pdf->SetX(3);
				$pdf->SetFillColor(222, 222, 222);
				$pdf->Cell(200, 10, iconv('UTF-8', 'cp874', '_______________________________________________________________________________________________ '), 0, 0, 'C');

                $pdf->SetFont('THSarabun', 'B', 16);
				$pdf->Ln();
				$pdf->SetX(15);
				$pdf->SetFillColor(222, 222, 222);
                $pdf->Cell(50, 65, iconv('UTF-8', 'cp874',''), 1, 0,'C');

                $pdf->SetX(75);
				$pdf->SetFillColor(222, 222, 222);
                $pdf->Cell(50, 65, iconv('UTF-8', 'cp874',''), 1, 0,'C');

                $pdf->SetX(140);
				$pdf->SetFillColor(222, 222, 222);
                $pdf->Cell(50, 65, iconv('UTF-8', 'cp874',''), 1, 0,'C');
                
				$pdf->SetFont('THSarabun', 'B', 14);
				$pdf->Ln();
				$pdf->SetX(3);
				$pdf->SetFillColor(222, 222, 222);
				$pdf->Cell(200, 1, iconv('UTF-8', 'cp874', '_______________________________________________________________________________________________ '), 0, 0, 'C');
                
                $pdf->SetFont('THSarabun', 'B', 20);
                $pdf->SetY(60);
                $pdf->SetX(28);
				$pdf->SetFillColor(222, 222, 222);
                $pdf->Cell(20, 10, iconv('UTF-8', 'cp874','รายวัน'), 0, 0,'C');

                $pdf->SetFont('THSarabun', 'B', 40);
                $pdf->SetY(82);
                $pdf->SetX(28);
				$pdf->SetFillColor(222, 222, 222);
                $pdf->Cell(20, 10, iconv('UTF-8', 'cp874',$get_d), 0, 0,'C');

                $pdf->SetFont('THSarabun', 'B', 20);
                $pdf->SetY(105);
                $pdf->SetX(28);
				$pdf->SetFillColor(222, 222, 222);
                $pdf->Cell(20, 10, iconv('UTF-8', 'cp874',$get_type), 0, 0,'C');

                
                $pdf->SetFont('THSarabun', 'B', 20);
                $pdf->SetY(60);
                $pdf->SetX(90);
				$pdf->SetFillColor(222, 222, 222);
                $pdf->Cell(20, 10, iconv('UTF-8', 'cp874','รายสัปดาห์'), 0, 0,'C');

                $pdf->SetFont('THSarabun', 'B', 40);
                $pdf->SetY(82);
                $pdf->SetX(90);
				$pdf->SetFillColor(222, 222, 222);
                $pdf->Cell(20, 10, iconv('UTF-8', 'cp874',$get_w), 0, 0,'C');

                $pdf->SetFont('THSarabun', 'B', 20);
                $pdf->SetY(105);
                $pdf->SetX(90);
				$pdf->SetFillColor(222, 222, 222);
                $pdf->Cell(20, 10, iconv('UTF-8', 'cp874',$get_type), 0, 0,'C');


                $pdf->SetFont('THSarabun', 'B', 20);
                $pdf->SetY(60);
                $pdf->SetX(155);
				$pdf->SetFillColor(222, 222, 222);
                $pdf->Cell(20, 10, iconv('UTF-8', 'cp874','รายเดือน'), 0, 0,'C');

                $pdf->SetFont('THSarabun', 'B', 40);
                $pdf->SetY(82);
                $pdf->SetX(155);
				$pdf->SetFillColor(222, 222, 222);
                $pdf->Cell(20, 10, iconv('UTF-8', 'cp874',$get_m), 0, 0,'C');

                $pdf->SetFont('THSarabun', 'B', 20);
                $pdf->SetY(105);
                $pdf->SetX(155);
				$pdf->SetFillColor(222, 222, 222);
                $pdf->Cell(20, 10, iconv('UTF-8', 'cp874',$get_type), 0, 0,'C');
                $pdf->Output();
    }
}

