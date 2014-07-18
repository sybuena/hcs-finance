<?php defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
	
	protected $_user = NULL;
	
	public function __construct() { 
		parent::__construct();
		//chec if there is user on the session
		$this->_user  = $this->session->userdata('login_user');

		//print_r($this->_user);exit;
	}
	
	public function index() {
	}

	protected function _throwSuccess($message = null) {

		if(is_null($message)) {
			$message = 'Success';
		}

		echo json_encode(array(
			'error' => 0,
			'message' => $message
		));
	}
	
	protected function _throwError($message = null){

		if(is_null($message)) {
			$message = 'Error';
		}

		echo json_encode(array(
			'error' => 1,
			'message' => $message
		));

	}
}