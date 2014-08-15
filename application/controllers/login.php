<?php

class Login extends MY_Controller {
    
    const LOGIN_XML = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"><soapenv:Header/><soapenv:Body>
		<LoginCaregiverPortal><userName></userName><password></password><portal>CaregiverPortal</portal><caregiverID>%s</caregiverID>
		<timeStamp>%s</timeStamp></LoginCaregiverPortal></soapenv:Body></soapenv:Envelope>';

    public function __construct(){
    	parent::__construct();
    }
    public function index(){

    }

    public function check() {
    	
    	$username = encrypt($_POST['logUsername']);
    	$password = encrypt($_POST['logPassword']);
    	
		$xml 	=  sprintf(self::LOGIN_XML, $username, $password);
		$result = xml2array($this->_soapCall($xml, 'LoginCaregiverPortal'));

    	// check if empty username and password	
		if(loginError($result) === 'false') 
		{
			$sessionData = userAgency($result, $_POST['logUsername'], $_POST['logPassword']);
			$this->session->set_userdata('login_user', $sessionData);
			$this->_throwSuccess();
			exit;
		} 
		else 
		{
			$this->_throwError();
			exit;
		}
		





/*		if(empty($username) && empty($password)) {
			$this->_throwError();
		}

		// encrypt the values 
		$username = encrypt($username);
		$password = encrypt($password);

		$xml 	=  sprintf(self::LOGIN_XML, $username, $password);
		$result = $this->_soapCall($xml, 'LoginCaregiverPortal');
		
		echo $result;
    	// encrypt the values
		exit;*/

    	// curl request
	}



    public function now() {
    	echo 'now';
    }
}

?>