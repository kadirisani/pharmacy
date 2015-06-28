$(document).ready(function(){
	$('#ivForm').submit(function(event) {
        event.preventDefault();
        if ($("#ptName").val()=== "") {
                $("#message").html("Please enter the Patient Name");
                return false;
        }
        
	$.ajax ({
		type: 'POST',
		url: 'searchDB.php',
		data: $(this).serialize(),
		dataType: 'json',
		success: function (data) {
			console.log(data);
			if (data.error === false){
				$("#searchResults").html(data.msg);
                                $('#message').html("");    
			}
			else {
				$('#message').html("Error occured");	
                                $('#searchResults').html("");    
			}
		}

	});

	});
});               