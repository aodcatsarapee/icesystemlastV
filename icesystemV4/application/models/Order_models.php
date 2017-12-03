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



     public function order_view_d()
     {

        $this->db->select('order_detail.*,order.*,customers.*');
        
        $this->db->from('order');

        $this->db->join('order_detail', 'order.order_detail_id = order_detail.order_detail_id', 'left');

        $this->db->join('customers', 'order.customer_id = customers.customer_id', 'left');

        $this->db->group_by('order.order_detail_id');

        $this->db->where('order_detail.order_detail_status','ดำเนินการเรียบเรียบเเล้ว');
        
        $this->db->where('DAY(order_detail.order_detail_date)',date('d'));

        $this->db->where('MONTH(order_detail.order_detail_date)',date('m'));

        $this->db->where('YEAR(order_detail.order_detail_date)',date('Y'));


          $sql=$this->db->get();

          return $sql->result_array();

      }


      
     public function order_view_m()
     {

        $this->db->select('order_detail.*,order.*,customers.*');
        
        $this->db->from('order');

        $this->db->join('order_detail', 'order.order_detail_id = order_detail.order_detail_id', 'left');

        $this->db->join('customers', 'order.customer_id = customers.customer_id', 'left');

        $this->db->group_by('order.order_detail_id');

        $this->db->where('order_detail.order_detail_status','ดำเนินการเรียบเรียบเเล้ว');
        
      

        $this->db->where('MONTH(order_detail.order_detail_date)',date('m'));

        $this->db->where('YEAR(order_detail.order_detail_date)',date('Y'));


          $sql=$this->db->get();

          return $sql->result_array();

      }


         
     public function order_view_y()
     {

        $this->db->select('order_detail.*,order.*,customers.*');
        
        $this->db->from('order');

        $this->db->join('order_detail', 'order.order_detail_id = order_detail.order_detail_id', 'left');

        $this->db->join('customers', 'order.customer_id = customers.customer_id', 'left');

        $this->db->group_by('order.order_detail_id');

        $this->db->where('order_detail.order_detail_status','ดำเนินการเรียบเรียบเเล้ว');
        
        $this->db->where('YEAR(order_detail.order_detail_date)',date('Y'));


          $sql=$this->db->get();

          return $sql->result_array();

      }



      public function order_view_all()
      {
 
         $this->db->select('order_detail.*,order.*,customers.*');
         
         $this->db->from('order');
 
         $this->db->join('order_detail', 'order.order_detail_id = order_detail.order_detail_id', 'left');
 
         $this->db->join('customers', 'order.customer_id = customers.customer_id', 'left');
 
         $this->db->group_by('order.order_detail_id');
 
         $this->db->where('order_detail.order_detail_status','ดำเนินการเรียบเรียบเเล้ว');
    
           $sql=$this->db->get();
 
           return $sql->result_array();
 
       }



}

 ?>


 