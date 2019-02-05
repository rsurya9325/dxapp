
	$(document).ready(function() {
		jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Only Alphabetical Letters");
		
$("#loginForm").validate({
	
	ignore: ".ignore",
			rules: {
				userid: {
					required: true,
					
				},
				
				userpasswd: {
					required: true,
				},
				
				
			},
			messages: {
				userid: {
					required: "Please enter  your Userid",
					
				},
				userpasswd: {
					required: "Please enter  your Password",
					
				},
				
				
			},
			 submitHandler: function(form) {
			// alert('demo');
    form.submit();
  }
		});
		

		
				});