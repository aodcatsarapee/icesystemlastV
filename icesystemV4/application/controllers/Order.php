<?php 

	class Order extends CI_Controller
	{	
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Order_models');

			$this->load->model('Produce_models');

			$this->load->model('billing_model');
			$this->load->library('Pdf');

		}

		public function index()
		{
			$this->load->model('employee_models');
			$data1['employee1'] =$this->employee_models->select_data_employee($_SESSION['employee_id']);

			$this->load->view('header',$data1);
			
			$data['order']=$this->Order_models->order_view();

			$this->load->view('order/index',$data);
			
			$this->load->view('footer');
		}

		public function show()
		{
			$order_id =$_POST['id'];

			$data['order_detail']=$this->Order_models->show_order_detail($order_id);

			$this->load->view('order/show/select_show_order_detail',$data);
		}

		public function update_order()
		{
			 $order_id = $_POST['order_id'];

			 $order_out_date =$_POST['order_out_date'];

			 $order =  array(
                 'order_detail_status'=>'รับออเดอร์เรียบร้อยเเล้ว',
                 'order_out_date' =>$order_out_date

			 	);
			 $this->db->where('order_detail_id', $order_id);
			 $this->db->update('order_detail',$order);
		

				$stock =array(
					
					"stock_detail_status" => "กำลังดำเนินการผลิตสินค้าที่สั้งซื้อ",
					"stock_detail_date" => date("Y-m-d H:i:s"), 

					);

				$stock_detail_id =$this->Produce_models->insert_sotck_new($stock);


               $order_detail= $this->Order_models->order_detail($order_id);             

                
                foreach (  $order_detail as $key => $value) {
                	
                	 $stock_detail = array(

						 "stock_detail_id" => $stock_detail_id,

						 'order_id'=>  $order_id,

						 "product_id" =>$value['product_id'],

						 "stock_product_name" =>$value['order_product_name'],

						 "stock_amount" =>$value['order_product_quantity'],

						 "stock_product_type" =>'',

							        );

					$this->db->insert("stock",$stock_detail);
                }


		}

		public function check_out_order() //จัดการเมื่อลูกค้ามารับสินค้าเรียบร้อยเเล้ว // เงินสด
		{
			 $order_id = $_POST['id'];

			$order= $this->Order_models->order_check_out_order($order_id);

		   $order_save = array(

				 'sell_detail_total'		=>$order['order_detail_total'],
				 'sell_detail_date' 	=> date('Y-m-d H:i:s'),
				 'sell_detail_status' =>'ขายสินค้าเป็นเงินสดจากการสั้งซื้อ',
				 'sell_detail_pay_status'  =>'ชำระเงินเเล้ว',
				//  'customer_id' 	=>$order['customer_id'],

			);

			$sell = $this->billing_model->insert_order($order_save);

			$account = array(

				 "sell_id"=>$sell,
				"account_detail" =>'ขายสินค้าจากการสั้งซื้อ',
				"account_income"=> $order['order_detail_total'],
				"account_type" => 'รายรับจากการขายสินค้าจากการสั้งซื้อ',
				"account_datasave" => date('Y-m-d H:i:s'),
				);

				$this->db->insert('account',$account);


			 $order_status =  array(
                 'order_detail_status'=>'ดำเนินเรียบเรียบเเล้ว',
                 'order_detail_date' => date('Y-m-d H:i:s'),

			 	);
			 $this->db->where('order_detail_id', $order_id);
			 $this->db->update('order_detail',$order_status);


		 	$product = $this->billing_model->get_all();

		 	$order_detail= $this->Order_models->order_detail($order_id);


		foreach ($product as $p) {


			foreach ($order_detail as $item){

     			if ($item['product_id']==$p['product_id']) {

     		$upamount = $p['product_amount_order']-$item['order_product_quantity'];

     		$amount=array(

     				'product_amount_order'   =>$upamount,

    				);

    		$id=$p['product_id'];

			$this->billing_model->update_amout_product($amount,$id);

				$insert_order_detail = array(

					'product_id' 	=> $item['product_id'],
					'sell_detail_id'=>$sell,
					'order_id'=>$order_id,
					"customer_id" =>$order['customer_id'],
					'sell_product_quantity' => $item['order_product_quantity'],
					'sell_product_price' 	=> $item['order_product_price'],
					'sell_product_total_price'=> $item['order_product_total_price'],
				);
		      $this->billing_model->insert_order_detail($insert_order_detail);

				 }

    		}


		}


	}


	public function check_out_order_debtor() //จัดการเมื่อลูกค้ามารับสินค้าเรียบร้อยเเล้ว // เงินเชื่อ
		{
			 $order_id = $_POST['id'];

			$order= $this->Order_models->order_check_out_order($order_id);

			 $order_save = array(

				 'sell_detail_total'	=>$order['order_detail_total'],
				 'sell_detail_date' 	=> date('Y-m-d H:i:s'),
				 'sell_detail_status' =>'ขายสินค้าเป็นเงินเชื่อจากการสั้งซื้อ',
				 'sell_detail_pay_status'  =>'ยังไม่ได้ชำระเงิน',
				//  'customer_id' 	=>$order['customer_id'],

			);

			$sell = $this->billing_model->insert_order($order_save);

			$debtor=array(
				"customer_id" =>$order['customer_id'],
				"sell_id"=> $sell,
				"price_total"=> $order['order_detail_total'],
				"debtor_status"=>"ยังไม่ได้ชำระเงิน",
				"debtor_datasave"=>date('Y-m-d H:i:s'),
				);

				$this->db->insert('debtor',$debtor);

				$order_status =  array(
					'order_detail_status'=>'ดำเนินเรียบเรียบเเล้ว',
					'order_detail_date' => date('Y-m-d H:i:s'),
   
					);
				$this->db->where('order_detail_id', $order_id);

				$this->db->update('order_detail',$order_status);

		 	$product = $this->billing_model->get_all();

		 	$order_detail= $this->Order_models->order_detail($order_id);


			foreach ($product as $p) {


			foreach ($order_detail as $item){

     			if ($item['product_id']==$p['product_id']) {

     		$upamount = $p['product_amount_order']-$item['order_product_quantity'];

     		$amount=array(

     				'product_amount_order'   =>$upamount,

    				);

    		$id=$p['product_id'];

			$this->billing_model->update_amout_product($amount,$id);

				$insert_order_detail = array(

					'product_id' 	=> $item['product_id'],
					'sell_detail_id'=>$sell,
					'order_id'=>$order_id,
					"customer_id" =>$order['customer_id'],
					'sell_product_quantity' => $item['order_product_quantity'],
					'sell_product_price' 	=> $item['order_product_price'],
					'sell_product_total_price'=> $item['order_product_total_price'],

				);

		      $this->billing_model->insert_order_detail($insert_order_detail);

				 }

    		}


		}


	}
		

}

?>