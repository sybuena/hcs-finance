<?php //--> 

class Home extends CI_Controller{
	
	protected $_user = NULL;

	public function index(){
		if(is_null($this->_user)) {
			//$this->load->template('home');
			
			$this->load->loginTemplate('pages/login');
			
		} else {
			$this->load->template('home');
		}
	}
}

?>