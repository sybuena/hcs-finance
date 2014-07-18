<?php //--> 

class Home extends MY_Controller{
	

	public function index(){
		if(empty($this->_user)) {
			//$this->load->template('home');
			
			$this->load->loginTemplate('pages/login');
			
		} else {
			$this->load->template('home');
		}
	}

	public function logout() {
		$this->session->unset_userdata('login_user');
		header('Location: /');
		//header("Refresh:0");
		
	}
}

?>