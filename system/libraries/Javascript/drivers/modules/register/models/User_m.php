<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_m extends CI_Model
{
    public $table = 'users';

//-----------------------------------------------------------------------------  
  /**
  * created by @sarlesh
  * getting all users
  */ 
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

//-----------------------------------------------------------------------------  
  /**
  * created by @sarlesh
  * get a user by id
  */ 
    public function get($id)
    {
        return $this->db->where('user_id', $id)->get($this->table)->row();
    }

//-----------------------------------------------------------------------------  
  /**
  * created by @sarlesh
  * get login details
  */     
  public function get_user($user)
    {
        return $this->db->where($user)->get($this->table)->row();
    }

//-----------------------------------------------------------------------------  
  /**
  * created by @sarlesh
  * Register new user
  */     
	public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }


//-----------------------------------------------------------------------------

/**
  * created by @sarlesh
 * update user status and return true or false
*/

    public function update_data($id, $data)
    {
        //print_r($data);exit();
        return $this->db->where('user_id', $id)->update($this->table, $data);
    }

//-----------------------------------------------------------------------------

/**
  * created by @sarlesh
 * delete user  return true or false
*/

    public function delete($id)

    {

        $this->db->where('user_id', $id)->delete($this->table);

        return $this->db->affected_rows();

    }

//-----------------------------------------------------------------------------	
}