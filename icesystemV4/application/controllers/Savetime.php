<?php
/**
 * Created by PhpStorm.
 * User: sorsak tonken
 * Date: 12/21/2017
 * Time: 8:55 PM
 */
class Savetime extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if($_SESSION['type']=='admin' || $_SESSION['type']=='emp_account' || $_SESSION['type']=='manager'){
            $this->load->view('savetime/index');
        }else{
            redirect(base_url()."index");
        }

    }
}