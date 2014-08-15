<?php defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
	
	const URL    	 	= 'https://webapp.healthcaresynergy.com:8002/demoalpha/CaregiverPortalMobile/CaregiverPortalService.svc';
	
	protected $_user = NULL;
	protected $_input = NULL;
	
	public function __construct() { 
		parent::__construct();

		$this->_user  = $this->session->userdata('login_user');
		$this->_input = $this->input->post('data');

		//print_r($this->_user);exit;
	}
	
	public function index() {
	}

	protected function _soapCall($xml, $action) {
		$header = array(
	                    "Content-type: text/xml;charset=UTF-8",
	                    "Cache-Control: no-cache",
	                    "Pragma: no-cache",
	                    "SOAPAction: urn:CaregiverPortalService/".$action,
	                    "Content-length: ".strlen($xml),
	                	"Expect: text/xml; charset=utf-8",


	                );

	    $ch = curl_init();
	     
	    $options = array( 
	        CURLOPT_URL             => self::URL,
	        CURLOPT_POSTFIELDS      => $xml,
	        CURLOPT_HTTPHEADER      => $header,
	        CURLOPT_RETURNTRANSFER  => true,
	        CURLOPT_FOLLOWLOCATION  => true,
	        CURLOPT_SSL_VERIFYHOST  => false,
	        CURLOPT_SSL_VERIFYPEER  => false,
	        CURLOPT_AUTOREFERER     => true, 
	        CURLOPT_VERBOSE         => true,
	        CURLOPT_USERAGENT       => 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)'
	         
	    );
	     
	    curl_setopt_array($ch , $options);
	     
	    $output = curl_exec($ch);

	    curl_close($ch);

	    return $output;
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