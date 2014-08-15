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

	public function financialData(){


	}

	public function ar_aging() {		
		$session = $this->session->all_userdata();
		$data = sessions($session);

		// var_dump($_POST['data']['start-date']);

		// echo $this->input->post('submit');

/*		if($_REQUEST['submit']){

			$agencyCode = $_POST['agencyCode'];
			$reportType = $_POST['reportType'];
			$showPaid = $_POST['showPaid'];
			$startDate = $_POST['startDate'];
			$endDate = $_POST['endDate'];
			$asOfDate = $_POST['asOfDate'];

		$xml 	= (string) sprintf(self::REPORTDATA, 
									$agencyCode, // Agency Code
									$agencyName, // Agency Name
									$agencyType, // Agency Type
									$usernameWord, // "username" Word
									$passwordWord, // "pwd" Word
									$username, // Username
									$password, // Password
									$agencyCode, // Agency Code
									$startDate, // Start date
									$endDate, // End date
									$asOfDate, // As of date
									$reportType, // Report Type
									$showPaid	// Show Paid
									);

	    $result = xml2array($this->_soapCall($xml, 'RetrieveFinancialReportData'));
	    // Dig inside the XML until to CDATA then...
	    $result = $result['s:Envelope']['s:Body']['RetrieveFinancialReportDataResponse']['RetrieveFinancialReportDataResult']['a:Data'];
	    // Convert the cdata into XML to Array
		$result = xml2array($result, 'RetrieveFinancialReportData');

		$this->load->template('ar_aging', $result);

		}*/


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
		$this->load->template('ar_aging', xmlData($result));

	}

	public function revenue() {		
		$session = $this->session->all_userdata();
		$data = sessions($session);

		$xml 	= (string) sprintf(self::REVENUE, 
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
		$this->load->template('revenue', xmlData($result));
		
	}

	public function logout() {
		
		$this->session->unset_userdata('login_user');
		
		header('Location: /');
		
	}


}

?>