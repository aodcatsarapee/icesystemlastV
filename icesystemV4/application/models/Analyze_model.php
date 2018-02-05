<?php
/**
 * Created by PhpStorm.
 * User: aodca
 * Date: 12/16/2017
 * Time: 3:10 PM
 */


class Analyze_model extends CI_Model
{
    public function get_product()
    {
        $this->db->order_by('product_id', 'ASC');
        return $this->db->get('product');
    }
    public function get_sell($product_id,$i)
    {   
            $this->db->select(' sell.product_id ,SUM(sell.sell_product_quantity) as qty');
            $this->db->join('sell_detail', 'sell_detail.sell_detail_id = sell.sell_detail_id ');         
            $this->db->where('sell.product_id',$product_id);
            $this->db->where('sell.order_id',NULL);
            if($i == -1){
                $this->db->where('DAY(sell_detail.sell_detail_date)',(date('d')-1));
            }elseif($i == -2){
                $this->db->where('DAY(sell_detail.sell_detail_date)',(date('d')-2));
            }elseif($i == -3){
                $this->db->where('DAY(sell_detail.sell_detail_date)',(date('d')-3));
            }elseif($i == -4){
                $this->db->where('DAY(sell_detail.sell_detail_date)',(date('d')-4));
            }elseif($i == -5){
                $this->db->where('DAY(sell_detail.sell_detail_date)',(date('d')-5));
            }elseif($i == -6){
                $this->db->where('DAY(sell_detail.sell_detail_date)',(date('d')-6));
            }elseif($i == -7){
                $this->db->where('DAY(sell_detail.sell_detail_date)',(date('d')-7));
            }
            $this->db->where('MONTH(sell_detail.sell_detail_date)',date('m'));
            $this->db->where('YEAR(sell_detail.sell_detail_date)',date('Y'));
            $this->db->group_by('sell.product_id',$product_id);
            return $this->db->get('sell');
    }

    public function get_sell_w($product_id,$w)
    {   
            $this->db->select(' sell.product_id ,SUM(sell.sell_product_quantity) as qty');
            $this->db->join('sell_detail', 'sell_detail.sell_detail_id = sell.sell_detail_id ');         
            $this->db->where('sell.product_id',$product_id);
            $this->db->where('sell.order_id',NULL);                
            if($w == -1 ){
                $start_date = date('Y-m-d');
                $end_date = date('Y-m-d', strtotime("-1 week"));
            }elseif($w == -2){
                $start_date = date('Y-m-d',strtotime("-1 week"));
                $end_date = date('Y-m-d', strtotime("-2 week"));
            }elseif($w == -3){
                $start_date = date('Y-m-d',strtotime("-2 week"));
                $end_date = date('Y-m-d', strtotime("-3 week"));
            }else{
                $start_date = date('Y-m-d',strtotime("-3 week"));
                $end_date = date('Y-m-d', strtotime("-4 week"));
            }
            $this->db->where('sell_detail.sell_detail_date >=',$end_date);
            $this->db->where('sell_detail.sell_detail_date <=',$start_date);
            $this->db->group_by('sell.product_id',$product_id);
            return $this->db->get('sell');
    }

    public function get_sell_m($product_id,$m)
    {   
            $this->db->select(' sell.product_id ,SUM(sell.sell_product_quantity) as qty');
            $this->db->join('sell_detail', 'sell_detail.sell_detail_id = sell.sell_detail_id ');         
            $this->db->where('sell.product_id',$product_id);
            $this->db->where('sell.order_id',NULL);                
            if($m == -1 ){
                 $start_date = date('Y-m-d');
                $end_date = date('Y-m-d', strtotime("-1 month"));
            }elseif($m == -2){
                $start_date = date('Y-m-d',strtotime("-1 month"));
                $end_date = date('Y-m-d', strtotime("-2 month"));
            }elseif($m == -3){
                $start_date = date('Y-m-d',strtotime("-2 month"));
                $end_date = date('Y-m-d', strtotime("-3 month"));
            }else{
                $start_date = date('Y-m-d',strtotime("-3 month"));
                $end_date = date('Y-m-d', strtotime("-4 month"));
            }
            $this->db->where('sell_detail.sell_detail_date >=',$end_date);
            $this->db->where('sell_detail.sell_detail_date <=',$start_date);
            $this->db->group_by('sell.product_id',$product_id);
            return $this->db->get('sell');
    }
}
