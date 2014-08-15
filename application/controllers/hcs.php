<?php
/**
 * sample.php Controller extended to MY_Controller
 */
class Hcs extends MY_Controller {
	/* CONSTANT
	 ------------------------------------------------------------------------------------------------------------------------*/
/*	const url    	 	= 'https://webapp.healthcaresynergy.com:8002/demoalpha/CaregiverPortalMobile/CaregiverPortalService.svc?wsdl';
	const action  		= 'urn:CaregiverPortalService/Login';
	const actionPortal 	= 'urn:CaregiverPortalService/LoginCaregiverPortal';
	const actionReport 	= 'urn:CaregiverPortalService/RetrieveFinancialReportData';*/

	public function __construct() {
		parent::__construct();
	}

	public function index() {

	}

	/**
	 * SOAP request and response for the logging in of the users for Login
	 * Using cURL PHP
	 *
	 * @username 	string | Username
	 * @password 	string | Password
	 */
/*	public function login($username = 'SUPERVISOR', $password = 'SYNERGY1') {

		// USERNAME and PASSWORD encryption
		$username 		= MY_Controller::encrypt($username);
		$password 		= MY_Controller::encrypt($password);		

	    // soap body request
	    $soap_request = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
	                       <soapenv:Header/>
	                       <soapenv:Body>
	                          <Login>
	                             <userName>'.$username.'</userName>
	                             <password>'.$password.'</password>
	                          </Login>
	                       </soapenv:Body>
	                    </soapenv:Envelope>';

	    // Soap header request
	    $result = MY_Controller::soapCall($soap_request, SELF::url, SELF::action);
	    $result = MY_Controller::XMLtoArray($result);
	    echo "<pre/>";
		print_r($result);	 
	}*/

	/**username
	 * SOAP request and response for the logging in of the users for loginCaregiverPortal
	 * Using cURL PHP
	 *
	 * @username 	 string | Username
	 * @password 	 string | Password
	 * @portal  	 string | Portal
	 * @caregiverID  int    | Caregiver's ID
	 * @timeStamp 	 time   | Time stamp
	 */
/*	public function loginCaregiverPortal($logUsername, $logPassword) {

		// USERNAME and PASSWORD encryption
	  	$username 	= MY_Controller::encrypt($logUsername);
	  	$password 		= MY_Controller::encrypt($logPassword);		

	    // soap body request
	    $soap_request = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
						   <soapenv:Header/>
						   <soapenv:Body>
						      <LoginCaregiverPortal>
						         <userName></userName>
						         <password></password>
						         <portal>CaregiverPortal</portal>
						         <caregiverID>'.$username.'</caregiverID>
						         <timeStamp>'.$password.'</timeStamp>
						      </LoginCaregiverPortal>
						   </soapenv:Body>
						</soapenv:Envelope>';

		// Calling soapCall method from MY_Controller
		$result = MY_Controller::soapCall($soap_request, SELF::url, SELF::actionPortal);
		// Calling XMLtoArray method from MY_Controller
	   	$result = MY_Controller::XMLtoArray($result);
	   	echo "<pre/>";
	   	print_r($result);	   	
	   	$result = $result['S:ENVELOPE']['S:BODY']['LOGINCAREGIVERPORTALRESPONSE'];

		if($result['LOGINCAREGIVERPORTALRESULT']['A:HASERROR'] === 'true') {
			echo 'token = '.$result['LOGINCAREGIVERPORTALRESULT']['A:ERROR'];	  	
		} else {
			echo 'token = '.$result['LOGINCAREGIVERPORTALRESULT']['A:TOKEN'] . '<br>';
			echo 'agency Code = '.$result['LOGINCAREGIVERPORTALRESULT']['A:AGENCIES']['B:KEYVALUEOFINTHEALTHAGENCYK3OPKD63']['B:VALUE']['C:M_LABEL']['C:AGENCYCODE'];
		}

	}*/

	public function retrieveFinancialReportData(
												$agencyCode = '1',
												$agencyName = 'DEMO DATABASE',
												$agencyType = 'HOME_HEALTH',
												$usernameSecret = 'username',
												$passwordSecret = 'pwd',
												$username = 'CFRIEND',
												$password = '2Qweasdzx@',
												$araging = 'q_Rpt_ARAging',
												$value1 = '1',
												$value2 = '2010-01-01',
												$value3 = '2012-01-01',
												$value4 = '2014-06-01',
												$value5 = '0',
												$value6 = '0'
											   ) 
	{
		$usernameSecret = MY_Controller::encrypt32($usernameSecret);
		$passwordSecret = MY_Controller::encrypt32($passwordSecret);
		$username 		= MY_Controller::encrypt32($username);
		$password 		= MY_Controller::encrypt32($password);		
	    // soap body request
	    $soap_request = "<soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' 
	    xmlns:heal='http://schemas.datacontract.org/2004/07/HealthcareSinergy2010.Web' 
	    xmlns:ser='http://schemas.microsoft.com/2003/10/Serialization/' 
	    xmlns:heal1='http://schemas.datacontract.org/2004/07/HealthCareAssistant.Core' 
	    xmlns:hsi='http://schemas.datacontract.org/2004/07/HSIAccess.Core' 
	    xmlns:arr='http://schemas.microsoft.com/2003/10/Serialization/Arrays'>
						   <soapenv:Header/>
						   <soapenv:Body>
						      <RetrieveFinancialReportData>
						         <agency>
						            <heal:AgencyCode>".$agencyCode."</heal:AgencyCode>
						            <heal:AgencyName>".$agencyName."</heal:AgencyName>
						            <heal:AgencyType>".$agencyType."</heal:AgencyType>           
						         </agency>
						         <reportParameters>
						         <arr:string>".$usernameSecret."</arr:string>
						         <arr:string>".$passwordSecret."</arr:string>
						         <arr:string>".$username."</arr:string>
						         <arr:string>".$password."</arr:string>
						         <arr:string>".$araging."</arr:string>
						         <arr:string>".$value1."</arr:string>
						         <arr:string>'".$value2."'</arr:string> 
						         <arr:string>'".$value3."'</arr:string>
						         <arr:string>'".$value4."'</arr:string>
						         <arr:string>".$value5."</arr:string>
						         <arr:string>".$value6."</arr:string>            
						         </reportParameters>
						      </RetrieveFinancialReportData>
						   </soapenv:Body>
						</soapenv:Envelope>";
	    // Soap header request
	    $result = MY_Controller::soapCall($soap_request, SELF::url, SELF::actionReport);
	    // convert the result into array
	    $result = xml2array($result);
	    // echo '<pre>';
	    // Dig inside the XML until to CDATA then...
	    $result = $result['s:Envelope']['s:Body']['RetrieveFinancialReportDataResponse']['RetrieveFinancialReportDataResult']['a:Data'];
	    // Convert the cdata into XML to Array
		$result = xml2array($result);
		 // print_r($result);
		 // Location of the values inside the DocumentElement
		 $value = $result['DocumentElement']['HealthCareAssistant'];

		 // Get the values inside the array and assign it into key and an id 
		 // foreach($value as $key => $id) {
		 // 	echo '<br/>';
		 // 	foreach($id as $key => $id) {
		 // 		echo $key . '==' . $id . '<br/>';
		 // 	}
		 // }

	}

}
