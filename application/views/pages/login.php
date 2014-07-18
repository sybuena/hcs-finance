<div id="login">

	<div class="container">
	
		<div class="wrapper">
		
			<img src="<?php echo base_url().'assets/img/logo.png' ?>" id="login-logo"/>
		
			<!-- Box -->
			<div class="widget widget-heading-simple widget-body-gray">
				
				<div class="widget-body">
				
					
					<div>
						<label id='username'>Username or Email</label>
						<input type="text" id="username" class="input-block-level form-control required" placeholder="Your Username or Email address"> 
						<label id="password">Password</label>
						<div class="clearfix"></div>
						<input type="password" id="password" class="input-block-level form-control margin-none required" placeholder="Your Password">
						<a class="pull-right" href="">forgot it?</a>
						<div class="separator bottom"></div> 
						<div class="row">
							<div class="col-md-8">
								
							</div>
							<div class="col-md-4 center">
								<button class="btn btn-block btn-red" type="submit" id="submit">Sign in</button>
							</div>
						</div>
					</div>
					
							
				</div>
				<div class="widget-footer">
					<p class="glyphicons restart center" id="error"> Fill-up the required fields.</p>
				</div>
			</div>
			<!-- // Box END -->
			
		</div>
		
	</div>
	
</div>

<script type="text/javascript">
	// run submit when enter is triggered
	// red the textbox and text when error
	// log in validation
	$(document).ready(function() {
		$('#submit').click(function(){			
		
			var username 	= $('input#username').val();
			var password 	= $('input#password').val();
			var error    	= 0;
			var message 	= '';

			if(username.length == 0 && password.length == 0){
				message = 'Please enter your Username and Password';
				error = 1;
			} else if(username.length == 0){
				message = 'Please enter your Username/Email addres';	
				error = 1;	
			} else if(password.length == 0){
				message = 'Please enter your Password';	
				error = 1;			
			} else if(password.length < 4){
				message = 'Invalid password ( MINIMUM of 5 characters )';	
				error = 1;					
			}

			// if there is an error 
			if(error) {
				$('#error').text(message);	

				// username textbox
				$('input[type="text"].required').each(function() {
		            if ($.trim($(this).val()) == '') {
		                $(this).css({
		                    "border": "1px solid red"
		                });
		                $('label#username').css({
		                    "color": "red"
		                });

		            } else {
		                $(this).css({
		                    "border": ""
		                });
		                $('label#username').css({
		                    "color": ""
		                });	
		            }
		        });		
				

				// password textbox
				$('input[type="password"].required').each(function() {
		            if ($.trim($(this).val()) == '') {
		                $(this).css({
		                    "border": "1px solid red"
		                });
		                $('label#password').css({
		                    "color": "red"
		                });
		                		                
		            } else if ($.trim($(this).val()).length < 4) {
		                $(this).css({
		                    "border": "1px solid red"
		                });
		                $('label#password').css({
		                    "color": "red"
		                });
		                		                
		            } else {
		                $(this).css({
		                    "border": ""
		                });
		                $('label#password').css({
		                    "color": ""
		                });	
		            }
		        });		

			return false;
		
			} else {
				$.ajax({
			         type 		: 'POST',
			         url 		: '/login/check', 
			         data 		: {logUsername: username, logPassword: password},
			         dataType 	: 'json',  
			         success 	: function(data){
			             
			             if(data.error) {
			             	$('#error').text('Username and password is not registered');	
			             } else {
			             	location.reload();
			             }
		             },
		             error 		: function(error) {
		             	
		             }
		          });
			}
			
		})
	});

</script>