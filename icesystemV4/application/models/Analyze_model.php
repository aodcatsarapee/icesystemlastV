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
}