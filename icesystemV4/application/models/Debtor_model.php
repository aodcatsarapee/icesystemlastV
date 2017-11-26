<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Debtor_model extends CI_Model {
    
     // Get all details ehich store in "products" table in database.


      
		 public function debtor_view()
       {

			$this->db->select('debtor.*,customers.*');
			
			$this->db->from('debtor');

			$this->db->join('customers', 'debtor.customer_id = customers.customer_id', 'left'); 
			
			$this->db->order_by('debtor_id', 'DESC');

			$this->db->where('debtor_status','ยังไม่ได้ชำระเงิน');

			$sql=$this->db->get();

       		return $sql->result_array();
		}

		public function debtor_view_num_row()
       {

			$this->db->select('debtor.*,customers.*');
			
			$this->db->from('debtor');

			$this->db->join('customers', 'debtor.customer_id = customers.customer_id', 'left'); 
			
			$this->db->order_by('debtor_id', 'DESC');

			$this->db->where('debtor_status','ยังไม่ได้ชำระเงิน');

			$sql=$this->db->get();

       	
			return $sql->num_rows();
		}


			 public function debtor_view_d()
       {

			$this->db->select('debtor.*,customers.*');
			
			$this->db->from('debtor');

			$this->db->join('customers', 'debtor.customer_id = customers.customer_id', 'left'); 
			
			$this->db->order_by('debtor_id', 'DESC');

			$this->db->where('debtor_status','ชำระเงินเเล้ว');

			$this->db->where('DAY(debtor_datasave)',date('d'));

			$this->db->where('MONTH(debtor_datasave)',date('m'));

			$this->db->where('YEAR(debtor_datasave)',date('Y'));


			$sql=$this->db->get();

			return $sql->result_array();

		}

				 public function debtor_view_d_num_row()
       {

			$this->db->select('debtor.*,customers.*');
			
			$this->db->from('debtor');

			$this->db->join('customers', 'debtor.customer_id = customers.customer_id', 'left'); 
			
			$this->db->order_by('debtor_id', 'DESC');

			$this->db->where('debtor_status','ชำระเงินเเล้ว');

			$this->db->where('DAY(debtor_datasave)',date('d'));

			$this->db->where('MONTH(debtor_datasave)',date('m'));

			$this->db->where('YEAR(debtor_datasave)',date('Y'));
			

			$sql=$this->db->get();

			return $sql->num_rows();

		}


		public function debtor_view_m()
       {

			$this->db->select('debtor.*,customers.*');
			
			$this->db->from('debtor');

			$this->db->join('customers', 'debtor.customer_id = customers.customer_id', 'left'); 
			
			$this->db->order_by('debtor_id', 'DESC');

			$this->db->where('debtor_status','ชำระเงินเเล้ว');

			$this->db->where('MONTH(debtor_datasave)',date('m'));

			$this->db->where('YEAR(debtor_datasave)',date('Y'));

			$sql=$this->db->get();

			return $sql->result_array();

		}

				 public function debtor_view_num_row_m()
       {

			$this->db->select('debtor.*,customers.*');
			
			$this->db->from('debtor');

			$this->db->join('customers', 'debtor.customer_id = customers.customer_id', 'left'); 
			
			$this->db->order_by('debtor_id', 'DESC');

			$this->db->where('debtor_status','ชำระเงินเเล้ว');

			$this->db->where('MONTH(debtor_datasave)',date('m'));

			$this->db->where('YEAR(debtor_datasave)',date('Y'));

			$sql=$this->db->get();

			return $sql->num_rows();

		}


		public function debtor_view_y()
       {

			$this->db->select('debtor.*,customers.*');
			
			$this->db->from('debtor');

			$this->db->join('customers', 'debtor.customer_id = customers.customer_id', 'left'); 
			
			$this->db->order_by('debtor_id', 'DESC');

			$this->db->where('debtor_status','ชำระเงินเเล้ว');

			$this->db->where('YEAR(debtor_datasave)',date('Y'));

			$sql=$this->db->get();

			return $sql->result_array();

		}

				 public function debtor_view_num_row_y()
       {

			$this->db->select('debtor.*,customers.*');
			
			$this->db->from('debtor');

			$this->db->join('customers', 'debtor.customer_id = customers.customer_id', 'left'); 
			
			$this->db->order_by('debtor_id', 'DESC');

			$this->db->where('debtor_status','ชำระเงินเเล้ว');

			$this->db->where('YEAR(debtor_datasave)',date('Y'));

			$sql=$this->db->get();

			return $sql->num_rows();

		}


			public function debtor_view_all()
       {

			$this->db->select('debtor.*,customers.*');
			
			$this->db->from('debtor');

			$this->db->join('customers', 'debtor.customer_id = customers.customer_id', 'left'); 
			
			$this->db->order_by('debtor_id', 'DESC');

			$this->db->where('debtor_status','ชำระเงินเเล้ว');

			$sql=$this->db->get();

			return $sql->result_array();

		}

				 public function debtor_view_num_row_all()
       {

			$this->db->select('debtor.*,customers.*');
			
			$this->db->from('debtor');

			$this->db->join('customers', 'debtor.customer_id = customers.customer_id', 'left'); 
			
			$this->db->order_by('debtor_id', 'DESC');

			$this->db->where('debtor_status','ชำระเงินเเล้ว');

			$sql=$this->db->get();

			return $sql->num_rows();

		}



















		 public function show_debtor_detail($result_debtor_id)
       {

			$this->db->select('debtor.*,customers.*');
			
			$this->db->from('debtor');

			$this->db->join('customers', 'debtor.customer_id = customers.customer_id', 'left'); 
			
			$this->db->order_by('debtor_id', 'DESC');

			$this->db->where('debtor_id',$result_debtor_id);

			$sql=$this->db->get();
       				
			return $sql->row_array();
		}


		public function update_debtor($debtor_id,$ar)
		{
			 $this->db->where("debtor_id",$debtor_id);
       		 $this->db->update("debtor",$ar);
		}





       
}

?>