<?php 
	class Order_models extends CI_Model
	{

     public function order_view()
     {
     	$this->db->select('order_detail.*');

     	$this->db->from('order_detail');

        //   $this->db->join('customers', 'order.Customer_id = customers.Customer_id', 'left');

     	$sql=$this->db->get();

     	return $sql->result_array();
     }

     public function show_order_detail($order_id)
     {
     	$this->db->select('order_detail.*,order.*,customers.*');
     	
     	$this->db->from('order');

     	$this->db->join('order_detail', 'order.order_detail_id = order_detail.order_detail_id', 'left');

     	$this->db->join('customers', 'order.customer_id = customers.customer_id', 'left');
     	
     	$this->db->where('order.order_detail_id',$order_id);

     	$sql=$this->db->get();

     	return $sql->result_array();
     }


     public function order_detail($order_id)
     {
          $this->db->select('*');
          
          $this->db->from('order');
          
          $this->db->where('order_detail_id',$order_id);

          $sql=$this->db->get();

          return $sql->result_array();
     }

     public function order_check_out_order($order_id)
     {
          $this->db->select('*');
          
          $this->db->from('order_detail');

          $this->db->join('order' ,'order_detail.order_detail_id = order.order_detail_id','left');

          $this->db->where('order_detail.order_detail_id',$order_id);


          $sql=$this->db->get();

          return $sql->row_array();
     }



}

 ?>


 