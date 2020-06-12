<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once('./application/libraries/REST_Controller.php');

class RouterDNS extends REST_Controller {

//----------------------------------------------------------------------------- 
  /**
  * created by @sarlesh
  * coustruct function
  */
  public function __construct()
  {
  	
  	parent::__construct();
  	//$this->load->library(array('session','encrypt'));
  	$this->load->model('router_m');
  }
  

//----------------------------------------------------------------------------- 
  /**
  * created by @sarlesh
  * geting all user details
  */
  public function allRouters_get(){
  	$router_details=$this->router_m->get_all();
  	if($router_details){
  		$this->response(array('status' => 'true', 'data' => $router_details), 200);
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
  public function routerDetailById_get($id){
  	if($id){
  		$router_details= $this->router_m->get($id);

  		$this->response(
  			array(
  				"Message"=>"success",
  				"Status_code"=>"201",
  				"data"=>$router_details
  				)
  			);
  	}
  	$this->response(
  		array(
  			"Message"=>"Access Denied",
  			"Status_code"=>"403",
  			)
  		);
  }

  //-----------------------------------------------------------------------------
/**
 * add new router
 * developer @sarlesh
 */ 
  public function addRouterDetails_post()
  {       
    if(!empty($this->post('dns_name')) && !empty($this->post('host_name')) && !empty($this->post('client_ip_address')) && !empty($this->post('mac_address'))){
    $user = array('dns_name' =>$this->post('dns_name'),
            'host_name' => $this->post('host_name'),
            'client_ip_address' => $this->post('client_ip_address'),
            'mac_address' => $this->post('mac_address'),
          );
    
      $new_id = $this->router_m->add($user);
    }
    
    if($new_id){
    $this->response(array('status' => true, 'id' => $new_id, 'message' =>"Successfully added new DNS details."), 200);
    }
    else{
      $this->response(array('status' => false,'message'=>"Somthing went wrong . Please try again"),403);
    }     
  } 

//-----------------------------------------------------------------------------
/**
 * update routers details
 * developer @sarlesh
 */ 
  public function updateDetails_put()
  {       
    $id=$this->put('id');
        if(empty($id)){
           $this->response(array('Status_code' => "401",'Message' => "details Missing"));   
        } 
        $data=array();
        if($this->put('dns_name')!=""){
            $data['dns_name']=$this->put('dns_name');
        }if($this->put('host_name')!=""){
            $data['host_name']=$this->put('host_name');
        }if($this->put('client_ip_address')!=""){
            $data['client_ip_address']=$this->put('client_ip_address');
        }if($this->put('mac_address')!=""){
            $data['mac_address']=$this->put('mac_address');
        }
        
      if ($succes_status = $this->router_m->update_data($id,$data)){
        $this->response(
                array(
                    'Status_code' => "200",
                    'Message' => "Data Updated"
                    )
                );
        }
        else{
        $this->response(
                array(
                    'Status_code' => "403",
                    'Message' => "Data not update"
                    )
                );   
        }
  } 

//-----------------------------------------------------------------------------
    /**
 * Delete data
 * created By @sarlesh
*/ 
    public function deleteRouter_delete($id)
    {
        $data=$this->router_m->get($id);
        if(empty($data)){
             $this->response(
                    array(
                    'Status_code' => "401",
                    'Message' => "DNS details does not exist ."
                    )
                );  
        }
        $deletedata['status']=1;
        if ($succes_status = $this->router_m->update_data($id,$deletedata)){
            $this->response(
                    array(
                        'Status_code' => "200",
                        'Message' => "User deleted"
                        )
                    );
          
        }else{
            $this->response(
                    array(
                    'Status_code' => "401",
                    'Message' => "ops something went wrong"
                    )
                );           
        }
    }
  


//-----------------------------------------------------------------------------
}
?>
