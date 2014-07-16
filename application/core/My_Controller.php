<?php defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
	
	protected $_user = NULL;
	
	public function __construct() { 
		parent::__construct();
		
		
 		$this->load->helper('url');
		


	}
	
	public function index() {
	}
	
}