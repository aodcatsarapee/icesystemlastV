<?php 

	class produce_product_models extends CI_Model
	{
		public function stock_view ()
		{
			
			$this->db->select('*');
			
			$this->db->from('stock_detail');
			
			$sql=$this->db->get();
			
			return $sql->result_array();
			

			}
		public function stock_view_dd()
		{
			
			$this->db->select('SUM(stock_amount) as amount,stock_detail.*,stock.*');
			
			$this->db->from('stock');

			 $this->db->join('stock_detail', 'stock.stock_detail_id = stock_detail.stock_detail_id', 'left'); 

			$this->db->group_by('stock.product_id'); 

			$this->db->order_by('stock.product_id', 'DESC');

			$this->db->where('DAY(stock_detail.stock_detail_date)',date('d'));

			$this->db->where('MONTH(stock_detail.stock_detail_date)',date('m'));

			$this->db->where('YEAR(stock_detail.stock_detail_date)',date('Y'));

			$this->db->where('stock_detail.stock_detail_status','รับสินค้าเข้าคลังเเล้ว');
			
			$sql=$this->db->get();
			
			return $sql->result_array();
			
			}

			public function stock_view_dd_for_view ()
		{
			
			$this->db->select('*');
			
			$this->db->from('stock_detail');
			
			$this->db->where('DAY(stock_detail_date)',date('d'));

			$this->db->where('MONTH(stock_detail_date)',date('m'));

			$this->db->where('YEAR(stock_detail_date)',date('Y'));

			$this->db->order_by('stock_detail_id', 'DESC');

			$this->db->where('stock_detail_status','รับสินค้าเข้าคลังเเล้ว');
			
			$sql=$this->db->get();
			
			return $sql->result_array();
			
			}
			
/*---------------------------------------------------------------------------------*/
			
			public function stock_view_d ()
		{
			$this->db->select('SUM(stock_amount) as amount,stock_detail.*,stock.*');
			
			$this->db->from('stock');

			 $this->db->join('stock_detail', 'stock.stock_detail_id = stock_detail.stock_detail_id', 'left'); 

			$this->db->group_by('stock.product_id'); 

			$this->db->order_by('stock.product_id', 'DESC');

			$this->db->where('MONTH(stock_detail.stock_detail_date)',date('m'));

			$this->db->where('YEAR(stock_detail.stock_detail_date)',date('Y'));

			$this->db->where('stock_detail.stock_detail_status','รับสินค้าเข้าคลังเเล้ว');
			
			$sql=$this->db->get();
			
			return $sql->result_array();
			

			}

			public function stock_view_d_for_view ()
		{
			
			$this->db->select('*');
			
			$this->db->from('stock_detail');
			
			$this->db->where('MONTH(stock_detail_date)',date('m'));

			$this->db->where('YEAR(stock_detail_date)',date('Y'));

			$this->db->order_by('stock_detail_id', 'DESC');

			$this->db->where('stock_detail_status','รับสินค้าเข้าคลังเเล้ว');
			
			$sql=$this->db->get();
			
			return $sql->result_array();
			
			}
			
/*------------------------------------------------------------------------------*/
			public function stock_view_y ()
		{
			
			$this->db->select('SUM(stock_amount) as amount,stock_detail.*,stock.*');
			
			$this->db->from('stock');

			 $this->db->join('stock_detail', 'stock.stock_detail_id = stock_detail.stock_detail_id', 'left'); 

			$this->db->group_by('stock.product_id'); 

			$this->db->order_by('stock.product_id', 'DESC');

			$this->db->where('YEAR(stock_detail.stock_detail_date)',date('Y'));

			$this->db->where('stock_detail.stock_detail_status','รับสินค้าเข้าคลังเเล้ว');
			
			$sql=$this->db->get();
			
			return $sql->result_array();		

			}

			public function stock_view_y_for_view ()
		{
			
			$this->db->select('*');
			
			$this->db->from('stock_detail');
			
			$this->db->where('YEAR(stock_detail_date)',date('Y'));

			$this->db->order_by('stock_detail_id', 'DESC');

			$this->db->where('stock_detail_status','รับสินค้าเข้าคลังเเล้ว');
			
			$sql=$this->db->get();
			
			return $sql->result_array();
			
			}

			public function stock_view_all ()
		{
			
			$this->db->select('SUM(stock_amount) as amount,stock_detail.*,stock.*');
			
			$this->db->from('stock');

			 $this->db->join('stock_detail', 'stock.stock_detail_id = stock_detail.stock_detail_id', 'left'); 

			$this->db->group_by('stock.product_id'); 

			$this->db->order_by('stock.product_id', 'DESC');

			$this->db->where('stock_detail.stock_detail_status','รับสินค้าเข้าคลังเเล้ว');
			
			$sql=$this->db->get();
			
			return $sql->result_array();	
			

			}
			public function stock_view_all_for_view ()
		{
			
			$this->db->select('*');
			
			$this->db->from('stock_detail');
			
			$this->db->order_by('stock_detail_id', 'DESC');

			$this->db->where('stock_detail_status','รับสินค้าเข้าคลังเเล้ว');
			
			$sql=$this->db->get();
			
			return $sql->result_array();
			
		}
			public function update_status($id,$ar)
			{
				$this->db->where("stock_detail_id",$id);
				$this->db->update('stock_detail',$ar);
			}
	}

?>