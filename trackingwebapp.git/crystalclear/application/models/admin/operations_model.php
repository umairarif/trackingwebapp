<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operations_model extends CI_Model {

public function complete($id,$updatedata)
{
$this->load->database();

foreach($id as $value)
{
$this->db->where('id', $value);
$this->db->update('order',$updatedata);
}
$this->db->select('email');
$this->db->from('order');
$this->db->where_in('id',$id);
$query = $this->db->get();
$data=$query->result_array();
return $data;
}
public function additems($data)
{
$this->load->database();
$this->db->insert('items',$data);
}
public function edit($id)
{
$this->load->database();
$this->db->select('*');
$this->db->from('order');
$this->db->where('id',$id);
$query = $this->db->get();
//echo $this->db->last_query();
//die();
$data=$query->result_array();
return $data;
}
public function edititems($id)
{
$this->load->database();
$this->db->select('*');
$this->db->from('items');
$this->db->where('id',$id);
$query = $this->db->get();
//echo $this->db->last_query();
//die();
$data=$query->result_array();
return $data;
}
public function update($id,$updatedata)
{
$this->load->database();
$this->db->where('id', $id);
$this->db->update('order',$updatedata);
}
public function updateitems($id,$updatedata)
{

$this->load->database();
$this->db->where('id', $id);
$this->db->update('items',$updatedata);
}
public function delete($id)
{
print_r($id);
$this->load->database();

foreach($id as $value)
{
$this->db->delete('order', array('id' => $value)); 
}
}
public function deleteitem($id)
{
$this->load->database();
$this->db->delete('items', array('id' => $id)); 
}
}