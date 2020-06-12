<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once('./application/libraries/REST_Controller.php');

class Login extends REST_Controller {

//----------------------------------------------------------------------------- 
  /**
  * created by @sarlesh
  * coustruct function
  */
  public function __construct()
  {
  	
  	parent::__construct();
  	$this->load->library(array('session','encrypt'));
  	$this->load->model('register/user_m');
  }
  
//-----------------------------------------------------------------------------	
  /**
  * created by @sarlesh
  * login fuctionality function
  */
  public function index_post()
  
  {	
  	$login_user = array('user_email' => $this->post('email'),'user_pwd' => md5($this->post('pwd')));

  	$user_details = $this->user_m->get_user($login_user);
  	if($user_details){
  		if(!$user_details->status==1){
  			$this->session->set_userdata('user_id',$user_details->user_id);
  			$full_name=ucfirst($user_details->first_name).' '.ucfirst($user_details->last_name);
  			$this->session->set_userdata('user_name',$full_name);
  			
  			$message = "login successful for ".$this->session->userdata('user_name');
  			$status = true;
    $this->response(array('status' => $status, 'message' => $message, 'user'=>$user_details), 200);

  			
  		}else{
  			$message = "Please enter the valid credentils";
  			$status = false;
    $this->response(array('status' => $status, 'message' => $message), 401);

  		}
  	}else{
      $message = "Please enter the valid credentils";
      $status = false;
    $this->response(array('status' => $status, 'message' => $message), 401);
    }
  }
//----------------------------------------------------------------------------- 
  /**
  * created by @sarlesh
  * geting all user details
  */
  public function viewUsers_get(){
  	$user_details=$this->user_m->get_all();
  	if($user_details){
  		$this->response(array('status' => 'true', 'data' => $user_details), 200);
  	}
  	else{
  		$this->response(array('status' => 'false', 'message' => "No data avariable"), 401);
  	}
  }

//-----------------------------------------------------------------------------	
  /**
  * created by @sarlesh
  * user details after user login
  */ 
  public function userdetails_get(){
  	$user_id=$this->session->userdata('user_id');
  	if($user_id){
  		$userdata= $this->user_m->get($user_id);

  		$this->response(
  			array(
  				"Message"=>"success",
  				"Status_code"=>"201",
  				"data"=>$userdata
  				)
  			);
  	}
  	$this->response(
  		array(
  			"Message"=>"Access Denied",
  			"Status_code"=>"440",
  			)
  		);
  }
//-----------------------------------------------------------------------------	
  /**
  * created by @sarlesh
  * logout fuctionality 
  */
  public function logout_get(){

  	$this->session->unset_userdata('user_id');

  	$this->response(array('status' => true, 'message' => sprintf("loggedout!!!")), 200);
  }
//-----------------------------------------------------------------------------
}
?>
