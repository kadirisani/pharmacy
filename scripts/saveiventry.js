$(document).ready(function(){
	$('#ivForm').submit(function(event) {
        event.preventDefault();
        if ($("#ivDate").val()=== "") {
                $("#message").html("Please enter the IV Date");
                return false;
        }
        if ($("#ivTime").val()=== "") {
                $("#message").html("Please enter the IV Time");
                return false;
        }
        if ($("#ptName").val()=== "") {
                $("#message").html("Please enter the Patient Name");
                return false;
        }
        if ($("#ptRoom").val()=== "") {
                $("#message").html("Please enter the Patient Room");
                return false;
        }
        if ($("#ivMix").val()=== "") {
        		$("#message").html("Please enter the IV Mix");
                return false;
        }
        if ($("#drugMfr").val()=== "") {
        		$("#message").html("Please enter the drug manufacturer");
                return false;
        }
        if ($("#drugLot").val()=== "") {
                        $("#message").html("Please enter the drug lot");
                return false;
        }
        if ($("#drugExp").val()=== "") {
                        $("#message").html("Please enter the drug expiration");
                return false;
        }
        if ($("#diluent").val()=== "") {
                        $("#message").html("Please enter the Diluent");
                return false;
        }
        if ($("#dilMfr").val()=== "") {
                        $("#message").html("Please enter the diluent manufacturer");
                return false;
        }
        if ($("#dilLot").val()=== "") {
                        $("#message").html("Please enter the diluent lot");
                return false;
        }
        if ($("#dilExp").val()=== "") {
                        $("#message").html("Please enter the diluent expiration");
                return false;
        }
        if ($("#qty").val()=== "") {
                        $("#message").html("Please enter the Quantity");
                return false;
        }
        if ($("#prepBy").val()=== "") {
                        $("#message").html("Please enter the prepared person");
                return false;
        }

	$.ajax ({
		type: 'POST',
		url: 'saveIvEntry.php',
		data: $(this).serialize(),
		dataType: 'json',
		success: function (data) {
			console.log(data);
			if (data.error === false){
				window.location.href = "home.php";
			}
			else {
				$('#message').html("Successfully registered. Go to <a href='login.html'>Login</a> page and login using the username and password.");	
			}
		}

	});

	});
});               