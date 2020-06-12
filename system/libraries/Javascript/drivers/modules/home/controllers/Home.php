<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->view('common/header');
		$this->load->view('common/footer');
	}
	
	public function landing()
	{	
		$this->load->view('pages/index');
	}
	public function register()
	{	
		$this->load->view('pages/register');
	}
	public function view_user()
	{	
		$this->load->view('pages/view_users');
	}
	public function simple_user()
	{	
		$this->load->view('pages/simple_user');
	}
	public function edit_user()
	{	
		$this->load->view('pages/edit_user');
	}
	public function view_routers()
	{	
		$this->load->view('pages/view_routers');
	}
	public function edit_router()
	{	
		$this->load->view('pages/edit_router');
	}
		
}