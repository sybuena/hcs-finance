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
	
	// When enter is pressed
	$('input.required').keypress(function(event) {
	    if (event.which == 13) {
	    	login();
	    }
	});

	// When submit button in clicked
	$('button#submit').click(function(){
		login();
	});

	// Login Validation
	function login(){			
		
			var username 	= $('input#username').val();
			var password 	= $('input#password').val();
			var error    	= 0;
			var message 	= '';
			var red 		= '#c94437'

			if(username == '' && password == ''){
				message = 'Please enter your Username and Password';
				error = 1;
			} else if(username == ''){
				message = 'Please enter your Username/Email addres';	
				error = 1;	
			} else if(password == ''){
				message = 'Please enter your Password';	
				error = 1;			
			} else if(password.length < 4){
				message = 'Invalid password ( MINIMUM of 5 characters )';	
				error = 1;					
			}

			// if there is an error 
			if(error) {
				$('#error').text(message).css({
		                    "color": red
		                });	


				// username textbox
				$('input[type="text"].required').each(function() {
					// if the username textbox is empty
		            if ($.trim($(this).val()) == '') {
		                $(this).css({
		                    "border-color": red
		                });
		                $('label#username').css({
		                    "color": red
		                });
		             // else its filled up
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
					// if password textbox is empty
		            if ($.trim($(this).val()) == '') {
		                $(this).css({
		                    "border-color": red
		                });
		                $('label#password').css({
		                    "color": red
		                });
		            // else if the password.length is < 4    		                
		            } else if ($.trim($(this).val()).length < 4) {
		                $(this).css({
		                    "border-color": red
		                });
		                $('label#password').css({
		                    "color": red
		                });
		            // else its filled-up    		                
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
			             	// When both field is empty validate red text
			             	$('#error').text('Username and password is not registered').css({
			             			"color": red
			             	});	
			             	// When both is empty - red borders
							$('input.required').each(function() {
					                $(this).css({
					                    "border-color": red
					                });
					                $('label#username').css({
					                    "color": red
					                });
					                $('label#password').css({
					                    "color": red
					                });
					        });		
				
			             } else {
			             	location.reload();
			             }
		             },

		             error 		: function(error) {
		             	
		             }
		          });
			}
			
		};

</script>