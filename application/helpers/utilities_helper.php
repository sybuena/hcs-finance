<?php //-->
/**
 * Helper for XML2Array 
 *
 *
 */
function xml2array($xml) {

	require_once dirname(__FILE__) . '/../libraries/xml2array.php';

	return XML2Array::createArray($xml);
}

function encrypt($string){
	$pad = 16 - (strlen($string) % 16);
	$string .= str_repeat(chr($pad), $pad);

	$key = base64_decode('ITU2NjNhI0tOc2FmZExOTQ==');
	$iv =  base64_decode('AAAAAAAAAAAAAAAAAAAAAA==');
	$enc = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $string, MCRYPT_MODE_CBC, $iv));

	return $enc;
}

function encrypt32($string) {
	$pad = 16 - (strlen($string) % 16);
	$string .= str_repeat(chr($pad), $pad);

	$key = base64_decode('ITU2NjNhI0tOc2FmZExOTTtzYWQzc3I1ZHN1IXl0cmw=');
	$iv  = base64_decode('JjfOMBxAFBAmN84wHEAUEA==');
	$enc = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key ,$string, MCRYPT_MODE_CBC, $iv));

	return $enc;
} 

function pre($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

function loginError($array) {
	$parent = $array['s:Envelope']['s:Body']['LoginCaregiverPortalResponse']['LoginCaregiverPortalResult'];
	$error = $parent['a:HasError'];

	return $error;
}

function userAgency($array, $username, $password) {
	$parent = $array['s:Envelope']['s:Body']['LoginCaregiverPortalResponse']['LoginCaregiverPortalResult']['a:Agencies']['b:KeyValueOfintHealthAgencyk3OpkD63']; //c:DefaultCertificationPeriod
	$value = $parent['b:Value']['c:m_Label'];
	$certificate = $parent['b:Value']['c:Settings']['c:CertificationSettings'];

	$agency = array('AgencyCode' 	=> $value['c:AgencyCode'],
					'AgencyField'	=> $value['c:AgencyFullName'],
					'AgencyType' 	=> $value['c:AgencyPractice'],
					'Username' 		=> $username,
					'Password' 		=> $password,
					'UsernameWord'	=> 'username',
					'PasswordWord' 	=> 'pwd',
					'Certification' => $certificate['c:DefaultCertificationPeriod']
					);

	return $agency;
}

function xmlData($xml) {
	// Dig inside the XML until to CDATA then...
    $xml = $xml['s:Envelope']['s:Body']['RetrieveFinancialReportDataResponse']['RetrieveFinancialReportDataResult']['a:Data'];
    // Convert the cdata into XML to Array
	$xml = xml2array($xml, 'RetrieveFinancialReportData');
	return $xml;
}

function sessions($session) {
		$session = array (  'agencyCode'	 => $session['login_user']['AgencyCode'],
							'agencyName' 	 => $session['login_user']['AgencyField'],
							'agencyType'	 => $session['login_user']['AgencyType'],
							'usernameWord'   => encrypt32($session['login_user']['UsernameWord']),
							'passwordWord' 	 => encrypt32($session['login_user']['PasswordWord']),
							'username' 		 => encrypt32($session['login_user']['Username']),
							'password' 		 => encrypt32($session['login_user']['Password']),
							'certificate'    => $session['login_user']['Certification']
				);

		return $session;
}