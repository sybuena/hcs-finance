<div id="login">

	<div class="container">
	
		<div class="wrapper">
		
			<img src="<?php echo base_url().'assets/img/logo.png' ?>" id="login-logo"/>
		
			<!-- Box -->
			<div class="widget widget-heading-simple widget-body-gray">
				
				<div class="widget-body">
				
					
					<div>
						<label>Username or Email</label>
						<input type="text" id="username" class="input-block-level form-control" placeholder="Your Username or Email address"> 
						<label>Password</label>
						<div class="clearfix"></div>
						<input type="password" id="password" class="input-block-level form-control margin-none" placeholder="Your Password">
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
					<p class="glyphicons restart center" id="error"><i></i>Fill-up the required fields.</p>
				</div>
			</div>
			<!-- // Box END -->
			
		</div>
		
	</div>
	
</div>

<script type="text/javascript">
	// log in validation
	$(document).ready(function() {
		$('#submit').click(function(){			
		var username = $('#username').val();
		var password = $('#password').val();

			// login conditions
			if(username.length == 0 && password.length == 0){
				$('#error').text('Please enter your Username and Password.');
			}
			else if(username.length == 0){
				$('#error').text('Please enter your Username/Email addres');		}
			else if(password.length == 0){
				$('#error').text('Please enter your Password');				
			}
			else if(password.length < 6){
				$('#error').text('Invalid password ( MINIMUM of 5 characters )');						
			}
			else{				
				$.ajax({
			         type: 'POST',
			         url: '<?php base_url(). "application/controllers/login.php" ?>', 
			         data: {logUsername: username, logPassword: password},
			         dataType: 'text',  
			         cache:false,
			         success: 
			              function(data){
			                alert('Success');  //as a debugging message.
			              }
			          });
			}
		})
	});

</script>