$(document).ready(function(){
	$('#loginForm').submit(function(event) {
        event.preventDefault();
        if ($("#firstname").val()=== "") {
                $("#message").html("Please enter the First Name");
                return false;
        }
        if ($("#lastname").val()=== "") {
                $("#message").html("Please enter the Last Name");
                return false;
        }
        if ($("#email").val()=== "") {
                $("#message").html("Please enter the Email");
                return false;
        }
        if ($("#username").val()=== "") {
                $("#message").html("Please enter the Username");
                return false;
        }
        if ($("#password").val()=== "") {
        		$("#message").html("Please enter the Password");
                return false;
        }
        if ($("#cnfrmpassword").val()=== "") {
        		$("#message").html("Please enter the Confirm Password");
                return false;
        }
        else {
        	if ($("#password").val() !== $("#cnfrmpassword").val()) {
        		$("#message").html("The Password and Confirm Password should be same!");
                return false;
        	}
        }


		$.ajax ({
			type: 'POST',
			url: 'registration.php',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (data) {
				console.log(data);
				if (data.msg === "happened"){
					$('#message').html("Successfully registered. Go to <a href='login.html'>Login</a> page and login using the username and password.");	
				}
                                else {
                                   $("#message").html("Registration failed.");
                                }
			},
                        error: function(data){
                               $("#message").html("your ajax call failed."); 
                        }

		});
	});
});               