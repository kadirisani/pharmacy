$(document).ready(function(){
	$('#loginForm').submit(function(event) {
        event.preventDefault();
        if ($("#username").val()=== "") {
                $("#message").html("Please enter the Username");
                return false;
        }
        if ($("#password").val()=== "") {
        		$("#message").html("Please enter the Password");
                return false;
        }
		$.ajax ({
			type: 'POST',
			url: 'login.php',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (data) {
				console.log(data);
				if (data.error === false){
					window.location.href = "home.php";
				}
				else {
					$('#message').html(data.msg);	
				}
			}

		});
	});
});               