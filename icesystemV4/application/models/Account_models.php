<?php 
class Account_models extends CI_Model
  { 

    public function accunt_show()
   {
       $this->db->select('*');

       $this->db->from('account');

     $this->db->where('DAY(account_datasave)',date('d'));

     $this->db->where('MONTH(account_datasave)',date('m'));

     $this->db->where('YEAR(account_datasave)',date('Y'));

       $this->db->order_by('account_id', 'DESC');

       $sql=$this->db->get();

       return $sql->result_array();
 }
     public function accunt_show_row()
   {
       $this->db->select('*');

       $this->db->from('account');

     $this->db->where('DAY(account_datasave)',date('d'));

     $this->db->where('MONTH(account_datasave)',date('m'));

     $this->db->where('YEAR(account_datasave)',date('Y'));

       $this->db->order_by('account_id', 'DESC');

       $sql=$this->db->get();

       return $sql->num_rows();
 }


     public function accunt_show_m()
   {
       $this->db->select('*');

       $this->db->from('account');

     $this->db->where('MONTH(account_datasave)',date('m'));

     $this->db->where('YEAR(account_datasave)',date('Y'));

       $this->db->order_by('account_id', 'DESC');

       $sql=$this->db->get();

       return $sql->result_array();
 }
     public function accunt_show_row_m()
   {
       $this->db->select('*');

       $this->db->from('account');


     $this->db->where('MONTH(account_datasave)',date('m'));

     $this->db->where('YEAR(account_datasave)',date('Y'));

       $this->db->order_by('account_id', 'DESC');

       $sql=$this->db->get();

       return $sql->num_rows();
 }

     public function accunt_show_y()
   {
       $this->db->select('*');

       $this->db->from('account');

     $this->db->where('YEAR(account_datasave)',date('Y'));

       $this->db->order_by('account_id', 'DESC');

       $sql=$this->db->get();

       return $sql->result_array();
 }
     public function accunt_show_row_y()
   {
       $this->db->select('*');

       $this->db->from('account');

       $this->db->where('YEAR(account_datasave)',date('Y'));

       $this->db->order_by('account_id', 'DESC');

       $sql=$this->db->get();

       return $sql->num_rows();
 }

     public function accunt_show_all()
   {
       $this->db->select('*');

       $this->db->from('account');

       $this->db->order_by('account_id', 'DESC');

       $sql=$this->db->get();

       return $sql->result_array();
 }
     public function accunt_show_row_all()
   {
       $this->db->select('*');

       $this->db->from('account');

       $this->db->order_by('account_id', 'DESC');

       $sql=$this->db->get();

       return $sql->num_rows();
 }

  public function select_accunt_show($id)
  {
     $this->db->select('*');

       $this->db->from('account');

        $this->db->where('account_id',$id);

        $sql=$this->db->get();

        return $sql->row_array();
  }





  }




 ?>