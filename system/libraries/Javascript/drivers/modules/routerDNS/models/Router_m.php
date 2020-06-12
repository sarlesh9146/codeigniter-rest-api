<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Router_m extends CI_Model
{
    public $table = 'router_details';

//-----------------------------------------------------------------------------  
  /**
  * created by @sarlesh
  * getting all dns
  */ 
    public function get_all()
    {
        return $this->db->where('status',0)->get($this->table)->result();
    }

//-----------------------------------------------------------------------------  
  /**
  * created by @sarlesh
  * get a router details  by id
  */ 
    public function get($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
    }


//-----------------------------------------------------------------------------  
  /**
  * created by @sarlesh
  * add new router details
  */     
	public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }


//-----------------------------------------------------------------------------

/**
  * created by @sarlesh
 * update a router details and return true or false
*/

    public function update_data($id, $data)
    {
        //print_r($data);exit();
        return $this->db->where('id', $id)->update($this->table, $data);
    }

//-----------------------------------------------------------------------------

/**
  * created by @sarlesh
 * delete a router details  return true or false
*/

    public function delete($id)

    {

        $this->db->where('id', $id)->delete($this->table);

        return $this->db->affected_rows();

    }

//-----------------------------------------------------------------------------	
}