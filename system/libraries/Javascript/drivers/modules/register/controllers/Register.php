<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('./application/libraries/REST_Controller.php');
class Register extends REST_Controller {

//-----------------------------------------------------------------------------
/**
 * Construct Function
 * developer @sarlesh
 */
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('user_m');
	}
//-----------------------------------------------------------------------------
/**
 * New User Registeration
 * developer @sarlesh
 */	
	public function index_post()
	{				
		if(!empty($this->post('first_name')) && !empty($this->post('last_name')) && !empty($this->post('email')) && !empty($this->post('user_pwd'))){
		$user = array('first_name' =>$this->post('first_name'),
						'last_name' => $this->post('last_name'),
						'user_email' => $this->post('email'),
						'user_pwd' => md5($this->post('user_pwd')),
						'status' => 0,
					);
		
			$new_id = $this->user_m->add($user);
		}
		
		if($new_id){
		$this->response(array('status' => true, 'id' => $new_id, 'message' =>"Successfully register new user. once admin activate then you can login"), 200);
		}
		else{
			$this->response(array('status' => false,'message'=>"Not register user . Please try again"),403);
		}			
	}	
}
//-----------------------------------------------------------------------------

?>