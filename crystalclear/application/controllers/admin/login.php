<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
  function __construct()
   {
   parent::__construct();
    $this->load->library('session');
   }

 public function logon()
	{
   
		 $this->load->view('admin/login'); 

	}
	
	 public function loging()
	{
	    global $loggeddata;
		global $ldata;
		//$this->load->view('login');
		//$this->load->library('session');
		$this->load->helper('array');
		//$this->load->libraries('session');
		$logindata= array(
		'user_name' => $this->input->post('username'),
		'password'  =>  md5($this->input->post('password'))
		);
		if($logindata['user_name']==NULL && $logindata['password']==NULL && !$this->session->userdata('isLoggedIn'))
		{
		//echo 'here1';
           $this->load->view('admin/login');
		}
		else if($logindata['user_name']!=NULL && $logindata['password']!=NULL && !$this->session->userdata('isLoggedIn'))
		{
		
        $this->load->model('admin/login_model');
		$loggeddata=$this->login_model->log_model($logindata);
		
		if($loggeddata!=NULL)
		{
			
		foreach($loggeddata as $value)
		             {
                        $ldata['name']=ucfirst($value['name']);
						$ldata['id']=$value['id'];
					} 
			$this->load->model('admin/login_model');
		$ldata['orders']=$this->login_model->orders();	
		$ldata['items']=$this->login_model->items();	
			$this->load->view('admin/profile',$ldata);		
		}
		else
		{
			//echo 'here';
		$ldata['validate']=" Incorrect Credentials ";
		$this->load->view('admin/login',$ldata);
		//echo $ldata['validate'];
		}
		}
		else if($this->session->userdata('isLoggedIn'))
		{
			
	
		
						$ldata['name']=$this->session->userdata('username');
						$ldata['id']=$this->session->userdata('resourceid');
						$this->load->model('admin/login_model');
						$ldata['orders']=$this->login_model->orders();	
						$ldata['items']=$this->login_model->items();	
						$this->load->view('admin/profile',$ldata);	
		
	
        }
		
		else
		$this->load->view('admin/login');
		
	}
	
    public function logout()
    {
        $this->session->userdata = array();
        $this->session->sess_destroy();
        $this->load->view('admin/login');
    }
	
}