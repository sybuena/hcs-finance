<?php

class Login extends MY_Controller {

	const USERNAME = 'test';
	const PASSWORD = 'test';

    /**
     * Index page 
     */
    public function index(){

    }

    public function check() {
    	$username = $_POST['logUsername'];
    	$password = $_POST['logPassword'];

		if($username == self::USERNAME && $password == self::PASSWORD) {
			$sessionData = array(
				'username' => $username,
				'password' => $password
				);

			$this->session->set_userdata('login_user', $sessionData);

			$this->_throwSuccess();
		} else {
			$this->_throwError();
		} 	
		exit;
    }

    public function now() {
    	echo 'now';
    }
}

?>