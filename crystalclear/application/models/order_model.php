<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model {


public function itemlist()
{
$this->load->database();
$this->db->select('id,name');
$this->db->from('items');
$query=$this->db->get();
//echo $this->db->last_query();
//die();
$data=$query->result_array();
return $data;		
}
public function itemquantity($items)
{
$this->load->database();
$this->db->select('*');
$this->db->from('items');
$this->db->where_in('id',$items);
$query=$this->db->get();
//echo $this->db->last_query();
//die();
$data=$query->result_array();
return $data;		
}
public function insert($dataIN)
{
$t=0;
$i=0;
$quant=explode(",",$dataIN['quantity']);
$this->load->database();
$this->db->select('price');
$this->db->from('items');
$this->db->where_in('id',explode(",",$dataIN['items']));
$query=$this->db->get();
$data=$query->result_array();
foreach($data as $value)
{
$t=($value['price']*$quant[$i])+$t;
$i++;
}
//print_r($quant);
$dataIN['total']=$t;
$this->db->insert('order', $dataIN);
$insert_id = $this->db->insert_id();
return $insert_id; 
}
public function track($track_id)
{
$this->load->database();
$this->db->select('id as TrackID,name,phone,email,datein,dateout');
$this->db->from('order');
$this->db->where('id',$track_id);
$query=$this->db->get();
//echo $this->db->last_query();
//die();
$data=$query->result_array();
return $data;		
}

}