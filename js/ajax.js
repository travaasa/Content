$(function(){
	
	//Do what we need to when form is submitted.	
	$('#form_submit').click(function(){
	
	//Setup any needed variables.
	var input_email = $('#email_special_offers').val(),
		response_text = $('#response'),
		submit_button = $(".submit_special_offer_sign_up");
		//Hide any previous response text 
		response_text.hide();
		
		//Change response text to 'loading...'
		response_text.html('Loading...').show();
		
		//Make AJAX request 
		$.post('/php/contact-send.php', {email: input_email}, function(data){
			
			if (data == "Thank you! You are now registered to receive special offers."){
				submit_button.hide();
				response_text.css("color","#000");
			} else {
				response_text.css("color","red");
			}
			response_text.html(data);
		});
		
		//Cancel default action
		return false;
	});

});