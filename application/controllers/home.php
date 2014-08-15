<?php //--> 

class Home extends MY_Controller {

	const REPORTDATA   =  "<soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:heal='http://schemas.datacontract.org/2004/07/HealthcareSinergy2010.Web'
							    xmlns:ser='http://schemas.microsoft.com/2003/10/Serialization/' xmlns:heal1='http://schemas.datacontract.org/2004/07/HealthCareAssistant.Core' 
							    xmlns:hsi='http://schemas.datacontract.org/2004/07/HSIAccess.Core'  xmlns:arr='http://schemas.microsoft.com/2003/10/Serialization/Arrays'>
								<soapenv:Header/><soapenv:Body><RetrieveFinancialReportData><agency><heal:AgencyCode>%s</heal:AgencyCode><heal:AgencyName>%s</heal:AgencyName>
								<heal:AgencyType>%s</heal:AgencyType></agency><reportParameters><arr:string>%s</arr:string><arr:string>%s</arr:string><arr:string>%s</arr:string>
								<arr:string>%s</arr:string><arr:string>q_Rpt_ARAging</arr:string><arr:string>%s</arr:string><arr:string>'%s'</arr:string><arr:string>'%s'</arr:string>
								<arr:string>'%s'</arr:string><arr:string>%s</arr:string><arr:string>%s</arr:string></reportParameters></RetrieveFinancialReportData></soapenv:Body>
							</soapenv:Envelope>";

	const REVENUE 	   =  "<soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:heal='http://schemas.datacontract.org/2004/07/HealthcareSinergy2010.Web' 
							xmlns:ser='http://schemas.microsoft.com/2003/10/Serialization/' xmlns:heal1='http://schemas.datacontract.org/2004/07/HealthCareAssistant.Core' 
							xmlns:hsi='http://schemas.datacontract.org/2004/07/HSIAccess.Core' xmlns:arr='http://schemas.microsoft.com/2003/10/Serialization/Arrays'>
							<soapenv:Header /><soapenv:Body><RetrieveFinancialReportData><agency><heal:AgencyCode>%s</heal:AgencyCode><heal:AgencyName>%s</heal:AgencyName>
							<heal:AgencyType>%s</heal:AgencyType></agency><reportParameters><arr:string>%s</arr:string><arr:string>%s</arr:string>
							<arr:string>%s</arr:string><arr:string>%s</arr:string><arr:string>q_RevenueAllocationByDay</arr:string>
							<arr:string>%s</arr:string><arr:string>%s</arr:string><arr:string>'%s'</arr:string><arr:string>'%s'</arr:string></reportParameters>
							</RetrieveFinancialReportData></soapenv:Body></soapenv:Envelope>";
				

	public function index(){
		// Home page 
		if(!empty($this->_user)) {			
			$this->load->template('home');
			$session = $this->session->all_userdata();			
		} else {
			$this->load->loginTemplate('pages/login');
		}
	}

	public function ar_aging() {	
		// Call the session data and convert it on sessions function to minimize the array extension
		$data = sessions($this->session->all_userdata());

		if(empty($this->_input)){

		$xml 	= sprintf(self::REPORTDATA, 
							$data['agencyCode'], // Agency Code
							$data['agencyName'], // Agency Name
							$data['agencyType'], // Agency Type
							$data['usernameWord'], // "username" Word
							$data['passwordWord'], // "pwd" Word
							$data['username'], // Username
							$data['password'], // Password
							'1', // Agency Code
							'2010-01-01', // Start date
							'2012-01-01', // End date
							'2014-06-01', // As of date
							'0', // Report Type
							'0'	// Show Paid
							);

	    $result = xml2array($this->_soapCall($xml, 'RetrieveFinancialReportData'));
	    // Convert XML's CDATA into array
		$this->load->template('ar_aging', xmlData($result));

		} else {
			$input = inputs($this->_input);

			$xml 	= sprintf(self::REPORTDATA, 
								$data['agencyCode'], // Agency Code
								$data['agencyName'], // Agency Name
								$data['agencyType'], // Agency Type
								$data['usernameWord'], // "username" Word
								$data['passwordWord'], // "pwd" Word
								$data['username'], // Username
								$data['password'], // Password
								$input['agency-code'], // Agency Code
								$input['start-date'], // Start date
								$input['end-date'], // End date
								$input['as-of-date'], // As of date
								$input['report-type'], // Report Type
								$input['show-paid']	// Show Paid
								);

		    $result = xml2array($this->_soapCall($xml, 'RetrieveFinancialReportData'));
		    // Convert XML's CDATA into array
			$this->load->template('ar_aging', xmlData($result));

			print_r($input);
			$this->_throwSuccess();

	
	// }

		// print_r($_POST['data']);
		}
	}

	public function revenue() {		
		// Call the session data and convert it on sessions function to minimize the array extension
		$data = sessions($this->session->all_userdata());

		$xml 	= sprintf(self::REVENUE, 
							$data['agencyCode'], // Agency Code
							$data['agencyName'], // Agency Name
							$data['agencyType'], // Agency Type
							$data['usernameWord'], // "username" Word
							$data['passwordWord'], // "pwd" Word
							$data['username'], // Username
							$data['password'], 
							'1', // Agency Code
							$data['certificate'], // Start date
							'2010-01-01', // End date
							'2014-06-01', // As of date
							'0', // Report Type
							'0'	// Show Paid
							);

		$result = xml2array($this->_soapCall($xml, 'RetrieveFinancialReportData'));
	    // Convert XML's CDATA into array
		$this->load->template('revenue', xmlData($result));
		
	}

	public function logout() {
		
		$this->session->unset_userdata('login_user');
		
		header('Location: /');
		
	}


}

?>