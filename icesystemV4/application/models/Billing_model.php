<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Billing_model extends CI_Model {
    
     // Get all details ehich store in "products" table in database.
        public function get_all()
	{
		{
			$this->db->select('*');
			
			$this->db->from('product');
			
			$this->db->order_by('product_id', 'DESC');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->result_array();
			}
			else
			{
				return $sql->result_array();
			}

			}
	}

	 public function get_sell()
	{
		{
			$this->db->select('*');
			
			$this->db->from('sell_detail');
			
			$this->db->order_by('sell_detail_id', 'DESC');

			$sql=$this->db->get();
				
				return $sql->row_array();
			

			}
	}

		 public function get_sell_id($id)
	{
		{
			$this->db->select('*');
			
			$this->db->from('sell_detail');
			
			$this->db->order_by('sell_detail_id', 'DESC');

			$this->db->where('sell_detail_id',$id);

			$sql=$this->db->get();
				
				return $sql->row_array();
			

			}
	}
	

	  public function get_all_customer()
	{
		{
			$this->db->select('*');
			
			$this->db->from('customers');
			
			//$this->db->order_by('customer_id', 'DESC');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->result_array();
			}
			else
			{
				return $sql->result_array();
			}

			}
	}
    
    // Insert customer details in "customer" table in database.
	public function insert_customer($data)
	{
		$this->db->insert('customers', $data);

		$id = $this->db->insert_id();

		return (isset($id)) ? $id : FALSE;		
	}
	
        // Insert order date with customer id in "orders" table in database.
	public function insert_order($data)
	{
		$this->db->insert('sell_detail', $data);

		$id = $this->db->insert_id();

		return (isset($id)) ? $id : FALSE;
	}
	
        // Insert ordered product detail in "order_detail" table in database.
	public function insert_order_detail($data)
	{
		$this->db->insert('sell', $data);
	}

	public function update_amout_product($amount,$id)
	{
		$this->db->where("product_id",$id);
		
		$this->db->update('product',$amount);
		
	}

// ------------------------  เสดงรายการขายรายวัน
	public function orders()
	{
		
			$this->db->select('*');
			
			$this->db->from('sell_detail');
            
            $this->db->where('DAY(sell_detail_date)',date('d'));

            $this->db->where('MONTH(sell_detail_date)',date('m'));

            $this->db->where('YEAR(sell_detail_date)',date('Y'));


			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->result_array();
			}
			else
			{
				return $sql->result_array();
			}

		}  


		public function orders_selcet_cash()
	{
		
			$this->db->select('*');
			
			$this->db->from('sell_detail');
			
			$this->db->where('DAY(sell_detail_date)',date('d'));

			$this->db->where('MONTH(sell_detail_date)',date('m'));

			$this->db->where('YEAR(sell_detail_date)',date('Y'));

            $this->db->where('sell_detail_status','ขายสินค้าเป็นเงินสด');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->num_rows();
			}
			else
			{
				return $sql->num_rows();
			}

		} 

		public function orders_selcet_cash_sell()
	{
		
			$this->db->select('*');
			
			$this->db->from('sell_detail');
			
			$this->db->where('DAY(sell_detail_date)',date('d'));

			$this->db->where('MONTH(sell_detail_date)',date('m'));

			$this->db->where('YEAR(sell_detail_date)',date('Y'));

            $this->db->where('sell_detail_status','ขายสินค้าเป็นเงินสดจากการสั้งซื้อ');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->num_rows();
			}
			else
			{
				return $sql->num_rows();
			}

		} 


			public function orders_selcet_credit()
	{
		
			$this->db->select('*');
			
			$this->db->from('sell_detail');
			
			$this->db->where('DAY(sell_detail_date)',date('d'));

			$this->db->where('MONTH(sell_detail_date)',date('m'));

			$this->db->where('YEAR(sell_detail_date)',date('Y'));

            $this->db->where('sell_detail_status','ขายสินค้าเป็นเงินเชื่อ');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->num_rows();
			}
			else
			{
				return $sql->num_rows();
			}

		}
				public function orders_selcet_credit_sell()
	{
		
			$this->db->select('*');
			
			$this->db->from('sell_detail');
			
			$this->db->where('DAY(sell_detail_date)',date('d'));

			$this->db->where('MONTH(sell_detail_date)',date('m'));

			$this->db->where('YEAR(sell_detail_date)',date('Y'));

            $this->db->where('sell_detail_status','ขายสินค้าเป็นเงินเชื่อจากการสั้งซื้อ');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->num_rows();
			}
			else
			{
				return $sql->num_rows();
			}

		} 

// ------------------------  เสดงรายการขายรายเือน
public function orders_m()
	{
		
		$this->db->select('*');
		
		$this->db->from('sell_detail');
		
		$this->db->where('MONTH(sell_detail_date)',date('m'));

		$this->db->where('YEAR(sell_detail_date)',date('Y'));

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->result_array();
			}
			else
			{
				return $sql->result_array();
			}

		}  


		public function orders_selcet_cash_m()
	{
		
		$this->db->select('*');
		
		$this->db->from('sell_detail');
		
		$this->db->where('MONTH(sell_detail_date)',date('m'));

		$this->db->where('YEAR(sell_detail_date)',date('Y'));


            $this->db->where('sell_detail_status','ขายสินค้าเป็นเงินสด');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->num_rows();
			}
			else
			{
				return $sql->num_rows();
			}

		}

			public function orders_selcet_cash_m_sell()
	{
		
		$this->db->select('*');
		
		$this->db->from('sell_detail');
		
		$this->db->where('MONTH(sell_detail_date)',date('m'));

		$this->db->where('YEAR(sell_detail_date)',date('Y'));


            $this->db->where('sell_detail_status','ขายสินค้าเป็นเงินสดจากการสั้งซื้อ');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->num_rows();
			}
			else
			{
				return $sql->num_rows();
			}

		}

			public function orders_selcet_credit_m()
	{
		
		$this->db->select('*');
		
		$this->db->from('sell_detail');
		
		$this->db->where('MONTH(sell_detail_date)',date('m'));

		$this->db->where('YEAR(sell_detail_date)',date('Y'));

            $this->db->where('sell_detail_status','ขายสินค้าเป็นเงินเชื่อ');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->num_rows();
			}
			else
			{
				return $sql->num_rows();
			}

		} 
		public function orders_selcet_credit_m_sell()
	{
			$this->db->select('*');
			
			$this->db->from('sell_detail');
			
			$this->db->where('MONTH(sell_detail_date)',date('m'));

			$this->db->where('YEAR(sell_detail_date)',date('Y'));

            $this->db->where('sell_detail_status','ขายสินค้าเป็นเงินเชื่อจากการสั้งซื้อ');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->num_rows();
			}
			else
			{
				return $sql->num_rows();
			}

		} 
		
		// ------------------------  เสดงรายการขายรายปี ----------------//
public function orders_y()
	{		
		$this->db->select('*');
		
		$this->db->from('sell_detail');
	
		$this->db->where('YEAR(sell_detail_date)',date('Y'));

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->result_array();
			}
			else
			{
				return $sql->result_array();
			}

		}  


		public function orders_selcet_cash_y()
	{
		
			$this->db->select('*');
			
			$this->db->from('sell_detail');
		
			$this->db->where('YEAR(sell_detail_date)',date('Y'));

            $this->db->where('sell_detail_status','ขายสินค้าเป็นเงินสด');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->num_rows();
			}
			else
			{
				return $sql->num_rows();
			}

		} 
			public function orders_selcet_cash_y_sell()
	{
		
			$this->db->select('*');
			
			$this->db->from('sell_detail');
		
			$this->db->where('YEAR(sell_detail_date)',date('Y'));

            $this->db->where('sell_detail_status','ขายสินค้าเป็นเงินสดจากการสั้งซื้อ');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->num_rows();
			}
			else
			{
				return $sql->num_rows();
			}

		} 

			public function orders_selcet_credit_y()
	{
		
		$this->db->select('*');
		
		$this->db->from('sell_detail');
	
		$this->db->where('YEAR(sell_detail_date)',date('Y'));

            $this->db->where('sell_detail_status','ขายสินค้าเป็นเงินเชื่อ');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->num_rows();
			}
			else
			{
				return $sql->num_rows();
			}

		}
		public function orders_selcet_credit_y_sell()
	{
		
			$this->db->select('*');
			
			$this->db->from('sell_detail');
		
			$this->db->where('YEAR(sell_detail_date)',date('Y'));



            $this->db->where('sell_detail_status','ขายสินค้าเป็นเงินเชื่อจากการสั้งซื้อ');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->num_rows();
			}
			else
			{
				return $sql->num_rows();
			}

		} 

		// ------------------------  เสดงรายการขายทั้งหมด	
public function orders_all()
	{
		
		$this->db->select('*');
		
		$this->db->from('sell_detail');
           
			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->result_array();
			}
			else
			{
				return $sql->result_array();
			}

		}  


		public function orders_selcet_cash_all()
	{
		
		$this->db->select('*');
		
		$this->db->from('sell_detail');
           
            $this->db->where('sell_detail_status','ขายสินค้าเป็นเงินสด');

			$sql=$this->db->get();
			
				if ($sql->num_rows() > 0) {
				
				return $sql->num_rows();
			}
			else
			{
				return $sql->num_rows();
			}


		}
		public function orders_selcet_cash_all_sell()
	{
		
			$this->db->select('*');
			
			$this->db->from('sell_detail');
           
            $this->db->where('sell_detail_status','ขายสินค้าเป็นเงินสดจากการสั้งซื้อ');

			$sql=$this->db->get();
			
				if ($sql->num_rows() > 0) {
				
				return $sql->num_rows();
			}
			else
			{
				return $sql->num_rows();
			}


		} 

			public function orders_selcet_credit_all()
	{
		
			$this->db->select('*');
			
			$this->db->from('sell_detail');
            
            $this->db->where('sell_detail_status','ขายสินค้าเป็นเงินเชื่อ');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->num_rows();
			}
			else
			{
				return $sql->num_rows();
			}

		}
		public function orders_selcet_credit_all_sell()
	{
		
			$this->db->select('*');
			
			$this->db->from('sell_detail');
            
            $this->db->where('sell_detail_status','ขายสินค้าเป็นเงินเชื่อจากการสั้งซื้อ');

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->num_rows();
			}
			else
			{
				return $sql->num_rows();
			}

		} 

	public function select_order_for_show_sell($id)
	{
		
			$this->db->select('sell_detail.*,product.*,sell.*');
			
			$this->db->from('sell');

			$this->db->join('product', 'sell.product_id = product.product_id', 'left'); 

			$this->db->join('sell_detail', 'sell_detail.sell_detail_id = sell.sell_detail_id ', 'left'); 

			$this->db->where('sell.sell_detail_id',$id);

			$sql=$this->db->get();
			
			if ($sql->num_rows() > 0) {
				
				return $sql->result_array();
			}
			else
			{
				return $sql->result_array();
			}

		}

	public function select_sell_for_sell_detail($id)
	{
		$this->db->select('sell.*,customers.*,sell_detail.*');
		$this->db->from('sell');
		$this->db->join('customers', 'customers.customer_id = sell.customer_id', 'left');
		$this->db->join('sell_detail', 'sell.sell_detail_id = sell_detail.sell_detail_id', 'left');

		$this->db->where('sell.sell_detail_id',$id);

		$sql=$this->db->get();
		
		return $sql->row_array();
	}

}