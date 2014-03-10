jQuery(document).ready( function($) {
	$.fn.fesLoadUtility = function(){
		var c, t;
		t = $(this);
		c = t.parents(".totalControls").find(".fesem");
		
		if ( c.is(':empty')) {
			console.log( "konoto" );
			c.append("<span class='fes-loading loading'>Loading item...</span>");
			$.post( ajaxurl, { action: fes.action, nonce : fes.nonce }, function(data){
				$(".fes-loading").remove();
				c.append(data);			
			});
		}
	}
});