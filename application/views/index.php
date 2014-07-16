<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function () {
		
		// event handler log in 
		// trigger when login button is clicked
		$('#login-submit').click(function() {
			// get usdername and password
			var username = $('#login-username').val();
			var password = $('#login-password').val();
			var url = 'application/views/home.php'
			var test = 'test';

			// check if username and password is empty

			// if no username and password, throw error
			if(username.length == 0 || password.length == 0) {
					$('#login-error').text('Fill-up the required fields'); 	
				}
			// else go to check if username and password matched
			else if (username != test || password != test) {
				$('#login-error').text('Username and Password doesnt matched'); 	
			}
			else {
				$(location).attr('href',url);	
			}
			// if username and password does matched, throw error

			// else go to homepage
		})
	});
	</script>
</head>
<body>
	<div id="login">
		<span id='login-error'></span>
		<input type="text" id="login-username" value=""/>
		<input type="text" id="login-password" value="" />
		<button id="login-submit">Button</button>
	</div>
</body>
</html>