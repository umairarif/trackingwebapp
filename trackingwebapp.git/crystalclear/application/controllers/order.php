<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
  function __construct()
   {
   parent::__construct();
    $this->load->library('session');
   }

 public function orderfirst()
	{
	      
	        
                $this->load->model('order_model');
		$idata['items']=$this->order_model->itemlist();      
		 $this->load->view('order1',$idata); 

	}

    public function orderbook()
	{
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['o1']))
		{
		$items=$this->input->post('selectitems');
		 $this->session->set_userdata(array(
		 'itms'=>implode(",",$items),
		'name'=>$this->input->post('userName'),
		'phone'=>$this->input->post('userPhone'),
		'email'=>$this->input->post('userEmail'),
		'address'=>$this->input->post('userAddress')
		)
		);
		$this->load->model('order_model');
		$data['items']=$this->order_model->itemquantity($items); 
		$this->load->view('orderview',$data);
		} 
		else if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['o2']))
		{
	     date_default_timezone_set("Asia/Karachi");
		 $quantity=$this->input->post('quantity');
		 $dataIN=array(
		 'items'=>$this->session->userdata('itms'),
		 'name'=>$this->session->userdata('name'),
		 'phone'=>$this->session->userdata('phone'),
		 'email'=>$this->session->userdata('email'),
		 'address'=>$this->session->userdata('address'),
		 'quantity'=>implode(",",$quantity),
		 'datein'=>date('Y-m-d H:i:s')		 
		 );
		$this->load->model('order_model');
		$insertid['insert_id']=$this->order_model->insert($dataIN);
		if($insertid['insert_id']!="")
		{
		$mail_to = $this->session->userdata('email');
        $subject = 'Order Booked';
        $body_message = 'From:Donotreply@crystalclear-drycleaners.co.uk';
        $body_message= 'Phone: '.$this->session->userdata('phone')."\n";
        $body_message .='Thank You for booking your order online with us we will respond back soon on your phone number, mean while your tracking ID is ' .$insertid['insert_id'];
        $headers = 'From:Donotreply@crystalclear-drycleaners.co.uk'."\r\n";
        $mail_status = mail($mail_to, $subject, $body_message, $headers);
		if($mail_status)
		$this->load->view('ordercomplete',$insertid);
		else
		$this->load->view('ordererror');
        }
		}
		
	}
	
	 public function ajax_track()
	{
	      $track_id=$this->input->post('track');
         $this->load->model('order_model');
		 $data=$this->order_model->track($track_id);
		 echo json_encode($data);       

	}
	
	
	
}