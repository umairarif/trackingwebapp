<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {


public function log_model($logindata)
{
$this->load->database();
$this->db->select('*');
$this->db->from('admin_login');
$this->db->where('username',$logindata['user_name']);
$this->db->where('password',$logindata['password']);
$query = $this->db->get();
//echo $this->db->last_query();
//die();
$data=$query->result_array();

if ($query->num_rows()>0)
{
foreach($data as $value)
{
$user=ucfirst($value['name']);
$resourceid=$value['id'];
}
 $this->session->set_userdata(array(
             'username'=>$user,
			 'resourceid'=>$resourceid,
             'isLoggedIn'=>true  ));
return $data;
}

}
public function orders()
{
$this->load->database();
$this->db->select('*');
$this->db->from('order');
$this->db->order_by('id','desc');
$query = $this->db->get();
$data=$query->result_array();
return $data;
}
public function items()
{
$this->load->database();
$this->db->select('*');
$this->db->from('items');
$this->db->order_by('id','desc');
$query = $this->db->get();
$data=$query->result_array();
return $data;
}
}