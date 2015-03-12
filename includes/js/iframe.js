jQuery(document).ready(function($){
	
	$(document).on( 'click', '.mp_stacks_iframe_submit', function(event){
		$(this).parent().parent().submit();
	});
	
	//When somone submits the iframe form
	$( '.mp_stacks_iframe_signup').on('submit', function( event) {
		
		event.preventDefault();
	
		// Use ajax to add the persons email to the list
		var postData = {
			action: 'mp_stacks_iframe',
			mp_stacks_iframe_email: $(this).find( '.mp-stacks-iframe-email' ).val(),
			mp_stacks_iframe_brick_id: $(this).find( '.mp-stacks-iframe-brick-id' ).val()
		};
		
		var the_form = $(this);
		
		//Ajax to make new stack
		$.ajax({
			type: "POST",
			data: postData,
			url: mp_stacks_frontend_vars.ajaxurl,
			success: function (response) {
				
				the_form.html('');
															
				//Add our response to the email signup area
				the_form.append(response);
			
			}
		}).fail(function (data) {
			console.log(data);
		});
			
	});
			
}); 