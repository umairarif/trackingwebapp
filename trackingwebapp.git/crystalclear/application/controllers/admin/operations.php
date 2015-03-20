<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operations extends CI_Controller {
  function __construct()
   {
   parent::__construct();
    $this->load->library('session');
   }

 public function editorder()
	{
	     $id=$this->uri->segment(4);
		 $this->load->model('admin/operations_model');
		 $data['edata']=$this->operations_model->edit($id);
   
		 $this->load->view('admin/editorder',$data); 

	}
	 public function edititems()
	{
	     $id=$this->uri->segment(4);
		 $this->load->model('admin/operations_model');
		 $data['edata']=$this->operations_model->edititems($id);
   
		 $this->load->view('admin/edititems',$data); 
	}
	 public function additems()
	{
	
	        if($_SERVER['REQUEST_METHOD'] == "POST")
	        {
	        $data= array(
		                   'name' => $this->input->post('cname'),
		                   'price'  =>  $this->input->post('cphone'),
		                  );
	         $this->load->model('admin/operations_model');
		 $this->operations_model->additems($data);
		 redirect('admin/login/loging');
	        
	        }
		else if($_SERVER['REQUEST_METHOD'] != "POST")
                {
                 $this->load->view('admin/additems'); 
                }
   
		 
	}
	
	 public function updateitems()
	{
	     $id=$this->uri->segment(4);
		$updatedata= array(
		'name' => $this->input->post('cname'),
		'price'  =>  $this->input->post('cphone'),
		);
		 $this->load->model('admin/operations_model');
		 $this->operations_model->updateitems($id,$updatedata);
		 redirect('admin/login/loging');

	}
	
	 public function updateorder()
	{
	     $id=$this->uri->segment(4);
		$updatedata= array(
		'name' => $this->input->post('cname'),
		'email'  =>  $this->input->post('cemail'),
		'phone'=> $this->input->post('cphone'),
		'address'=> $this->input->post('caddress')
		);
		 $this->load->model('admin/operations_model');
		 $this->operations_model->update($id,$updatedata);
		 redirect('admin/login/loging');

	}
	 public function order()
	{
	         if($this->input->post('button')=='Delete')
	         {
		 $id=$this->input->post('all');
		 $this->load->model('admin/operations_model');
		 $this->operations_model->delete($id);
                 redirect('admin/login/loging');
                 }
                 else if($this->input->post('button')=='Mark Complete')
                 {
                 $id=$this->input->post('all');
                 $updatedata= array(
		'dateout' => date('Y-m-d H:i:s'),
		                   );
                 $this->load->model('admin/operations_model');
		 $maildata=$this->operations_model->complete($id,$updatedata);
		 foreach($maildata as $value)
		 {
		 $mail_to = $value['email'];
                 $subject = 'Order Completed';
$body_message='Dear Sir/Madam,

your order has been completed. Thank you for choosing Crystal Clear Drycleaners.
Please give us your feedback on feedback@crystalclear-drycleaner.co.uk

Regards,
Crystal Clear Team';
        $headers = 'From:Donotreply@crystalclear-drycleaners.co.uk'."\r\n";
        $mail_status = mail($mail_to, $subject, $body_message, $headers);
        }

                 redirect('admin/login/loging');
                 }
          
	}
		 public function deleteitems()
	{
		 $id=$this->uri->segment(4);
		 $this->load->model('admin/operations_model');
		 $this->operations_model->deleteitem($id);
          redirect('admin/login/loging');
	}
	
}