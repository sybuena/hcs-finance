<?php defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
	
	protected $_user = NULL;
	
	public function __construct() { 
		parent::__construct();
		
		//load all things here
		require APPPATH.'libraries/XeroOAuth.php';
		
 		$this->load->helper('url');
		$this->load->config('quickbooks');
		$this->load->config('xero');
		$this->load->config('custom');
		$this->load->library('session');
		$this->load->model('billing_model');
		$this->load->model('account_model');
		$this->load->model('vendor_model');
		$this->load->model('app_model');
		$this->load->model('mail_model');
		$this->load->model('xero_model');
		$this->load->model('sync_model');
		
		//get login user fro session
		$this->_user =  $this->session->userdata('login_user'); 


	}
	
	public function index() {
	}
	
}