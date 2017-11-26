<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			//load model
			$this->load->model('billing_model');

	        $this->load->library('cart');
	}

	public function index()
		{	
			$this->load->model('employee_models');
			
			$data1['employee1'] =$this->employee_models->select_data_employee($_SESSION['employee_id']);
			 
			$this->load->view('header',$data1);
	                //Get all data from database
			$data['products'] = $this->billing_model->get_all();
	                //send all product data to "shopping_view", which fetch from database.
			$data['customer']=  $this->billing_model->get_all_customer();	
					 //send all customer data to "shopping_view", which fetch from database.
			$this->load->view('shopping/shopping_view', $data);


			$this->load->view('footer');
	}
	
	 function add()
	{
			$this->load->library('cart');

              // Set array for send data.
			$insert_data = array(

				'id'    => $this->input->post('id'),
				'name'  => $this->input->post('name'),
				'price' => $this->input->post('price'),
				'qty'   => 1
		);		

                 // This function add items into cart.
			$this->cart->insert($insert_data);
 
            // If cart is empty, this will show below message.

		redirect('shopping');
	    
	     }
	
		function remove($rowid) {
                    // Check rowid value.
		if ($rowid==="all"){
                       // Destroy data which store in  session.
			$this->cart->destroy();

		}else{
                    // Destroy selected rowid in session.
			$data = array(

				'rowid'   => $rowid,
				'qty'     => 0
			);
                     // Update cart data, after cancle.
			$this->cart->update($data);
		}
		
                 // This will show cancle data in cart.
		redirect('shopping');
	}
	
	    function update_cart(){
                
                // Recieve post values,calcute them and update
     	    $cart_info =  $_POST['cart'] ;

 		foreach( $cart_info as $id => $cart)
		{	
			$rowid  = $cart['rowid'];

			$price  = $cart['price'];

			$amount = $price * $cart['qty'];

			$qty    = $cart['qty'];
	                    
			$data    = array(

					'rowid'  => $rowid,
					'price'  => $price,
					'product' =>  $amount,
					'qty'    => $qty

			);
             
			$this->cart->update($data);

		}
			redirect('shopping');        
	}	
  
       public function save_order()
	{


			$received=$_POST['received'];
			
			$change=$_POST['change'];

			$total=$_POST['total'];

			$order = array(

				 'sell_detail_received'     =>$received,
				 'sell_detail_change_sell'  =>$change,
				 'sell_detail_total'		=>$total,
				 'sell_detail_date' 		=> date('Y-m-d H:i:s'),
				 'sell_detail_status' =>'ขายสินค้าเป็นเงินสด',	 
				 'sell_detail_pay_status'  =>'ชำระเงินเเล้ว',
			);	


			$ord_id = $this->billing_model->insert_order($order);


			$account = array(

				"sell_id"=>$ord_id,
				"account_detail" =>'ขายสินค้าเป็นเงินสด',
				"account_income"=> $total,
				"account_type" => 'รายรับจากการขายสินค้า',
				"account_datasave" => date('Y-m-d H:i:s'),
				);

				$this->db->insert('account',$account);
						
			$product = $this->billing_model->get_all();
    	
    		foreach ($product as $p) {

    			if ($cart = $this->cart->contents()):

			foreach ($cart as $item):
    			
    			if ($p['product_id']==$item['id']) {
    				# code...  				
    		$upamount = $p['product_amount']-$item['qty'];	

    		$amount=array(

    				'product_amount'   =>$upamount,

    				);

    		$id=$p['product_id'];

			$this->billing_model->update_amout_product($amount,$id);

				$order_detail = array(

					'sell_detail_id'       => $ord_id,
					'product_id' 	       => $item['id'],
					'sell_product_quantity'=> $item['qty'],
					'sell_product_price'   => $item['price']

				);		
                            // Insert product imformation with order detail, store in cart also store in database. 
		       
		   $this->billing_model->insert_order_detail($order_detail);


			}
				endforeach;
		endif;
    		}
               
	}

	 public function save_order_for_debtor()
	{		

			$total=$_POST['total'];

			$result= $_POST['select_customer'];

			$result_explode= explode('-', $result);

        	$select_customer= $result_explode[0]; 

        	//$name= $result_explode[1]; 

	

			$order = array(

				 'sell_detail_total'		=>$total,
				 'sell_detail_date' 		=> date('Y-m-d H:i:s'),
				 'sell_detail_status' =>'ขายสินค้าเป็นเงินเชื่อ',	 
				 'sell_detail_pay_status'  =>'ยังไม่ได้ชำระเงิน',
			);	

			
			$ord_id = $this->billing_model->insert_order($order);

//------------------------- insert debtor for sell ----------------------------------//
			$debtor=array(
				"customer_id" =>$select_customer,
				"sell_id"=>$ord_id,
				"price_total"=>"$total",
				"debtor_status"=>"ยังไม่ได้ชำระเงิน",
				"debtor_datasave"=>date('Y-m-d H:i:s'),
				);

				$this->db->insert('debtor',$debtor);


				$product = $this->billing_model->get_all();
				
					foreach ($product as $p) {
		
						if ($cart = $this->cart->contents()):
		
					foreach ($cart as $item):
						
						if ($p['product_id']==$item['id']) {
							# code...  				
					$upamount = $p['product_amount']-$item['qty'];	
		
					$amount=array(
		
							'product_amount'   =>$upamount,
		
							);
		
					$id=$p['product_id'];
		
					$this->billing_model->update_amout_product($amount,$id);
		
						$order_detail = array(
		
							'sell_detail_id'       => $ord_id,
							'product_id' 	       => $item['id'],
							"customer_id" =>$select_customer,
							'sell_product_quantity'=> $item['qty'],
							'sell_product_price'   => $item['price']
		
						);		
									// Insert product imformation with order detail, store in cart also store in database. 
					   
				   $this->billing_model->insert_order_detail($order_detail);
		
		
					}
						endforeach;
				endif;
					}
	}
		
}