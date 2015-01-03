  $(function() {
    $('.error').hide();
    $("#response").hide();
    $("#submit_contact").click(function() {
        $('.error').hide();
        $("#response").hide();
        
  	    var name = $("input#name").val();
  		    if (name == "") {
            $("label#name_error").show();
            $("span#error").show();
            $("input#name").focus();
            return false;
        }
        
	    var email = $("input#email").val();
      		if (email == "") {
            $("label#email_error").show();
            $("span#error").show();
            $("input#email").focus();
            return false;
        }
        
        var enquiry = $("input#enquiry").val();
      		if (enquiry == "") {
            $("label#enquiry_error").show();
            $("span#error").show();
            $("input#enquiry").focus();
            return false;
        }
        
        var mess = $("textarea#message").val();
      		if (mess == "") {
            $("label#message_error").show();
            $("span#error").show();
            $("input#message").focus();
            return false;
        }
        
        var dataString = 'name='+ name + '&email=' + email + '&enquiry=' + enquiry + '&message=' + mess;  
        
        $.ajax({
            type: "POST",
            url: "formhandler.php",
            data: dataString,
            success: function() {
                $('#response').show();  
                $("#submit_contact").hide();             
            }
        });
        return false;
    });
});
  
