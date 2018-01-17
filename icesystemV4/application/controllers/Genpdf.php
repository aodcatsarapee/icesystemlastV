<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
   
class Genpdf extends CI_Controller {  
     
    public function __construct()
    {
        parent::__construct();

        $this->load->library('Pdf');
    }  
 
    public function index()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('product');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค

$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center; " colspan="4" > <br><br> ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลสินค้า<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';
  $id_title ='รหัส';
  $name_title ='ชื่อ' ;
  $detail_title = 'รายละเอียด';
  $price_title = 'ราคา';
  
  // -----------------------------------------------------------------------------
  $tbl = $tbl .'<tr> 
          <th style="border: 1px solid #000000;  text-align:center;"><b>'.$id_title .'</b></th>
          <td  style="border: 1px solid #000000;  text-align:center;"><b>'.$name_title.'</b></td>
          <td width="35%" style="border: 1px solid #000000;  text-align:center;"><b>'.$detail_title.'</b></td>
          <td width="15%" style="border: 1px solid #000000;  text-align:center;"><b>'.$price_title.'</b></td>
      </tr>'; 

    $this->load->model('product_models');

    $products=$this->product_models->product_view();
    foreach ($products as $p) {
        # code...
     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$p['product_id'].'</td>
          <td style="border: 1px solid #000000;  text-align:center">'.$p['product_name'].'</td>
          <td  style="border: 1px solid #000000;  text-align:center">'.$p['product_detail'].'</td>
          <td style="border: 1px solid #000000;  text-align:center">'.$p['product_price'].' บาท</td>
      </tr>'; 


    }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');









    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('pay.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }

     public function amount()
    {
 
        
     // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('stock');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค

$this->load->helper('Datethai');

$id=$_GET['id'];

         $date_start= date($_GET['date_start']);

         $date_end= date($_GET['date_end']);


         $nice_date_start = date('d-m-Y', strtotime($date_start));

         $nice_date_end = date('d-m-Y', strtotime($date_end));
$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลการผลิตสินค้า<br>ระหว่างวันที่ '.Datethai($nice_date_start) .' ถึงวันที่ '.Datethai($nice_date_end).'</th>

                   </tr> ';


  // ถึงวันที่ '.$nice_date_end
   
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <tr>
  

          <th width="30%" style="border: 1px solid #000000;  text-align:center;"><b>รหัสสินค้า</b></th>
          <th width="50%" style="border: 1px solid #000000;  text-align:center;"><b>ชื่อสินค้า</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>จำนวน</b></th>

      </tr>'; 

        

          $this->load->model('Genpdf_models');

        $stock=$this->Genpdf_models->get_amount_detail($id,$date_start,$date_end);


        foreach ($stock as $s) {

      $date=date_create($s['stock_detail_date']);
      $date_format = date_format($date,"d/m/Y");
           
        # code...
     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['product_id'].'</td>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['stock_product_name'].'</td>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['amount']." ".$s['stock_product_type'].'</td>

      </tr>'; 

    }
      
  $tbl = $tbl . '</table>';


  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('amount_detail.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 

    }

     public function stock()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('stock');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลสินค้าคงเหลือ<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';

  $id_title ='รหัส';
  $name_title ='ชื่อ' ;
  $price_title = 'ราคา';
  $prodcut_amount_title = 'สินค้าคงเหลือ';
  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <tr>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>'.$id_title .'</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>'.$name_title.'</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>'.$price_title.'</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>'.$prodcut_amount_title.'</b></th>
           <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>สินค้าจากการสั่งซื้อคงเหลือ</b></th>
      </tr>'; 

    $this->load->model('product_models');

    $products=$this->product_models->product_view();
    foreach ($products as $p) {
        # code...
     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$p['product_id'].'</td>
          <td style="border: 1px solid #000000;  text-align:center">'.$p['product_name'].'</td>
          <td style="border: 1px solid #000000;  text-align:center">'.$p['product_price'].' บาท</td>
          <td  style="border: 1px solid #000000;  text-align:center">'.$p['product_amount']." ".$p['product_type'].'</td>
           <td  style="border: 1px solid #000000;  text-align:center">'.$p['product_amount_order']." ".$p['product_type'].'</td>
      </tr>'; 


    }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');









    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }

 //============================================================+
// report produce list วัน
//============================================================+  


     public function produce_m()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('stock');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลการผลิตสินค้ารายวัน<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';
  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <tr>
          <th width="30%" style="border: 1px solid #000000;  text-align:center;"><b>รหัสสินค้า</b></th>
          <th width="50%" style="border: 1px solid #000000;  text-align:center;"><b>ชื่อสินค้า</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>จำนวน</b></th>
           
      </tr>';

$this->load->model('produce_product_models');

    $stock=$this->produce_product_models->stock_view_dd();

    foreach ($stock as $s) {

 $tbl .= '

       <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['product_id'].'</td>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['stock_product_name'].'</td>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['amount'].'</td>
      </tr>';
}
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');









    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }


//============================================================+
// report produce list เดือน
//============================================================+  

     public function produce_d()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('stock');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลการผลิตสินค้ารายเดือน<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <tr>
             <th width="30%" style="border: 1px solid #000000;  text-align:center;"><b>รหัสสินค้า</b></th>
             <th width="50%" style="border: 1px solid #000000;  text-align:center;"><b>ชื่อสินค้า</b></th>
            <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>จำนวน</b></th>
      </tr>'; 

    $this->load->model('produce_product_models');


    $stock=$this->produce_product_models->stock_view_d();

    foreach ($stock as $s) {


     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['product_id'].'</td>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['stock_product_name'].'</td>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['amount'].'</td>
      </tr>'; 

    }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');



    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }

//============================================================+
// report produce list ปี
//============================================================+  


         public function produce_y()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('stock');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลการผลิตสินค้ารายปี<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <tr>
             <th width="30%" style="border: 1px solid #000000;  text-align:center;"><b>รหัสสินค้า</b></th>
             <th width="50%" style="border: 1px solid #000000;  text-align:center;"><b>ชื่อสินค้า</b></th>
            <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>จำนวน</b></th>
      </tr>'; 

    $this->load->model('produce_product_models');


    $stock=$this->produce_product_models->stock_view_y();

    foreach ($stock as $s) {


     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['product_id'].'</td>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['stock_product_name'].'</td>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['amount'].'</td>
      </tr>'; 

    }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');









    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }

  public function produce_all()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('stock');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลการผลิตสินค้าทั้งหมด<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <tr>
             <th width="30%" style="border: 1px solid #000000;  text-align:center;"><b>รหัสสินค้า</b></th>
             <th width="50%" style="border: 1px solid #000000;  text-align:center;"><b>ชื่อสินค้า</b></th>
            <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>จำนวน</b></th>
      </tr>'; 

    $this->load->model('produce_product_models');


    $stock=$this->produce_product_models->stock_view_all();

    foreach ($stock as $s) {


     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['product_id'].'</td>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['stock_product_name'].'</td>
          <td style="border: 1px solid #000000;  text-align:center; ">'.$s['amount'].'</td>
      </tr>'; 

    }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');









    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }
//============================================================+
// Show_order
//============================================================+
    public function show_order_d()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('sell_detail');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage('L', 'A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลการขายสินค้ารายวัน<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <thead> <tr>
          <th  width="25%" style="border: 1px solid #000000;  text-align:center;"><b> รหัสการขายสินค้า </b></th>
          <th width="25%"  style="border: 1px solid #000000;  text-align:center;"><b>ราคารวม</b></th>
          <th width="25%" style="border: 1px solid #000000;  text-align:center;"><b>สถานะ</b></th>
          <th width="25%" style="border: 1px solid #000000;  text-align:center;"><b>เวลา</b></th>
          
      </tr> </thead>'; 

    $this->load->model('Billing_model');

    $orders=$this->Billing_model->orders();

    foreach ($orders as $order) {
        # code...
      $date=date_create($order['sell_detail_date']);
      $date_format = date_format($date,"H:i:s");


     $tbl = $tbl . ' <tr nobr="true">
          <td style="border: 1px solid #000000;  text-align:center; ">'.$order['sell_detail_id'].'</td>
          <td style="border: 1px solid #000000;  text-align:center">'.$order['sell_detail_total'].' บาท</td>
          <td style="border: 1px solid #000000;  text-align:center">'.$order['sell_detail_status'].' </td>
          <td style="border: 1px solid #000000;  text-align:center">'.$date_format.' </td>
          
      </tr>


      '; 

    }

       if(count($orders)==0){


     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> 0 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> -</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>

      '; 
                 
        }else{
            $total1=0;
                foreach ($orders as $key => $value) {

                    $total1+=$value['sell_detail_total'];

                    if ($value === end($orders)) {
        
     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> '.$total1.'.00 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> -</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>';
                                  
                        }
                  }
             }


  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');









    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }
     public function show_order_m()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('sell_detail');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage('L', 'A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลการขายสินค้ารายเดือน<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <thead><tr>
          <th  width="25%" style="border: 1px solid #000000;  text-align:center;"><b> รหัสการขายสินค้า </b></th>
          <th width="25%"  style="border: 1px solid #000000;  text-align:center;"><b>ราคารวม</b></th>
          <th width="25%" style="border: 1px solid #000000;  text-align:center;"><b>สถานะ</b></th>
          <th width="25%" style="border: 1px solid #000000;  text-align:center;"><b>ว/ด/ปี</b></th>
          
      </tr> </thead>'; 

    $this->load->model('Billing_model');

    $orders=$this->Billing_model->orders_m();

    foreach ($orders as $order) {
        # code...
     $date=date_create($order['sell_detail_date']);
      $date_format = date_format($date,"d-m-Y");

      $tbl = $tbl . ' <tr nobr="true">
      <td style="border: 1px solid #000000;  text-align:center; ">'.$order['sell_detail_id'].'</td>
      <td style="border: 1px solid #000000;  text-align:center">'.$order['sell_detail_total'].' บาท</td>
      <td style="border: 1px solid #000000;  text-align:center">'.$order['sell_detail_status'].' </td>
      <td style="border: 1px solid #000000;  text-align:center">'.Datethai($date_format).' </td>
      
  </tr>


  '; 



    }

    if(count($orders)==0){


     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> 0 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> -</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>

      '; 
                 
        }else{
            $total1=0;
                foreach ($orders as $key => $value) {

                    $total1+=$value['sell_detail_total'];

                    if ($value === end($orders)) {
        
     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> '.$total1.'.00 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> -</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>';
                                  

                        }
                  }
             }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');









    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }
     public function show_order_y()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('sell_detail');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
       $pdf->AddPage('L', 'A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลการขายสินค้ารายปี<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <thead> <tr>
          <th  width="25%" style="border: 1px solid #000000;  text-align:center;"><b> รหัสการขายสินค้า </b></th>
          <th width="25%"  style="border: 1px solid #000000;  text-align:center;"><b>ราคารวม</b></th>
          <th width="25%" style="border: 1px solid #000000;  text-align:center;"><b>สถานะ</b></th>
          <th width="25%" style="border: 1px solid #000000;  text-align:center;"><b>ว/ด/ปี</b></th>
          
      </tr> </thead>'; 

    $this->load->model('Billing_model');

    $orders=$this->Billing_model->orders_y();

    foreach ($orders as $order) {
        # code...
      $date=date_create($order['sell_detail_date']);
      $date_format = date_format($date,"d-m-Y");


     $tbl = $tbl . ' <tr nobr="true">
          <td style="border: 1px solid #000000;  text-align:center; ">'.$order['sell_detail_id'].'</td>
          <td style="border: 1px solid #000000;  text-align:center">'.$order['sell_detail_total'].' บาท</td>
          <td style="border: 1px solid #000000;  text-align:center">'.$order['sell_detail_status'].' </td>
          <td style="border: 1px solid #000000;  text-align:center">'.Datethai($date_format).' </td>
          
      </tr>'; 


    }
    if(count($orders)==0){


     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> 0 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> -</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>

      '; 
                 
        }else{
            $total1=0;
                foreach ($orders as $key => $value) {

                    $total1+=$value['sell_detail_total'];

                    if ($value === end($orders)) {
        
     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> '.$total1.'.00 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> -</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>';
                                  

                        }
                  }
             }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }
      public function show_order_all()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('sell_detail');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
       $pdf->AddPage('L', 'A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
              
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลการขายสินค้าทั้งหมด<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> 

                   ';


  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . '<thead> <tr>
          <th  width="25%" style="border: 1px solid #000000;  text-align:center;"><b> รหัสการขายสินค้า </b></th>
          <th width="25%"  style="border: 1px solid #000000;  text-align:center;"><b>ราคารวม</b></th>
          <th width="25%" style="border: 1px solid #000000;  text-align:center;"><b>สถานะ</b></th>
          <th width="25%" style="border: 1px solid #000000;  text-align:center;"><b>ว/ด/ปี</b></th>
          
      </tr>  </thead>'; 

    $this->load->model('Billing_model');

    $orders=$this->Billing_model->orders_all();

    foreach ($orders as $order) {
        # code...
      $date=date_create($order['sell_detail_date']);
      $date_format = date_format($date,"d-m-Y");


     $tbl = $tbl . ' <tr nobr="true">
          <td style="border: 1px solid #000000;  text-align:center; ">'.$order['sell_detail_id'].'</td>
          <td style="border: 1px solid #000000;  text-align:center">'.$order['sell_detail_total'].' บาท</td>
          <td style="border: 1px solid #000000;  text-align:center">'.$order['sell_detail_status'].' </td>
          <td style="border: 1px solid #000000;  text-align:center">'.Datethai($date_format).' </td>
          
      </tr>'; 


    }
    if(count($orders)==0){


     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> 0 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> -</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>

      '; 
                 
        }else{
            $total1=0;
                foreach ($orders as $key => $value) {

                    $total1+=$value['sell_detail_total'];

                    if ($value === end($orders)) {
        
     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> '.$total1.'.00 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> -</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>';
                                  

                        }
                  }
             }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }
  public function show_order_all_1()
    {
 
        
     // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('stock');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
       $pdf->AddPage('L', 'A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค


$this->load->helper('Datethai');  
$id=$_GET['id'];

         $date_start= date($_GET['date_start']);

         $date_end= date($_GET['date_end']);


         $nice_date_start = date('d-m-Y', strtotime($date_start));

         $nice_date_end = date('d-m-Y', strtotime($date_end));
$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br>  ข้อมูลการขายสินค้า<br>ระหว่างวันที่ '.Datethai($nice_date_start) .' ถึงวันที่ '.Datethai($nice_date_end).'</th>

                   </tr> ';


  // ถึงวันที่ '.$nice_date_end
   
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <thead> <tr> 
  

          <th  width="25%" style="border: 1px solid #000000;  text-align:center;"><b> รหัสการขายสินค้า </b></th>
          <th width="25%"  style="border: 1px solid #000000;  text-align:center;"><b>ราคารวม</b></th>
          <th width="25%" style="border: 1px solid #000000;  text-align:center;"><b>สถานะ</b></th>
          <th width="25%" style="border: 1px solid #000000;  text-align:center;"><b>ว/ด/ปี</b></th>

      </tr> </thead>'; 

        

          $this->load->model('Genpdf_models');

        $orders=$this->Genpdf_models->show_order_all_1($id,$date_start,$date_end);


        foreach ($orders as $order) {

      $date=date_create($order['sell_detail_date']);
      $date_format = date_format($date,"d-m-Y");
           
        # code...
     $tbl = $tbl . ' <tr nobr="true">
          <td style="border: 1px solid #000000;  text-align:center; ">'.$order['sell_detail_id'].'</td>
          <td style="border: 1px solid #000000;  text-align:center">'.$order['sell_detail_total'].' บาท</td>
          <td style="border: 1px solid #000000;  text-align:center">'.$order['sell_detail_status'].' </td>
          <td style="border: 1px solid #000000;  text-align:center">'.Datethai($date_format).' </td>

      </tr>'; 

    }
    if(count($orders)==0){


     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> 0 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> -</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>

      '; 
                 
        }else{
            $total1=0;
                foreach ($orders as $key => $value) {

                    $total1+=$value['sell_detail_total'];

                    if ($value === end($orders)) {
        
     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> '.$total1.' บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> -</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>';
                                  

                        }
                  }
             }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('amount_detail.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 

  }
      public function print_sell()

      {
          // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('sell');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค


         $this->load->model('Billing_model');



        $orders=$this->Billing_model->get_sell();

        $sell_details=$this->Billing_model->select_order_for_show_sell($orders['sell_detail_id']);
        $this->load->helper('Datethai');
         $date=date_create($orders['sell_detail_date']);
      $date_format = date_format($date,"d-m-Y H:i");


$html ='


            <div style="text-align:center; font-size:30px;"><b>ใบเสร็จรับเงิน</b></div>

      ห้างหุ่นส่วนจำกัด โรงน้ำเเข็งธวีชัย &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เลขที่ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$orders['sell_detail_id'].'<br>
      ที่อยู่  295/1 ถนนแก้วนวรัฐ ตำบลวัดเกต &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.Datethai($date_format).' 
      <br>  อำเภอเมืองเชียงใหม่ จังหวัด เชียงใหม่ 50000  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลูกค้า &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -<br>

      โทรศัพท์ 0-5324-5492<br>

';
    
    $html .='

            <table cellspacing="0" cellpadding="4" >
                   <tr>
                        <th  width="13%" style="text-align: center;border-top: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;" ><b>รหัสสินค้า</b></th>
                        <th  width="50%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>ชื่อสินค้า</b></th>
                        <th  width="10%"style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>จำนวน</b></th>
                        <th width="15%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>ราคา/หน่วย</b></th>
                        <th width="15%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;" ><b>รวม</b></th>

                   </tr> 

          ';
          

          foreach ($sell_details as $sell_detail) {
            # code...
          $html .='

                   <tr>

                        <td style="text-align: center; border-left: 1px solid black;">'.$sell_detail['product_id'].'</td>
                        <td style="text-align: center;">'.$sell_detail['product_name'].'</td>
                        <td style="text-align: center;">'.$sell_detail['sell_product_quantity'].' </td>
                        <td style="text-align: center;">'.$sell_detail['sell_product_price'].'.00</td>
                        <td style="text-align: center;border-right: 1px solid black;">'.$sell_detail['sell_product_quantity']*$sell_detail['sell_product_price'].'.00</td>
                   </tr>
    ';

     }





    $html .='
                    <tr>

                        <td style="text-align: center; border-bottom: 1px solid black;border-left: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black;"></td>
                   </tr>


                        <tr>  
                          <td colspan="3" style="border-left: 1px solid black;"></td> 
                         <td >รวมทั้งหมด</td>
                         <td style="text-align: center;border-right: 1px solid black;">'.$orders['sell_detail_total'].'</td>
                    </tr>
                    <tr>  
                          <td colspan="3" style="border-left: 1px solid black;"></td> 
                         <td  st>เงินสด</td>
                         <td style="text-align: center;border-right: 1px solid black;">'.$orders['sell_detail_received'].'</td>
                    </tr>
                     <tr>   
                          <td colspan="3" style="border-left: 1px solid black;border-bottom: 1px solid black;"></td> 
                         <td  style="border-bottom: 1px solid black;" >เงินทอน</td>
                         <td style="text-align: center;border-bottom: 1px solid black;border-right: 1px solid black;">'.$orders['sell_detail_change_sell'].'</td>
                    </tr>



    </table>
                                          <br>

                                    <div style="text-align:center;">----------------------ขอบคุณที่ใช้บริการ------------------</div>

    ';


  $pdf->writeHTML($html, true, false, false, false, '');



    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('pay.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

 }

public function print_sell_debtor_1()

      {
          // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('sell');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค

              $result =$_GET['name'];

                      $result_explode= explode('-', $result);

                       $order_id= $result_explode[0]; 

                       $name= $result_explode[1];




         $this->load->model('Billing_model');


         $orders=$this->Billing_model->get_sell();
         
                 $sell_details=$this->Billing_model->select_order_for_show_sell($orders['sell_detail_id']);
                 $this->load->helper('Datethai');
                  $date=date_create($orders['sell_detail_date']);
               $date_format = date_format($date,"d-m-Y H:i");

$html ='


            <div style="text-align:center; font-size:30px;"><b>ใบเเจ้งชำระหนี้</b></div>

     ห้างหุ่นส่วนจำกัด โรงน้ำเเข็งธวีชัย &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เลขที่ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$orders['sell_detail_id'].'<br>
      ที่อยู่  295/1 ถนนแก้วนวรัฐ ตำบลวัดเกต &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.Datethai($date_format).' 
      <br>  อำเภอเมืองเชียงใหม่ จังหวัด เชียงใหม่ 50000  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลูกหนี้ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$name.'<br>

      โทรศัพท์ 0-5324-5492<br>

';
    
    $html .='

            <table cellspacing="0" cellpadding="4" >
                   <tr>
                        <th  width="13%" style="text-align: center;border-top: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;" ><b>รหัสสินค้า</b></th>
                        <th  width="50%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>ชื่อสินค้า</b></th>
                        <th  width="10%"style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>จำนวน</b></th>
                        <th width="15%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>ราคา/หน่วย</b></th>
                        <th width="15%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;" ><b>รวม</b></th>

                   </tr> 

          ';
          

          foreach ($sell_details as $sell_detail) {
            # code...
          $html .='

          <tr>
          
                                  <td style="text-align: center; border-left: 1px solid black;">'.$sell_detail['product_id'].'</td>
                                  <td style="text-align: center;">'.$sell_detail['product_name'].'</td>
                                  <td style="text-align: center;">'.$sell_detail['sell_product_quantity'].' </td>
                                  <td style="text-align: center;">'.$sell_detail['sell_product_price'].'</td>
                                  <td style="text-align: center;border-right: 1px solid black;">'.$sell_detail['sell_product_quantity']*$sell_detail['sell_product_price'].'.00</td>
                             </tr>
    ';

     }





    $html .='
                    <tr>

                        <td style="text-align: center; border-bottom: 1px solid black;border-left: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black;"></td>
                   </tr>
                     <tr>   
                          <td colspan="3" style="border-left: 1px solid black;border-bottom: 1px solid black;"></td> 
                         <td  style="border-bottom: 1px solid black;" >รวมทั้งหมด</td>
                         <td style="text-align: center;border-bottom: 1px solid black;border-right: 1px solid black;">'.$orders['sell_detail_total'].'</td>
                    </tr>



    </table>
                                          <br>

                                    <div style="text-align:center;">----------------------ขอบคุณที่ใช้บริการ------------------</div>

    ';


  $pdf->writeHTML($html, true, false, false, false, '');



    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('pay.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

 }

 public function print_sell_id()

      {
         
             // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('product');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค


        $result =$_GET['id'];

        $result_explode= explode('-', $result);

         $order_id= $result_explode[0]; 

         $fname= $result_explode[1];

          $lname= $result_explode[2];


         $this->load->model('Billing_model');

        $orders=$this->Billing_model->get_sell_id($order_id);

        $sell_details=$this->Billing_model->select_order_for_show_sell($orders['sell_detail_id']);
        $this->load->helper('Datethai');

        $date=date_create($orders['sell_detail_date']);
      $date_format = date_format($date,"d-m-Y H:i");

$html ='


            <div style="text-align:center; font-size:30px;"><b>ใบเสร็จรับเงิน</b></div>

      ห้างหุ่นส่วนจำกัด โรงน้ำเเข็งธวีชัย &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เลขที &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$orders['sell_detail_id'].'<br>
      ที่อยู่  295/1 ถนนแก้วนวรัฐ ตำบลวัดเกต &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.Datethai($date_format).' 
      <br>  อำเภอเมืองเชียงใหม่ จังหวัด เชียงใหม่ 50000  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลูกค้า &nbsp;&nbsp;&nbsp;&nbsp; '. $fname.' '. $lname.'<br>

      โทรศัพท์ 0-5324-5492<br>

';
    
    $html .='

            <table cellspacing="0" cellpadding="4" >
                   <tr>
                        <th  width="13%" style="text-align: center;border-top: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;" ><b>รหัสสินค้า</b></th>
                        <th  width="50%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>ชื่อสินค้า</b></th>
                        <th  width="10%"style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>จำนวน</b></th>
                        <th width="15%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>ราคา/หน่วย</b></th>
                        <th width="15%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;" ><b>รวม</b></th>

                   </tr> 

          ';
          

          foreach ($sell_details as $sell_detail) {
            # code...
          $html .='

                   <tr>

                        <td style="text-align: center; border-left: 1px solid black;">'.$sell_detail['product_id'].'</td>
                        <td style="text-align: center;">'.$sell_detail['product_name'].'</td>
                        <td style="text-align: center;">'.$sell_detail['sell_product_quantity'].' </td>
                        <td style="text-align: center;">'.$sell_detail['sell_product_price'].'</td>
                        <td style="text-align: center;border-right: 1px solid black;">'.$sell_detail['sell_product_quantity']*$sell_detail['sell_product_price'].'.00</td>
                   </tr>
    ';

     }





    $html .='
                    <tr>

                        <td style="text-align: center; border-bottom: 1px solid black;border-left: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black;"></td>
                   </tr>


                        <tr>  
                          <td colspan="3" style="border-left: 1px solid black;"></td> 
                         <td >รวมทั้งหมด</td>
                         <td style="text-align: center;border-right: 1px solid black;">'.$orders['sell_detail_total'].'</td>
                    </tr>
                    <tr>  
                          <td colspan="3" style="border-left: 1px solid black;"></td> 
                         <td  st></td>
                         <td style="text-align: center;border-right: 1px solid black;">  </td>
                    </tr>
                     <tr>   
                          <td colspan="3" style="border-left: 1px solid black;border-bottom: 1px solid black;"></td> 
                         <td  style="border-bottom: 1px solid black;" ></td>
                         <td style="text-align: center;border-bottom: 1px solid black;border-right: 1px solid black;"></td>
                    </tr>



    </table>
                                          <br>

                                    <div style="text-align:center;">----------------------ขอบคุณที่ใช้บริการ------------------</div>

    ';


  $pdf->writeHTML($html, true, false, false, false, '');



    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('pay.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
    }
public function print_sell_id_1()

      {
         
             // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('product');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค


        $order_id =$_GET['id'];
 
         $this->load->model('Billing_model');
        $orders=$this->Billing_model->get_sell_id($order_id);

        $sell_details=$this->Billing_model->select_order_for_show_sell($orders['sell_detail_id']);
        $this->load->helper('Datethai');
        $date=date_create($orders['sell_detail_date']);
      $date_format = date_format($date,"d-m-Y H:i");

      
              


$html ='


            <div style="text-align:center; font-size:30px;"><b>ใบเสร็จรับเงิน</b></div>

     ห้างหุ่นส่วนจำกัด โรงน้ำเเข็งธวีชัย &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เลขที่ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$orders['sell_detail_id'].'<br>
      ที่อยู่  295/1 ถนนแก้วนวรัฐ ตำบลวัดเกต &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.Datethai($date_format).' 
      <br>  อำเภอเมืองเชียงใหม่ จังหวัด เชียงใหม่ 50000  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลูกค้า &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -<br>

      โทรศัพท์ 0-5324-5492<br>

';
    
    $html .='

            <table cellspacing="0" cellpadding="4" >
                   <tr>
                        <th  width="13%" style="text-align: center;border-top: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;" ><b>รหัสสินค้า</b></th>
                        <th  width="50%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>ชื่อสินค้า</b></th>
                        <th  width="10%"style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>จำนวน</b></th>
                        <th width="15%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>ราคา/หน่วย</b></th>
                        <th width="15%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;" ><b>รวม</b></th>

                   </tr> 

          ';
          

          foreach ($sell_details as $sell_detail) {
            # code...
          $html .='

                  <tr>
          
                                  <td style="text-align: center; border-left: 1px solid black;">'.$sell_detail['product_id'].'</td>
                                  <td style="text-align: center;">'.$sell_detail['product_name'].'</td>
                                  <td style="text-align: center;">'.$sell_detail['sell_product_quantity'].' </td>
                                  <td style="text-align: center;">'.$sell_detail['sell_product_price'].'</td>
                                  <td style="text-align: center;border-right: 1px solid black;">'.$sell_detail['sell_product_quantity']*$sell_detail['sell_product_price'].'.00</td>
                             </tr>
    ';

     }





    $html .='
                    <tr>

                        <td style="text-align: center; border-bottom: 1px solid black;border-left: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black;"></td>
                   </tr>


                        <tr>  
                          <td colspan="3" style="border-left: 1px solid black;"></td> 
                         <td >รวมทั้งหมด</td>
                         <td style="text-align: center;border-right: 1px solid black;">'.$orders['sell_detail_total'].'</td>
                    </tr>
                    <tr>  
                          <td colspan="3" style="border-left: 1px solid black;"></td> 
                         <td  st>เงินสด</td>
                         <td style="text-align: center;border-right: 1px solid black;">'.$orders['sell_detail_received'].'</td>
                    </tr>
                     <tr>   
                          <td colspan="3" style="border-left: 1px solid black;border-bottom: 1px solid black;"></td> 
                         <td  style="border-bottom: 1px solid black;" >เงินทอน</td>
                         <td style="text-align: center;border-bottom: 1px solid black;border-right: 1px solid black;">'.$orders['sell_detail_change_sell'].'</td>
                    </tr>



    </table>
                                          <br>

                                    <div style="text-align:center;">----------------------ขอบคุณที่ใช้บริการ------------------</div>

    ';


  $pdf->writeHTML($html, true, false, false, false, '');



    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('pay.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
    }


      public function print_sell_debtor()

      {
          
 
             // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('product');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค

        $this->load->helper('Datethai');    
        $result =$_GET['id'];

        $result_explode= explode('-', $result);

         $order_id= $result_explode[0]; 

         $fname= $result_explode[1];

          $lname= $result_explode[2];


         $this->load->model('Billing_model');

         $orders=$this->Billing_model->get_sell_id($order_id);
         
                 $sell_details=$this->Billing_model->select_order_for_show_sell($orders['sell_detail_id']);
                 $this->load->helper('Datethai');
                 $date=date_create($orders['sell_detail_date']);
               $date_format = date_format($date,"d-m-Y H:i");


$html ='


            <div style="text-align:center; font-size:30px;"><b>ใบเเจ้งชำระหนี้</b></div>

     ห้างหุ่นส่วนจำกัด โรงน้ำเเข็งธวีชัย &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เลขที่ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$orders['sell_detail_id'].'<br>
      ที่อยู่  295/1 ถนนแก้วนวรัฐ ตำบลวัดเกต &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.Datethai($date_format).' 
      <br>  อำเภอเมืองเชียงใหม่ จังหวัด เชียงใหม่ 50000  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลูกหนี้ &nbsp;&nbsp;&nbsp;&nbsp; '. $fname.' '. $lname.'<br>

      โทรศัพท์ 0-5324-5492<br>

';
    
    $html .='

            <table cellspacing="0" cellpadding="4" >
                   <tr>
                        <th  width="13%" style="text-align: center;border-top: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;" ><b>รหัสสินค้า</b></th>
                        <th  width="50%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>ชื่อสินค้า</b></th>
                        <th  width="10%"style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>จำนวน</b></th>
                        <th width="15%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>ราคา/หน่วย</b></th>
                        <th width="15%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;" ><b>รวม</b></th>

                   </tr> 

          ';
          

          foreach ($sell_details as $sell_detail) {
            # code...
          $html .='

                   <tr>
          
                                  <td style="text-align: center; border-left: 1px solid black;">'.$sell_detail['product_id'].'</td>
                                  <td style="text-align: center;">'.$sell_detail['product_name'].'</td>
                                  <td style="text-align: center;">'.$sell_detail['sell_product_quantity'].' </td>
                                  <td style="text-align: center;">'.$sell_detail['sell_product_price'].'</td>
                                  <td style="text-align: center;border-right: 1px solid black;">'.$sell_detail['sell_product_quantity']*$sell_detail['sell_product_price'].'.00</td>
                             </tr>
    ';

     }





    $html .='
                    <tr>

                        <td style="text-align: center; border-bottom: 1px solid black;border-left: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black;"></td>
                   </tr>
  
                   
                     <tr>   
                          <td colspan="3" style="border-left: 1px solid black;border-bottom: 1px solid black;"></td> 
                         <td  style="border-bottom: 1px solid black;" >รวมทั้งหมด</td>
                         <td style="text-align: center;border-bottom: 1px solid black;border-right: 1px solid black;">'.$orders['sell_detail_total'].'</td>
                    </tr>



    </table>
                                          <br>

                                    <div style="text-align:center;">----------------------ขอบคุณที่ใช้บริการ------------------</div>

    ';


  $pdf->writeHTML($html, true, false, false, false, '');



    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('pay.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
      }


    public function update_debtor()
    {
     

          $result =$_GET['id'];
          
          $result_explode= explode('-', $result);
          
          $debtor_id= $result_explode[0]; 
          
          $sell_id= $result_explode[1];
          
          $fname= $result_explode[2];
          
          $lname= $result_explode[3];

          $total= $result_explode[4];


        $ar = array(

              "debtor_status" => "ชำระเงินเเล้ว",
              "debtor_datasave" => date("Y-m-d H:i:s"),
          );


        $this->load->model('Debtor_model');

        $orders=$this->Debtor_model->update_debtor($debtor_id,$ar);

        $account = array(

        "sell_id"          => $sell_id,
        "account_detail"   =>'ได้รับการชำระเงินจากลูกหนี้ชื่อ '.$fname." ".$lname,
        "account_income"   => $total,
        "account_type"     => 'รายรับจากการชำระหนี้',
        "account_datasave" => date('Y-m-d H:i:s')
        );

        $this->db->insert('account',$account);

        $order = array(

         'sell_detail_date'        => date('Y-m-d H:i:s'),
         'sell_detail_pay_status'  =>'ชำระเงินเเล้ว',
      );  

      $this->db->where('sell_detail_id', $sell_id);
      $this->db->update('sell_detail', $order);
     

 $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('product');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค


         

         $this->load->model('Billing_model');

        $orders=$this->Billing_model->get_sell_id($sell_id);

        $sell_details=$this->Billing_model->select_order_for_show_sell($orders['sell_detail_id']);

        $this->load->helper('Datethai');
        $date=date_create($orders['sell_detail_date']);
      $date_format = date_format($date,"d-m-Y H:i");

$html ='


            <div style="text-align:center; font-size:30px;"><b>ใบเสร็จรับเงิน</b></div>

     ห้างหุ่นส่วนจำกัด โรงน้ำเเข็งธวีชัย &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เลขที่ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$orders['sell_detail_id'].'<br>
      ที่อยู่  295/1 ถนนแก้วนวรัฐ ตำบลวัดเกต &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.Datethai($date_format).' 
      <br>  อำเภอเมืองเชียงใหม่ จังหวัด เชียงใหม่ 50000  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลูกค้า &nbsp;&nbsp;&nbsp;&nbsp; '. $fname.' '. $lname.'<br>

      โทรศัพท์ 0-5324-5492<br>

';
    
    $html .='

            <table cellspacing="0" cellpadding="4" >
                   <tr>
                        <th  width="13%" style="text-align: center;border-top: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;" ><b>รหัสสินค้า</b></th>
                        <th  width="50%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>ชื่อสินค้า</b></th>
                        <th  width="10%"style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>จำนวน</b></th>
                        <th width="15%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;"><b>ราคา/หน่วย</b></th>
                        <th width="15%" style="text-align: center;border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;" ><b>รวม</b></th>

                   </tr> 

          ';
          

          foreach ($sell_details as $sell_detail) {
            # code...
          $html .='

                   <tr>

                        <td style="text-align: center; border-left: 1px solid black;">P'.$sell_detail['product_id'].'</td>
                        <td style="text-align: center;">'.$sell_detail['product_name'].'.</td>
                        <td style="text-align: center;">'.$sell_detail['sell_product_quantity'].' </td>
                        <td style="text-align: center;">'.$sell_detail['sell_product_price'].'</td>
                        <td style="text-align: center;border-right: 1px solid black;">'.$sell_detail['sell_product_quantity']*$sell_detail['sell_product_price'].'.00</td>
                   </tr>
    ';

     }





    $html .='
                    <tr>

                        <td style="text-align: center; border-bottom: 1px solid black;border-left: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-bottom: 1px solid black;"></td>
                        <td style="text-align: center;border-right: 1px solid black;border-bottom: 1px solid black;"></td>
                   </tr>


                        <tr>  
                          <td colspan="3" style="border-left: 1px solid black;"></td> 
                         <td >รวมทั้งหมด</td>
                         <td style="text-align: center;border-right: 1px solid black;">'.$orders['sell_detail_total'].'</td>
                    </tr>
                    <tr>  
                          <td colspan="3" style="border-left: 1px solid black;"></td> 
                         <td  st></td>
                         <td style="text-align: center;border-right: 1px solid black;"></td>
                    </tr>
                     <tr>   
                          <td colspan="3" style="border-left: 1px solid black;border-bottom: 1px solid black;"></td> 
                         <td  style="border-bottom: 1px solid black;" ></td>
                         <td style="text-align: center;border-bottom: 1px solid black;border-right: 1px solid black;"></td>
                    </tr>



    </table>
                                          <br>

                                    <div style="text-align:center;">----------------------ขอบคุณที่ใช้บริการ------------------</div>

    ';


  $pdf->writeHTML($html, true, false, false, false, '');



    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('pay.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+



    }
// ------------พิมพ์ข้อมูลลูกหนี้--------------------------------------------------------------------------------

          public function debtor()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('sell_detail');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage('L', 'A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลลูกหนี้ค้างชำระ<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <thead><tr>
          <th  width="20%" style="border: 1px solid #000000;  text-align:center;"><b> รหัสลูกหนั้</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>ชื่อลูกหนี้</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>จำนวนเงิน</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>สถานะ</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>ว/ด/ปี</b></th>
          
      </tr></thead>'; 

    $this->load->model('Debtor_model');

    $debtors=$this->Debtor_model->debtor_view();

    foreach ($debtors as $debtor) {
        # code...
      $date=date_create($debtor['debtor_datasave']);
      $date_format = date_format($date,"d-m-Y");


     $tbl = $tbl . ' <tr nobr="true">
          <td width="20%" style="border: 1px solid #000000;  text-align:center; ">'.$debtor['debtor_id'].'</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center">'.$debtor['customer_fname'].' '.$debtor['customer_lname'].'</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center">'.$debtor['price_total'].' บาท</td>
          <td width="20%"  style="border: 1px solid #000000;  text-align:center">'.$debtor['debtor_status'].' </td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center">'.Datethai($date_format).' </td>
          
      </tr>'; 


    }

    if(count($debtors)==0){


     $tbl = $tbl . ' <tr>
          <td width="20%" style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> 0 บาท</td>
          <td width="20%"style="border: 1px solid #000000;  text-align:center"> - </td>
            <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>

      '; 
                 
        }else{
            $total1=0;
                foreach ($debtors as $key => $value) {

                    $total1+=$value['price_total'];

                    if ($value === end($debtors)) {
        
     $tbl = $tbl . ' <tr>
          <td width="20%" style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> '.$total1.'.00 บาท</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
            <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>';
                                  

                        }
                  }
             }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }
  public function debtor_d()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('sell_detail');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage('L', 'A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลลูกหนี้ชำระเงินเเล้วรายวัน<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . '<thead> <tr >
          <th  width="20%" style="border: 1px solid #000000;  text-align:center;"><b> รหัสลูกหนั้</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>ชื่อลูกหนี้</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>จำนวนเงิน</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>สถานะ</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>เวลา</b></th>
          
      </tr></thead>'; 

    $this->load->model('Debtor_model');

    $debtors=$this->Debtor_model->debtor_view_d();

    foreach ($debtors as $debtor) {
        # code...
      $date=date_create($debtor['debtor_datasave']);

      $date_format = date_format($date,"H:i:s");

     $tbl = $tbl . ' <tr nobr="true">
          <td width="20%" style="border: 1px solid #000000;  text-align:center; ">'.$debtor['debtor_id'].'</td>
          <td width="20%"  style="border: 1px solid #000000;  text-align:center">'.$debtor['customer_fname'].' '.$debtor['customer_lname'].'</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center">'.$debtor['price_total'].' บาท</td>
          <td  width="20%" style="border: 1px solid #000000;  text-align:center">'.$debtor['debtor_status'].' </td>
          <td  width="20%" style="border: 1px solid #000000;  text-align:center">'.$date_format.' </td>
          
      </tr>'; 


    }

    if(count($debtors)==0){


     $tbl = $tbl . ' <tr>
          <td width="20%" style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> 0 บาท</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
            <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>

      '; 
                 
        }else{
            $total1=0;
                foreach ($debtors as $key => $value) {

                    $total1+=$value['price_total'];

                    if ($value === end($debtors)) {
        
     $tbl = $tbl . ' <tr>
          <td width="20%" style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> '.$total1.'.00 บาท</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
            <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>';
                                  

                        }
                  }
             }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }

   public function debtor_m()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('Debtor');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
       $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage('L', 'A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลลูกหนี้ชำระเงินเเล้วรายเดือน<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <thead><tr>
          <th  width="20%" style="border: 1px solid #000000;  text-align:center;"><b> รหัสลูกหนั้</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>ชื่อลูกหนี้</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>จำนวนเงิน</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>สถานะ</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>ว/ด/ปี</b></th>
          
      </tr></thead>'; 

    $this->load->model('Debtor_model');

    $debtors=$this->Debtor_model->debtor_view_m();

    foreach ($debtors as $debtor) {
        # code...
      $date=date_create($debtor['debtor_datasave']);

     $date_format = date_format($date,"d-m-Y");

   $tbl = $tbl . ' <tr nobr="true">
          <td width="20%" style="border: 1px solid #000000;  text-align:center; ">'.$debtor['debtor_id'].'</td>
          <td width="20%"  style="border: 1px solid #000000;  text-align:center">'.$debtor['customer_fname'].' '.$debtor['customer_lname'].'</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center">'.$debtor['price_total'].' บาท</td>
          <td  width="20%" style="border: 1px solid #000000;  text-align:center">'.$debtor['debtor_status'].' </td>
          <td  width="20%" style="border: 1px solid #000000;  text-align:center">'.Datethai($date_format).' </td>
          
      </tr>'; 


    }

    if(count($debtors)==0){


     $tbl = $tbl . ' <tr>
          <td width="20%" style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> 0 บาท</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
            <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>

      '; 
                 
        }else{
            $total1=0;
                foreach ($debtors as $key => $value) {

                    $total1+=$value['price_total'];

                    if ($value === end($debtors)) {
        
     $tbl = $tbl . ' <tr>
          <td width="20%" style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> '.$total1.'.00 บาท</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
            <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>';
                                  

                        }
                  }
             }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }

     public function debtor_y()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('debtor');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
       $pdf->AddPage('L', 'A4');

        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลลูกหนี้ชำระเงินเเล้วรายปี<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
   $tbl = $tbl . '<thead> <tr>
          <th  width="20%" style="border: 1px solid #000000;  text-align:center;"><b> รหัสลูกหนั้</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>ชื่อลูกหนี้</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>จำนวนเงิน</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>สถานะ</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>ว/ด/ปี</b></th>
          
      </tr></thead>'; 

    $this->load->model('Debtor_model');

    $debtors=$this->Debtor_model->debtor_view_y();

    foreach ($debtors as $debtor) {
        # code...
      $date=date_create($debtor['debtor_datasave']);

     $date_format = date_format($date,"d-m-Y");

    $tbl = $tbl . ' <tr nobr="true">
          <td width="20%" style="border: 1px solid #000000;  text-align:center; ">'.$debtor['debtor_id'].'</td>
          <td width="20%"  style="border: 1px solid #000000;  text-align:center">'.$debtor['customer_fname'].' '.$debtor['customer_lname'].'</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center">'.$debtor['price_total'].' บาท</td>
          <td  width="20%" style="border: 1px solid #000000;  text-align:center">'.$debtor['debtor_status'].' </td>
          <td  width="20%" style="border: 1px solid #000000;  text-align:center">'.Datethai($date_format).' </td>
          
      </tr>'; 


    }

    if(count($debtors)==0){


     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          <td style="border: 1px solid #000000;  text-align:center"> 0 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
            <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>

      '; 
                 
        }else{
            $total1=0;
                foreach ($debtors as $key => $value) {

                    $total1+=$value['price_total'];

                    if ($value === end($debtors)) {
        
     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          <td style="border: 1px solid #000000;  text-align:center"> '.$total1.'.00 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
            <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>';
                                  

                        }
                  }
             }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }

  public function debtor_all()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('debtor');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
       $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage('L', 'A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');

$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลลูกหนี้ชำระเงินเเล้วทั้งหมด<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
   $tbl = $tbl . '<thead> <tr>
          <th  width="20%" style="border: 1px solid #000000;  text-align:center;"><b> รหัสลูกหนั้</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>ชื่อลูกหนี้</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>จำนวนเงิน</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>สถานะ</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>ว/ด/ปี</b></th>
          
      </tr> </thead>'; 

    $this->load->model('Debtor_model');

    $debtors=$this->Debtor_model->debtor_view_all();

    foreach ($debtors as $debtor) {
        # code...
      $date=date_create($debtor['debtor_datasave']);

     $date_format = date_format($date,"d-m-Y");

   $tbl = $tbl . ' <tr nobr="true">
          <td width="20%" style="border: 1px solid #000000;  text-align:center; ">'.$debtor['debtor_id'].'</td>
          <td width="20%"  style="border: 1px solid #000000;  text-align:center">'.$debtor['customer_fname'].' '.$debtor['customer_lname'].'</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center">'.$debtor['price_total'].' บาท</td>
          <td  width="20%" style="border: 1px solid #000000;  text-align:center">'.$debtor['debtor_status'].' </td>
          <td  width="20%" style="border: 1px solid #000000;  text-align:center">'.Datethai($date_format).' </td>
          
      </tr>'; 


    }

    if(count($debtors)==0){


     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          <td style="border: 1px solid #000000;  text-align:center"> 0 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
            <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>

      '; 
                 
        }else{
            $total1=0;
                foreach ($debtors as $key => $value) {

                    $total1+=$value['price_total'];

                    if ($value === end($debtors)) {
        
     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          <td style="border: 1px solid #000000;  text-align:center"> '.$total1.'.00 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
            <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>';
                                  

                        }
                  }
             }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }

    public function debtor_all_1()
    {
 
        
     // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('stock');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
       $pdf->AddPage('L', 'A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค



$id=$_GET['id'];

         $date_start= date($_GET['date_start']);

         $date_end= date($_GET['date_end']);


         $nice_date_start = date('d-m-Y', strtotime($date_start));

         $nice_date_end = date('d-m-Y', strtotime($date_end));

        $this->load->helper('Datethai');

$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br>  ข้อมูลลูกหนี้ชำระเงินเเล้ว <br>ระหว่างวันที่ '.Datethai($nice_date_start) .' ถึงวันที่ '.Datethai($nice_date_end).'</th>

                   </tr> ';


  // ถึงวันที่ '.$nice_date_end
   
  // -----------------------------------------------------------------------------
   $tbl = $tbl . '<thead> <tr>
          <th  width="20%" style="border: 1px solid #000000;  text-align:center;"><b> รหัสลูกหนั้</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>ชื่อลูกหนี้</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>จำนวนเงิน</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>สถานะ</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>ว/ด/ปี</b></th>
          
      </tr> </thead>'; 

    $this->load->model('Genpdf_models');

    $debtors=$this->Genpdf_models->debtor_all_1($id,$date_start,$date_end);

    foreach ($debtors as $debtor) {
        # code...
      $date=date_create($debtor['debtor_datasave']);

     $date_format = date_format($date,"d-m-Y");

    $tbl = $tbl . ' <tr nobr="true">
          <td width="20%" style="border: 1px solid #000000;  text-align:center; ">'.$debtor['debtor_id'].'</td>
          <td width="20%"  style="border: 1px solid #000000;  text-align:center">'.$debtor['customer_fname'].' '.$debtor['customer_lname'].'</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center">'.$debtor['price_total'].' บาท</td>
          <td  width="20%" style="border: 1px solid #000000;  text-align:center">'.$debtor['debtor_status'].' </td>
          <td  width="20%" style="border: 1px solid #000000;  text-align:center">'.Datethai($date_format).' </td>
          
      </tr>'; 


    }

    if(count($debtors)==0){


     $tbl = $tbl . ' <tr>
          <td width="20%" style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
          <td width="20%"  style="border: 1px solid #000000;  text-align:center"> 0 บาท</td>
          <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
            <td width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>

      '; 
                 
        }else{
            $total1=0;
                foreach ($debtors as $key => $value) {

                    $total1+=$value['price_total'];

                    if ($value === end($debtors)) {
        
     $tbl = $tbl . ' <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          <td style="border: 1px solid #000000;  text-align:center"> '.$total1.'.00 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
            <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>';
                                  

                        }
                  }
             }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('amount_detail.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 

    }

    public function print_customter_list()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('debtor');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค

$this->load->helper('Datethai');

$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br>  รายชื่อลูกค้าทั้งหมด<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . '<thead> <tr>
          <th  width="10%" style="border: 1px solid #000000;  text-align:center;"><b> ลำดับ</b></th>
          <th width="22%"  style="border: 1px solid #000000;  text-align:center;"><b>รหัสลูกค้า</b></th>
          <th width="30%"  style="border: 1px solid #000000;  text-align:center;"><b>ชื่อลูกค้า</b></th>
          <th width="38%" style="border: 1px solid #000000;  text-align:center;"><b>หมายเหตุ</b></th>

          
      </tr></thead>'; 

    $this->load->model('customer_models');

    $customers=$this->customer_models->customer_view();

    $i = 1; 
    foreach ($customers as $customer) {
        # code...
      $date=date_create($customer['customer_datasave']);

     $date_format = date_format($date,"d/m/Y");

     $tbl = $tbl . ' <tr nobr="true">
          <td width="10%" style="border: 1px solid #000000;  text-align:center; ">'.$i.'</td>
          <td width="22%"  style="border: 1px solid #000000;  text-align:center">'.$customer['customer_id'].'</td>
          <td width="30%" style="border: 1px solid #000000;  text-align:center">'.$customer['customer_fname'].' '.$customer['customer_lname'].'</td>
          <td width="38%" style="border: 1px solid #000000;  text-align:center"> </td>
          
          
      </tr>'; 

      $i++;
    }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }

    public function print_employee_list()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('employee');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค

$this->load->helper('Datethai');


$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br>  รายชื่อพนักงานทั้งหมด<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <thead><tr>
          <th  width="10%" style="border: 1px solid #000000;  text-align:center;"><b> ลำดับ</b></th>
          <th width="22%"  style="border: 1px solid #000000;  text-align:center;"><b>รหัสพนักงาน</b></th>
          <th width="30%"  style="border: 1px solid #000000;  text-align:center;"><b>ชื่อพนักงาน</b></th>
          <th width="38%" style="border: 1px solid #000000;  text-align:center;"><b>หมายเหตุ</b></th>

          
      </tr></thead>'; 

    $this->load->model('employee_models');

    $employee=$this->employee_models->employee_view();

    $i = 1; 
    foreach ($employee as $emp) {
        # code...
      $date=date_create($emp['employee_datasave']);

     $date_format = date_format($date,"d/m/Y");

     $tbl = $tbl . ' <tr nobr="true">
          <td width="10%" style="border: 1px solid #000000;  text-align:center; ">'.$i.'</td>
          <td width="22%" style="border: 1px solid #000000;  text-align:center">'.$emp['employee_id'].'</td>
          <td width="30%"  style="border: 1px solid #000000;  text-align:center">'.$emp['employee_fname'].' '.$emp['employee_lname'].'</td>
          <td width="38%" style="border: 1px solid #000000;  text-align:center"> </td>
          
          
      </tr>'; 

      $i++;
    }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }
  public function print_customter_data()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('customer');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 12, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค


$this->load->helper('Datethai');

$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br>  ข้อมูลลูกค้า<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
 

      $id = $_GET['id'];

    $this->load->model('customer_models');

    $customer=$this->customer_models-> select_data_customer($id);

   
      
        # code...
      $date=date_create($customer['customer_datasave']);



     $date_format = date_format($date,"d/m/Y");

 $tbl = $tbl . ' <tr>
         
           
  <th  style="border: 1px solid #000000;  text-align:center;" colspan="4" ><b> <img src="img/'.$customer['customer_image'].' " width="170" height="160" >
          </b></th>
          
      </tr>'; 

     $tbl = $tbl . ' <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">รหัสลูกค้า </td>
          <td style="border: 1px solid #000000;  text-align:left;" colspan="2">'.$customer['customer_id'].'</td>
         
       
          
      </tr>
       <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">ชื่อ สกุล </td>
          <td style="border: 1px solid #000000;  text-align:left;" colspan="2">'.$customer['customer_fname'].' '.$customer['customer_lname'].'</td>
         
       
          
      </tr>  '; 

      if($customer['customer_sex']=="male"){

     $tbl .='
       <tr>  

          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">เพศ </td>

          <td style="border: 1px solid #000000;  text-align:left;" colspan="2"> ชาย </td>
           
      </tr>'; 
            }else{

          $tbl .='
       <tr>  

          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">เพศ </td>

          <td style="border: 1px solid #000000;  text-align:left;" colspan="2">หญิง</td>
           
      </tr>'; 


          }
          
      $tbl .=' <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">สัญชาติ </td>
          <td style="border: 1px solid #000000;  text-align:left;" colspan="2">'.$customer['customer_country'].'</td>
         
       
          
      </tr>
      <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">วันเกิด </td>
          <td style="border: 1px solid #000000;  text-align:left;" colspan="2">'.Datethai($customer['customer_birthday']).'</td>
         
       
          
      </tr>
      <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">เลขบัตรประชาชน </td>
          <td style="border: 1px solid #000000;  text-align:left;" colspan="2">'.$customer['customer_IDcard'].'</td>
         
       
          
      </tr>
      <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">ที่อยู่ </td>
          <td style="border: 1px solid #000000;  text-align:left;" colspan="2">'.$customer['customer_address'].' ตำบล '. $customer['customer_sub_area'] .'
          อำเภอ '. $customer['customer_area'] .'  จังหวัด ' .$customer['customer_province']. '</td>
         
       
          
      </tr>
      <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">รหัสไปรษณีย์ </td>
          <td style="border: 1px solid #000000;  text-align:left;" colspan="2">'.$customer['customer_postal_code'].'</td>
         
       
          
      </tr>
       <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">เบอร์โทรติดต่อ </td>
          <td style="border: 1px solid #000000;  text-align:left;" colspan="2">'.$customer['customer_phone'].'</td>
         
       
          
      </tr>
       <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">Email Address </td>
          <td style="border: 1px solid #000000;  text-align:left;" colspan="2">'.$customer['customer_email'].'</td>
         
       
          
      </tr>



      ';

      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }
    public function print_employee_data()
    {
 
        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('debtor');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค

$this->load->helper('Datethai');

$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br>  ข้อมูลพนักงาน<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
  

      $id = $_GET['id'];

    $this->load->model('employee_models');

    $emp=$this->employee_models->select_data_employee($id);


  
    
        # code...
      $date=date_create($emp['employee_datasave']);

     $date_format = date_format($date,"d/m/Y");

$tbl = $tbl . ' <tr>
          <th  style="border: 1px solid #000000;  text-align:center;" colspan="4" ><b> <img src="img/'.$emp['employee_image'].' " width="170" height="160" >
          </b></th>
           

          
      </tr>'; 

     $tbl = $tbl . ' <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">รหัสลูกค้า </td>
          <td style="border: 1px solid #000000;  " colspan="2">E'.$emp['employee_id'].'</td>
         
       
          
      </tr>
       <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">ชื่อ สกุล </td>
          <td style="border: 1px solid #000000;  " colspan="2">'.$emp['employee_fname'].' '.$emp['employee_lname'].'</td>
         
       
          
      </tr>  '; 

      if($emp['employee_sex']=="male"){

     $tbl .='
       <tr>  

          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">เพศ </td>

          <td style="border: 1px solid #000000; " colspan="2"> ชาย </td>
           
      </tr>'; 
            }else{

          $tbl .='
       <tr>  

          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">เพศ </td>

          <td style="border: 1px solid #000000;  " colspan="2">หญิง</td>
           
      </tr>'; 


          }
          
      $tbl .=' <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">สัญชาติ </td>
          <td style="border: 1px solid #000000; " colspan="2">'.$emp['employee_country'].'</td>
         
       
          
      </tr>
      <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">วันเกิด </td>
          <td style="border: 1px solid #000000;  " colspan="2">'.Datethai($emp['employee_birthday']).'</td>
         
       
          
      </tr>
      <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">เลขบัตรประชาชน </td>
          <td style="border: 1px solid #000000;  " colspan="2">'.$emp['employee_IDcard'].'</td>
         
       
          
      </tr>';

        if($emp['employee_home_type']=="home"){

     $tbl .='
       <tr>  

          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">ที่อยู่ปัจจุบัน </td>

          <td style="border: 1px solid #000000;  " colspan="2"> บ้านพักของตัวเอง </td>
           
      </tr>'; 
            }else if($emp['employee_home_type']=="hotel"){

          $tbl .='
       <tr>  

          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">ที่อยู่ปัจจุบัน </td>

          <td style="border: 1px solid #000000;  " colspan="2">หอพัก </td>
           
      </tr>'; 


          }else{

          $tbl .='
       <tr>  

          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">ที่อยู่ปัจจุบัน </td>

          <td style="border: 1px solid #000000; " colspan="2">หอพักโรงงาน </td>
           
      </tr>'; 


          }


       $tbl .='
      <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">ที่อยู่ </td>
          <td style="border: 1px solid #000000;  " colspan="2">'.$emp['employee_address'].' ตำบล '. $emp['employee_sub_area'] .'
          อำเภอ '. $emp['employee_area'] .'  จังหวัด ' .$emp['employee_province']. '</td>
         
       
          
      </tr>
      <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">รหัสไปรษณีย์ </td>
          <td style="border: 1px solid #000000;  " colspan="2">'.$emp['employee_postal_code'].'</td>
         
       
          
      </tr>
       <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">เบอร์โทรติดต่อ </td>
          <td style="border: 1px solid #000000;  " colspan="2">'.$emp['employee_phone'].'</td>
         
       
          
      </tr>
      <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">แผนก </td>
          <td style="border: 1px solid #000000;  " colspan="2">'.$emp['name'].'</td>
         
       
          
      </tr>
      <tr>          
          <td style="border: 1px solid #000000;  text-align:center;" colspan="4">ข้อมูลสำหรับชาวต่างด้าว </td>
          
         
       
          
      </tr> ';


        if($emp['employee_pastpost']== null ){

     $tbl .='
       <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">เลขที่หนังสือเดินทาง </td>
          <td style="border: 1px solid #000000;  " colspan="2"> - </td>
         
       
          
      </tr>
      <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">เดินทางเข้ามาวันที่ </td>
          <td style="border: 1px solid #000000;  " colspan="2"> - </td>
         
       
          
      </tr>
       <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">จากประเทศ </td>
          <td style="border: 1px solid #000000;  " colspan="2"> - </td>
         
       
          
      </tr> '; } else {
     $tbl .='
       <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">เลขที่หนังสือเดินทาง </td>
          <td style="border: 1px solid #000000;  " colspan="2">'.$emp['employee_pastpost'].'</td>
         
       
          
      </tr>
      <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">เดินทางเข้ามาวันที่ </td>
          <td style="border: 1px solid #000000;  " colspan="2">'.Datethai($emp['employee_date_county']).'</td>
         
       
          
      </tr>
       <tr>          
          <td style="border: 1px solid #000000;  text-align:right;" colspan="2">จากประเทศ </td>
          <td style="border: 1px solid #000000;  " colspan="2">'.$emp['employee_truecoun'].'</td>
         
       
          
      </tr>';  }

    
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
    }



    /*        พมิพ์ข้อมูล รายรับขรายจ่าย*/

  public function Account_d()
  {

        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('Account');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 12, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage('L', 'A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค


$this->load->helper('Datethai');

$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลรายรับ-รายจ่ายรายวัน<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <tr>
         <th  width="20%" style="border: 1px solid #000000;  text-align:center;"><b> รหัสรายรับ-รายจ่าย</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>รายละเอียด</b></th>
          <th width="15%"  style="border: 1px solid #000000;  text-align:center;"><b>รายรับ</b></th>
           <th width="15%"  style="border: 1px solid #000000;  text-align:center;"><b>รายจ่าย</b></th>
          <th width="19%" style="border: 1px solid #000000;  text-align:center;"><b>ประเภท</b></th>
          <th width="11%" style="border: 1px solid #000000;  text-align:center;"><b>เวลา</b></th>
          
      </tr>'; 

     $this->load->model('Account_models');

     $accounts=$this->Account_models->accunt_show();

     foreach ($accounts as $value) {
         # code...
        $date=date_create($value['account_datasave']);

        $date_format = date_format($date,"H:i:s");

      

    $tbl .='
    <tr nobr="true">
    <td style="border: 1px solid #000000;  text-align:center">'.$value['account_id'].' </td>
    <td style="border: 1px solid #000000;  text-align:center">'.$value['account_detail'].' </td>
    ';


    if($value['account_income']!=0){

    $tbl .='
    <td style="border: 1px solid #000000;  text-align:center">'.$value['account_income'].' บาท</td>
    <td style="border: 1px solid #000000;  text-align:center"> - </td>
    ';
    }else{
    $tbl .='
    <td style="border: 1px solid #000000;  text-align:center"> - </td>
    <td style="border: 1px solid #000000;  text-align:center"> '.$value['account_expenses'].' บาท </td>
    ';

    }

    $tbl .='
    <td style="border: 1px solid #000000;  text-align:center">'.$value['account_type'].' </td>
    <td style="border: 1px solid #000000;  text-align:center">'.$date_format.'</td>

    </tr>
    '; 


     }

    if(count($accounts)==0){

     $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000;  text-align:center; "><b>รวม</b></td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          <td style="border: 1px solid #000000;  text-align:center"> 0 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> 0 บาท </td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>

      '; 
                 
        }else{
            $total1=0;
            $total2=0;
                foreach ($accounts as $key => $value) {

                     $total1+=$value['account_income'];
                     $total2+=$value['account_expenses'];


                    if ($value === end($accounts)) {
        
     $tbl = $tbl . ' 
     <tr>
           <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
           <td style="border: 1px solid #000000;  text-align:center"> - </td>
           <td style="border: 1px solid #000000;  text-align:center"> '.$total1.'.00 บาท</td>
           <td style="border: 1px solid #000000;  text-align:center"> '.$total2.'.00 บาท </td>
            <td style="border: 1px solid #000000;  text-align:center"> - </td>
             <td style="border: 1px solid #000000;  text-align:center"> - </td>        
          
      </tr>';
                                  
                        }
                  }
             }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

  }

  public function Account_m()
  {

        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('Account');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 12, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
       $pdf->AddPage('L', 'A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค

$this->load->helper('Datethai');

$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลรายรับ-รายจ่ายรายเดือน<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <tr>
         <th  width="20%" style="border: 1px solid #000000;  text-align:center;"><b> รหัสรายรับ-รายจ่าย</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>รายละเอียด</b></th>
          <th width="15%"  style="border: 1px solid #000000;  text-align:center;"><b>รายรับ</b></th>
           <th width="14%"  style="border: 1px solid #000000;  text-align:center;"><b>รายจ่าย</b></th>
          <th width="17%" style="border: 1px solid #000000;  text-align:center;"><b>ประเภท</b></th>
          <th width="14%" style="border: 1px solid #000000;  text-align:center;"><b>ว/ด/ป</b></th>
          
      </tr>'; 

     $this->load->model('Account_models');

     $accounts=$this->Account_models->accunt_show_m();

     foreach ($accounts as $value) {
         # code...
        $date=date_create($value['account_datasave']);

        $date_format = date_format($date,"d-m-Y");

      

    $tbl .='
    <tr nobr="true">
    <td style="border: 1px solid #000000;  text-align:center">'.$value['account_id'].' </td>
    <td style="border: 1px solid #000000;  text-align:center">'.$value['account_detail'].' </td>
    ';


    if($value['account_income']!=0){

    $tbl .='
    <td style="border: 1px solid #000000;  text-align:center">'.$value['account_income'].' บาท</td>
    <td style="border: 1px solid #000000;  text-align:center"> - </td>
    ';
    }else{
    $tbl .='
    <td style="border: 1px solid #000000;  text-align:center"> - </td>
    <td style="border: 1px solid #000000;  text-align:center"> '.$value['account_expenses'].' บาท </td>
    ';

    }

    $tbl .='
    <td style="border: 1px solid #000000;  text-align:center">'.$value['account_type'].' </td>
    <td style="border: 1px solid #000000;  text-align:center">'.Datethai($date_format).'</td>

    </tr>
    '; 


     }

    if(count($accounts)==0){

     $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000;  text-align:center; "><b>รวม</b></td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          <td style="border: 1px solid #000000;  text-align:center"> 0 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> 0 บาท </td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>

      '; 
                 
        }else{
            $total1=0;
            $total2=0;
                foreach ($accounts as $key => $value) {

                     $total1+=$value['account_income'];
                     $total2+=$value['account_expenses'];


                    if ($value === end($accounts)) {
        
     $tbl = $tbl . ' 
     <tr>
           <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
           <td style="border: 1px solid #000000;  text-align:center"> - </td>
           <td style="border: 1px solid #000000;  text-align:center"> '.$total1.'.00 บาท</td>
           <td style="border: 1px solid #000000;  text-align:center"> '.$total2.'.00 บาท </td>
            <td style="border: 1px solid #000000;  text-align:center"> - </td>
             <td style="border: 1px solid #000000;  text-align:center"> - </td>        
          
      </tr>';
                                  
                        }
                  }
             }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

  }
public function Account_y()
  {

        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('Account');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
       $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 12, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage('L', 'A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค

$this->load->helper('Datethai');

$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลรายรับ-รายจ่ายรายปี<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> ';


  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <tr>
         <th  width="20%" style="border: 1px solid #000000;  text-align:center;"><b> รหัสรายรับ-รายจ่าย</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>รายละเอียด</b></th>
          <th width="15%"  style="border: 1px solid #000000;  text-align:center;"><b>รายรับ</b></th>
           <th width="14%"  style="border: 1px solid #000000;  text-align:center;"><b>รายจ่าย</b></th>
          <th width="17%" style="border: 1px solid #000000;  text-align:center;"><b>ประเภท</b></th>
          <th width="14%" style="border: 1px solid #000000;  text-align:center;"><b>ว/ด/ป</b></th>
          
      </tr>'; 

     $this->load->model('Account_models');

     $accounts=$this->Account_models->accunt_show_y();

     foreach ($accounts as $value) {
         # code...
        $date=date_create($value['account_datasave']);

        $date_format = date_format($date,"d-m-Y");

      

    $tbl .='
    <tr  nobr="true">
    <td style="border: 1px solid #000000;  text-align:center">'.$value['account_id'].' </td>
    <td style="border: 1px solid #000000;  text-align:center">'.$value['account_detail'].' </td>
    ';


    if($value['account_income']!=0){

    $tbl .='
    <td style="border: 1px solid #000000;  text-align:center">'.$value['account_income'].' บาท</td>
    <td style="border: 1px solid #000000;  text-align:center"> - </td>
    ';
    }else{
    $tbl .='
    <td style="border: 1px solid #000000;  text-align:center"> - </td>
    <td style="border: 1px solid #000000;  text-align:center"> '.$value['account_expenses'].' บาท </td>
    ';

    }

    $tbl .='
    <td style="border: 1px solid #000000;  text-align:center">'.$value['account_type'].' </td>
    <td style="border: 1px solid #000000;  text-align:center">'.Datethai($date_format).'</td>

    </tr>
    '; 


     }

    if(count($accounts)==0){

     $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          <td style="border: 1px solid #000000;  text-align:center"> 0 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> 0 บาท </td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>

      '; 
                 
        }else{
            $total1=0;
            $total2=0;
                foreach ($accounts as $key => $value) {

                     $total1+=$value['account_income'];
                     $total2+=$value['account_expenses'];


                    if ($value === end($accounts)) {
        
     $tbl = $tbl . ' 
     <tr>
           <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
           <td style="border: 1px solid #000000;  text-align:center"> - </td>
           <td style="border: 1px solid #000000;  text-align:center"> '.$total1.'.00 บาท</td>
           <td style="border: 1px solid #000000;  text-align:center"> '.$total2.'.00 บาท </td>
            <td style="border: 1px solid #000000;  text-align:center"> - </td>
             <td style="border: 1px solid #000000;  text-align:center"> - </td>        
          
      </tr>';
                                  
                        }
                  }
             }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

  }
  public function Account_all()
  {

        // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('Account');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
       
         $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 12, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
       $pdf->AddPage('L', 'A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');

$tbl = '<table cellspacing="0" cellpadding="8" >

      
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลรายรับ-รายจ่ายรายทั้งหมด<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                   </tr> 

     
                   ';


  
  // -----------------------------------------------------------------------------
  $tbl = $tbl . ' <thead> <tr>
         <th  width="20%" style="border: 1px solid #000000;  text-align:center;"><b> รหัสรายรับ-รายจ่าย</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>รายละเอียด</b></th>
          <th width="15%"  style="border: 1px solid #000000;  text-align:center;"><b>รายรับ</b></th>
           <th width="14%"  style="border: 1px solid #000000;  text-align:center;"><b>รายจ่าย</b></th>
          <th width="17%" style="border: 1px solid #000000;  text-align:center;"><b>ประเภท</b></th>
          <th width="14%" style="border: 1px solid #000000;  text-align:center;"><b>ว/ด/ป</b></th>
          
      </tr>  </thead>'; 
     
     $this->load->model('Account_models');

     $accounts=$this->Account_models->accunt_show_all();

    

     foreach ($accounts as $value) {
         # code...
        $date=date_create($value['account_datasave']);

        $date_format = $value['account_datasave'];
       
      

    $tbl .='
    <tbody>
    <tr nobr="true">
    <td width="20%"  style="border: 1px solid #000000;  text-align:center">'.$value['account_id'].' </td>
    <td width="20%" style="border: 1px solid #000000;  text-align:center">'.$value['account_detail'].' </td>
    ';


    if($value['account_income']!=0){

    $tbl .='
    <td width="15%" style="border: 1px solid #000000;  text-align:center">'.$value['account_income'].' บาท</td>
    <td  width="14%" style="border: 1px solid #000000;  text-align:center"> - </td>
    ';
    }else{
    $tbl .='
    <td width="15%"  style="border: 1px solid #000000;  text-align:center"> - </td>
    <td   width="14%" style="border: 1px solid #000000;  text-align:center"> '.$value['account_expenses'].' บาท </td>
    ';

    }

    $tbl .='
    <td  width="17%" style="border: 1px solid #000000;  text-align:center">'.$value['account_type'].' </td>
    <td style="border: 1px solid #000000;  text-align:center">'.Datethai($date_format).'</td>

    </tr>

    '; 


     }

    if(count($accounts)==0){

     $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          <td style="border: 1px solid #000000;  text-align:center"> 0 บาท</td>
          <td style="border: 1px solid #000000;  text-align:center"> 0 บาท </td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>

      '; 
                 
        }else{
            $total1=0;
            $total2=0;
                foreach ($accounts as $key => $value) {

                     $total1+=$value['account_income'];
                     $total2+=$value['account_expenses'];


                    if ($value === end($accounts)) {
        
     $tbl = $tbl . ' 
     <tr>
           <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
           <td style="border: 1px solid #000000;  text-align:center"> - </td>
           <td style="border: 1px solid #000000;  text-align:center"> '.$total1.'.00 บาท</td>
           <td style="border: 1px solid #000000;  text-align:center"> '.$total2.'.00 บาท </td>
            <td style="border: 1px solid #000000;  text-align:center"> - </td>
             <td style="border: 1px solid #000000;  text-align:center"> - </td>        
          
      </tr>
<tbody>
      ';
                                  
                        }
                  }
             }
      
  $tbl = $tbl . '</table>';



  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

  }

  public function print_saraly()
    {
        $id = $_GET['id'];
        
                   $this->load->model('Rest_models');
        
                   $emp = $this->Rest_models->set_salaly($id);
        

        if($emp != null){
                    // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('จ่ายเงินเดือน');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
        $pdf->SetPrintFooter(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage('L','A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค



            $id = $_GET['id'];

           $this->load->model('Rest_models');

           $emp = $this->Rest_models->set_salaly($id);


            $date=date_create($emp['date_add']);

           $date_format = $emp['date_add'];

            $this->load->helper('datethai');
            
            $strMonthCut = Array("","มกราคม","กุมพาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤษจิกายน","ธันวาคม");

            list($Y,$m,$d) = explode('-',$emp['date_add']);
            
            if($m == '01'){
                $m = 1;
            }elseif($m == '02'){
                $m = 2;
            }elseif($m == '03'){
                $m = 3;
            }elseif($m == '04'){
                $m = 4;
            }elseif($m == '05'){
                $m = 5;
            }elseif($m == '06'){
                $m = 6;
            }elseif($m == '07'){
                $m = 7;
            }elseif($m == '08'){
                $m = 8;
            }elseif($m == '09'){
                $m = 9;
            }
            
           
        $tbl = '<table width="100%" border="1" cellpadding="10">
    <tbody>
        <tr >
            <td colspan="4" style="font-size: 20pt; text-align: center;">ใบสลิปเงินเดือน</td>
        </tr>
        <tr>
            <th width="13%"  style="font-size: 15pt; ">รหัสพนักงาน</th>
             <td width="50%" style="font-size: 15pt; ">'.$emp['employee_id'].'</td>
              <th width="12%" style="font-size: 15pt;">จ่ายวันที่</th>
              <td style="font-size: 12pt; ">'.Datethai($date_format).'</td>
        </tr>
         <tr>
            <th width="13%"  style="font-size: 15pt; ">ชื่อพนักงาน</th>
             <td width="50%" style="font-size: 15pt; ">'.$emp['employee_fname']." ".$emp['employee_lname'].'</td>
              <th width="12%" style="font-size: 15pt;">ประจำเดือน</th>
              <td style="font-size: 12pt; ">'. $strMonthCut[$m].'</td>
        </tr>
        <tr >
            <td colspan="4" style="font-size: 15pt; text-align: center;">ข้อมูลเงินเดือน</td>
        </tr>

    </tbody>
</table>
<table width="100%" border="1"  >
               <tbody>
                   <tr>
                       <th width="16.67%" style="font-size: 15pt; ">มาทำงาน </th>
                        <td width="16.67%" style="font-size: 15pt; " >'.$emp['worktime'].' วัน</td>
                         <th width="16.67%"  style="font-size: 15pt; ">ขาดงาน </th>
                        <td width="16.67%" style="font-size: 15pt; ">'.$emp['absence'].' วัน</td>
                         <th width="16.67%" style="font-size: 15pt; " >ลางาน </th>
                        <td width="16.67%" style="font-size: 15pt; ">'.$emp['rest_work'].' วัน</td>
                   </tr>
                    <tr>
                       <th  colspan="4" style="text-align: center; font-size: 15pt;">เงินเดือน </th>
                        <td colspan="2" style="text-align: center; font-size: 15pt;"  >'.$emp['salaly_month'].' บาท</td>  
                   </tr>
                   <tr>
                       <th  colspan="6" style="text-align: right; font-size: 15pt;"><p style="margin-top: 100px;">
                        <br> <br> <br><br>ลงชื่อผู้รับเงิน....................................................<br>วันที่..................../.........................../......................</p></th>
                        
                   </tr>
               </tbody>
           </table>';    


  



  $pdf->writeHTML($tbl, true, false, false, false, '');









    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('pay.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

        }else{
            $this->session->set_flashdata('check', 'ยังไม่มีการบันทึกข้อมูลการจ่ายเงินเดือน');    

            redirect('Salaly_month');
        }
 

        
 
   }





  public function Account_all_1()
  {

        
     // สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('Account');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        $pdf->setPrintHeader(false);
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('freeserif', '', 14, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
       $pdf->AddPage('L', 'A4');
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค



$id=$_GET['id'];

$this->load->helper('Datethai');
         $date_start= date($_GET['date_start']);

         $date_end= date($_GET['date_end']);


         $nice_date_start = date('d-m-Y', strtotime($date_start));

         $nice_date_end = date('d-m-Y', strtotime($date_end));

         

$tbl = '<table cellspacing="0" cellpadding="8" >
                   <tr>
                          <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br>  ข้อมูลรายรับ-รายจ่าย<br>ระหว่างวันที่ '.Datethai($nice_date_start) .' ถึงวันที่ '.Datethai($nice_date_end).'</th>

                   </tr> ';


  // ถึงวันที่ '.$nice_date_end
   
  // -----------------------------------------------------------------------------
 $tbl = $tbl . ' <thead> <tr>
         <th  width="20%" style="border: 1px solid #000000;  text-align:center;"><b> รหัสรายรับ-รายจ่าย</b></th>
          <th width="20%"  style="border: 1px solid #000000;  text-align:center;"><b>รายละเอียด</b></th>
          <th width="15%"  style="border: 1px solid #000000;  text-align:center;"><b>รายรับ</b></th>
           <th width="14%"  style="border: 1px solid #000000;  text-align:center;"><b>รายจ่าย</b></th>
          <th width="17%" style="border: 1px solid #000000;  text-align:center;"><b>ประเภท</b></th>
          <th width="14%" style="border: 1px solid #000000;  text-align:center;"><b>ว/ด/ป</b></th>
          
      </tr>  </thead>'; 


          $this->load->model('Genpdf_models');

        $accounts=$this->Genpdf_models->Account_all_1($id,$date_start,$date_end);

     foreach ($accounts as $value) {
         # code...
        $date=date_create($value['account_datasave']);

        $date_format = date_format($date,"d-m-Y");

      
 $tbl .='
    <tbody>
    <tr nobr="true">
    <td width="20%"  style="border: 1px solid #000000;  text-align:center">'.$value['account_id'].' </td>
    <td width="20%" style="border: 1px solid #000000;  text-align:center">'.$value['account_detail'].' </td>
    ';


    if($value['account_income']!=0){

    $tbl .='
    <td width="15%" style="border: 1px solid #000000;  text-align:center">'.$value['account_income'].' บาท</td>
    <td  width="14%" style="border: 1px solid #000000;  text-align:center"> - </td>
    ';
    }else{
    $tbl .='
    <td width="15%"  style="border: 1px solid #000000;  text-align:center"> - </td>
    <td   width="14%" style="border: 1px solid #000000;  text-align:center"> '.$value['account_expenses'].' บาท </td>
    ';

    }

    $tbl .='
    <td  width="17%" style="border: 1px solid #000000;  text-align:center">'.$value['account_type'].' </td>
    <td style="border: 1px solid #000000;  text-align:center">'.Datethai($date_format).'</td>

    </tr>

    '; 


     }

    if(count($accounts)==0){

     $tbl = $tbl . '
      <tr>
          <td  width="20%" style="border: 1px solid #000000;  text-align:center; ">รวม</td>
          <td  width="20%" style="border: 1px solid #000000;  text-align:center"> - </td>
          <td  width="15%" style="border: 1px solid #000000;  text-align:center"> 0 บาท</td>
          <td width="14%" style="border: 1px solid #000000;  text-align:center"> 0 บาท </td>
          <td  width="17%" style="border: 1px solid #000000;  text-align:center"> - </td>
          <td style="border: 1px solid #000000;  text-align:center"> - </td>
          
      </tr>

      '; 
                 
        }else{
            $total1=0;
            $total2=0;
                foreach ($accounts as $key => $value) {

                     $total1+=$value['account_income'];
                     $total2+=$value['account_expenses'];


                    if ($value === end($accounts)) {
        
     $tbl = $tbl . ' 
     <tr>
           <td style="border: 1px solid #000000;  text-align:center; ">รวม</td>
           <td style="border: 1px solid #000000;  text-align:center"> - </td>
           <td style="border: 1px solid #000000;  text-align:center"> '.$total1.'.00 บาท</td>
           <td style="border: 1px solid #000000;  text-align:center"> '.$total2.'.00 บาท </td>
            <td style="border: 1px solid #000000;  text-align:center"> - </td>
             <td style="border: 1px solid #000000;  text-align:center"> - </td>        
          
      </tr>
<tbody>
      ';
                                  
                        }
                  }
             }
      
  $tbl = $tbl . '</table>';




  $pdf->writeHTML($tbl, true, false, false, false, '');


    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
   // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('amount_detail.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
  }


  public function stock_detail_id()
  {

      // สร้าง object สำหรับใช้สร้าง pdf 
      $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
       
      // กำหนดรายละเอียดของ pdf
      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetAuthor('Nicola Asuni');
      $pdf->SetTitle('stock');
      $pdf->SetSubject('TCPDF Tutorial');
      $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
       
      // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
      $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
      $pdf->setFooterData(array(0,64,0), array(0,64,128));

      $pdf->setPrintHeader(false);
      $pdf->SetPrintFooter(false);
       
      // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
       
      // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
       
      // กำหนด margins
      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
       
      // กำหนดการแบ่งหน้าอัตโนมัติ
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
       
      // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
      $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
       
      // ---------------------------------------------------------
       
      // set default font subsetting mode
      $pdf->setFontSubsetting(true);
       
      // กำหนดฟอนท์ 
      // ฟอนท์ freeserif รองรับภาษาไทย
      $pdf->SetFont('freeserif', '', 14, '', true);
       
       
       
      // เพิ่มหน้า pdf
      // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
      $pdf->AddPage();
       
      // กำหนดเงาของข้อความ 
      $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

      $this->load->model('Produce_models');
      
        $id = $_GET['id'];
        $stock=$this->Produce_models->select_data_stock_detail($id);

// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                 <tr>
                        <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลการผลิตสินค้า<br>ณ วันที่ '.Datethai(date("d-m-Y")).'
                         <p style="text-align:left">รหัสการผลิต '.$id.'</p></th>

                 </tr> ';

// -----------------------------------------------------------------------------
$tbl = $tbl . ' <tr>
           <th width="30%" style="border: 1px solid #000000;  text-align:center;"><b>รหัสสินค้า</b></th>
           <th width="50%" style="border: 1px solid #000000;  text-align:center;"><b>ชื่อสินค้า</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>จำนวน</b></th>
    </tr>'; 

  foreach ($stock as $s) {


   $tbl = $tbl . ' <tr>
        <td style="border: 1px solid #000000;  text-align:center; ">'.$s['product_id'].'</td>
        <td style="border: 1px solid #000000;  text-align:center; ">'.$s['stock_product_name'].'</td>
        <td style="border: 1px solid #000000;  text-align:center; ">'.$s['stock_amount']." ".$s['stock_product_type'].'</td>
    </tr>'; 

  }
    
$tbl = $tbl . '</table>';



$pdf->writeHTML($tbl, true, false, false, false, '');


  // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
 // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

  }




  
  public function order_detail_id()
  {

      // สร้าง object สำหรับใช้สร้าง pdf 
      $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
       
      // กำหนดรายละเอียดของ pdf
      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetAuthor('Nicola Asuni');
      $pdf->SetTitle('stock');
      $pdf->SetSubject('TCPDF Tutorial');
      $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
       
      // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
      $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
      $pdf->setFooterData(array(0,64,0), array(0,64,128));

      $pdf->setPrintHeader(false);
      $pdf->SetPrintFooter(false);
       
      // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
       
      // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
       
      // กำหนด margins
      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
       
      // กำหนดการแบ่งหน้าอัตโนมัติ
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
       
      // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
      $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
       
      // ---------------------------------------------------------
       
      // set default font subsetting mode
      $pdf->setFontSubsetting(true);
       
      // กำหนดฟอนท์ 
      // ฟอนท์ freeserif รองรับภาษาไทย
      $pdf->SetFont('freeserif', '', 14, '', true);
       
       
       
      // เพิ่มหน้า pdf
      // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
      $pdf->AddPage();
       
      // กำหนดเงาของข้อความ 
      $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));


      $id = $_GET['id'];
      
      
                $result_explode= explode('-',$id);
        
                $order_id= $result_explode[0]; 
        
                $fname= $result_explode[1];

                $lname= $result_explode[2];


// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                 <tr>
                        <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ใบสั่งซื้อสินค้า<br>ณ วันที่ '.Datethai(date("d-m-Y")).'
                        <p style="text-align:left">รหัสใบสั่งซื้อสินค้า '.$order_id.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลูกค้า '.$fname." ".$lname.'</p>
                        </th>
                        
                 </tr> 
                 ';



// -----------------------------------------------------------------------------
$tbl = $tbl . ' <tr>
           <th width="15%" style="border: 1px solid #000000;  text-align:center;"><b>รหัสสินค้า</b></th>
           <th width="27%" style="border: 1px solid #000000;  text-align:center;"><b>ชื่อสินค้า</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>ราคาต่อหน่วย</b></th>
          <th width="17%" style="border: 1px solid #000000;  text-align:center;"><b>จำนวน</b></th>
          <th width="21%" style="border: 1px solid #000000;  text-align:center;"><b>ราคารวม</b></th>
    </tr>'; 

  $this->load->model('Produce_models');

 
  $order=$this->Produce_models->show_order_detail($order_id);

  foreach ($order as $s) {


   $tbl = $tbl . ' <tr>
        <td style="border: 1px solid #000000;  text-align:center; ">'.$s['product_id'].'</td>
        <td style="border: 1px solid #000000;  text-align:center; ">'.$s['order_product_name'].'</td>
        <td style="border: 1px solid #000000;  text-align:center; ">'.$s['order_product_price'].' บาท</td>
     <td style="border: 1px solid #000000;  text-align:center; ">'.$s['order_product_quantity'].'</td>
        <td style="border: 1px solid #000000;  text-align:center; ">'.$s['order_product_total_price'].' บาท</td>
     
    </tr>'; 
    
  }

  $tbl = $tbl . ' <tr>
  <td colspan="4" style="border: 1px solid #000000; text-align: center;">รวม</td>
   <td style="border: 1px solid #000000;  text-align:center; ">'.$s['order_detail_total'].' บาท</td>
  </tr>'; 
    
$tbl = $tbl . '</table>';



$pdf->writeHTML($tbl, true, false, false, false, '');









  // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
 // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

  }


  public function order_detail_d()
  {

      // สร้าง object สำหรับใช้สร้าง pdf 
      $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
       
      // กำหนดรายละเอียดของ pdf
      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetAuthor('Nicola Asuni');
      $pdf->SetTitle('stock');
      $pdf->SetSubject('TCPDF Tutorial');
      $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
       
      // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
      $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
      $pdf->setFooterData(array(0,64,0), array(0,64,128));

      $pdf->setPrintHeader(false);
      $pdf->SetPrintFooter(false);
       
      // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
       
      // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
       
      // กำหนด margins
      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
       
      // กำหนดการแบ่งหน้าอัตโนมัติ
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
       
      // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
      $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
       
      // ---------------------------------------------------------
       
      // set default font subsetting mode
      $pdf->setFontSubsetting(true);
       
      // กำหนดฟอนท์ 
      // ฟอนท์ freeserif รองรับภาษาไทย
      $pdf->SetFont('freeserif', '', 14, '', true);
       
       
       
      // เพิ่มหน้า pdf
      // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
      $pdf->AddPage();
       
      // กำหนดเงาของข้อความ 
      $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$id = $_GET['id'];

if($id == 'm'){
    $tbl = '<table cellspacing="0" cellpadding="8" >
    <tr>
           <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ยอดสั่งซื้อสินค้าเดือนนี้้<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

    </tr> ';
}else if($id == 'd'){

    $tbl = '<table cellspacing="0" cellpadding="8" >
    <tr>
           <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ยอดสั่งซื้อสินค้าวันนี้<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

    </tr> ';
    
}else if($id == "all"){

    $tbl = '<table cellspacing="0" cellpadding="8" >
    <tr>
           <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ยอดสั่งซื้อสินค้าทั้งหมด<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

    </tr> ';



}else{
    $tbl = '<table cellspacing="0" cellpadding="8" >
    <tr>
           <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ยอดสั่งซื้อสินค้าปีนี้<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

    </tr> ';
}



// -----------------------------------------------------------------------------
$tbl = $tbl . ' <tr>
           <th width="25%" style="border: 1px solid #000000;  text-align:center;"><b>รหัสสั่งซื้อ</b></th>
           <th width="25%" style="border: 1px solid #000000;  text-align:center;"><b>ผู้สั่ง</b></th>
          <th width="22%" style="border: 1px solid #000000;  text-align:center;"><b>ราคารวม</b></th>
          <th width="28%" style="border: 1px solid #000000;  text-align:center;"><b>สถานะ</b></th>
  
    </tr>'; 

  $this->load->model('Produce_models');

 

  if($id == 'm'){
     $order=$this->Produce_models->order_view_m();
  }else if($id == 'd'){
     $order=$this->Produce_models->order_view_d();
    }else if($id == 'y'){
        $order=$this->Produce_models->order_view_y();
    }else{
        $order=$this->Produce_models->order_view_all();

    }

  foreach ($order as $s) {


   $tbl = $tbl . ' <tr>
        <td style="border: 1px solid #000000;  text-align:center; ">'.$s['order_detail_id'].'</td>
        <td style="border: 1px solid #000000;  text-align:center; ">'.$s['customer_fname']." ".$s['customer_lname'].'</td>
        <td style="border: 1px solid #000000;  text-align:center; ">'.$s['order_detail_total'].' บาท</td>
     <td style="border: 1px solid #000000;  text-align:center; ">'.$s['order_detail_status'].'</td>
       
     
    </tr>'; 
    
  }


    
$tbl = $tbl . '</table>';



$pdf->writeHTML($tbl, true, false, false, false, '');









  // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
 // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

  }



  public function order_detail_by()
  {

      // สร้าง object สำหรับใช้สร้าง pdf 
      $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
       
      // กำหนดรายละเอียดของ pdf
      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetAuthor('Nicola Asuni');
      $pdf->SetTitle('stock');
      $pdf->SetSubject('TCPDF Tutorial');
      $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
       
      // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
      $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
      $pdf->setFooterData(array(0,64,0), array(0,64,128));

      $pdf->setPrintHeader(false);
      $pdf->SetPrintFooter(false);
       
      // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
       
      // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
       
      // กำหนด margins
      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
       
      // กำหนดการแบ่งหน้าอัตโนมัติ
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
       
      // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
      $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
       
      // ---------------------------------------------------------
       
      // set default font subsetting mode
      $pdf->setFontSubsetting(true);
       
      // กำหนดฟอนท์ 
      // ฟอนท์ freeserif รองรับภาษาไทย
      $pdf->SetFont('freeserif', '', 14, '', true);
       
       
       
      // เพิ่มหน้า pdf
      // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
      $pdf->AddPage();
       
      // กำหนดเงาของข้อความ 
      $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$tbl = '<table cellspacing="0" cellpadding="8" >
                 <tr>
                        <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br> ข้อมูลการสั่งซื้อ<br>ณ วันที่ '.Datethai(date("d-m-Y")).'</th>

                 </tr> ';



// -----------------------------------------------------------------------------
$tbl = $tbl . ' <tr>
           <th width="30%" style="border: 1px solid #000000;  text-align:center;"><b>รหัสสินค้า</b></th>
           <th width="50%" style="border: 1px solid #000000;  text-align:center;"><b>ชื่อสินค้า</b></th>
          <th width="20%" style="border: 1px solid #000000;  text-align:center;"><b>จำนวน</b></th>
    </tr>'; 

  $this->load->model('Produce_models');

  $id = $_GET['id'];
  $stock=$this->Produce_models->select_data_stock_detail($id);

  foreach ($stock as $s) {


   $tbl = $tbl . ' <tr>
        <td style="border: 1px solid #000000;  text-align:center; ">P'.$s['product_id'].'</td>
        <td style="border: 1px solid #000000;  text-align:center; ">'.$s['stock_product_name'].'</td>
        <td style="border: 1px solid #000000;  text-align:center; ">'.$s['stock_amount']." ".$s['stock_product_type'].'</td>
    </tr>'; 

  }
    
$tbl = $tbl . '</table>';



$pdf->writeHTML($tbl, true, false, false, false, '');









  // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
 // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('stock.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

  }



  public function order_detail_date()
  {

      // สร้าง object สำหรับใช้สร้าง pdf 
      $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
       
      // กำหนดรายละเอียดของ pdf
      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetAuthor('Nicola Asuni');
      $pdf->SetTitle('order_detail_date');
      $pdf->SetSubject('TCPDF Tutorial');
      $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
       
      // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
      $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
      $pdf->setFooterData(array(0,64,0), array(0,64,128));

      $pdf->setPrintHeader(false);
      $pdf->SetPrintFooter(false);
       
      // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
       
      // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
       
      // กำหนด margins
      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
       
      // กำหนดการแบ่งหน้าอัตโนมัติ
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
       
      // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
      $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
       
      // ---------------------------------------------------------
       
      // set default font subsetting mode
      $pdf->setFontSubsetting(true);
       
      // กำหนดฟอนท์ 
      // ฟอนท์ freeserif รองรับภาษาไทย
      $pdf->SetFont('freeserif', '', 14, '', true);
       
       
       
      // เพิ่มหน้า pdf
      // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
      $pdf->AddPage();
       
      // กำหนดเงาของข้อความ 
      $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
$this->load->helper('Datethai');
$id = $_GET['id'];


$this->load->helper('Datethai');
         $date_start= date($_GET['date_start']);

         $date_end= date($_GET['date_end']);


         $nice_date_start = date('d-m-Y', strtotime($date_start));

         $nice_date_end = date('d-m-Y', strtotime($date_end));


    $tbl = '<table cellspacing="0" cellpadding="8" >
    <tr>
    <th style="border: 1px solid #000000;  text-align:center;" colspan="4" > ห้างหุ่นส่วน โรงน้ำเเข็งธวีชัย<br> รายงาน<br>  ยอดสั่งซื้อสินค้า<br>ระหว่างวันที่ '.Datethai($nice_date_start) .' ถึงวันที่ '.Datethai($nice_date_end).'</th>

    </tr> ';






// -----------------------------------------------------------------------------
$tbl = $tbl . ' <tr>
           <th width="25%" style="border: 1px solid #000000;  text-align:center;"><b>รหัสสั่งซื้อ</b></th>
           <th width="25%" style="border: 1px solid #000000;  text-align:center;"><b>ผู้สั่ง</b></th>
          <th width="22%" style="border: 1px solid #000000;  text-align:center;"><b>ราคารวม</b></th>
          <th width="28%" style="border: 1px solid #000000;  text-align:center;"><b>สถานะ</b></th>
  
    </tr>'; 

  $this->load->model('Produce_models');

 

  $this->load->model('Genpdf_models');
    $orders=$this->Genpdf_models->show_order_date($id,$date_start,$date_end);

    

  foreach ($orders as $s) {


   $tbl = $tbl . ' <tr>
        <td style="border: 1px solid #000000;  text-align:center; ">'.$s['order_detail_id'].'</td>
        <td style="border: 1px solid #000000;  text-align:center; ">'.$s['customer_fname']." ".$s['customer_lname'].'</td>
        <td style="border: 1px solid #000000;  text-align:center; ">'.$s['order_detail_total'].' บาท</td>
     <td style="border: 1px solid #000000;  text-align:center; ">'.$s['order_detail_status'].'</td>
       
     
    </tr>'; 
    
  }


    
$tbl = $tbl . '</table>';



$pdf->writeHTML($tbl, true, false, false, false, '');









  // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
 // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// write some JavaScript code
$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('order_detail_date.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

  }



        
         
}



