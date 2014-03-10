/**
 * @detail
 * Additional function to handle content
 * http://zourbuth.com/
 */

(function($) { spDialog = {

	init : function(){
		$('.totalControls').closest(".widget-inside").addClass("totalWidgetBg");		
		
		$(document).on("click", "ul.nav-tabs li", function(){
			spDialog.tabs(this)
		});
		
		$(document).on("click", "a.addImage", function(){
			spDialog.addImages(this)
		});
		
		$(document).on("click", "a.removeImage", function(){
			spDialog.removeImage(this)
		});
	},
	
	tabs : function(tab){
		var t, i, c;
		
		t = $(tab);
		i = t.index();
		c = t.parent("ul").next().children("li").eq(i);
		t.addClass('active').siblings("li").removeClass('active');
		$(c).show().addClass('active').siblings().hide().removeClass('active');
		t.parent("ul").find("input").val(0);
		$('input', t).val(1);
	},
	
	addImages : function(el){
		var g, u, i, a;
		
		g = $(el).siblings('img');
		i = $(el).siblings('input');
		a = $(el).siblings('a');
		
		tb_show('Select Image/Icon Title', 'media-upload.php?post_id=0&type=image&TB_iframe=true');	
		
		window.send_to_editor = function(html) {
			u = $('img',html).attr('src');
			
			if ( u === undefined || typeof( u ) == "undefined" ) 
				u = $(html).attr('src');		
			
			g.attr("src", u).slideDown();
			i.val(u);
			a.addClass("showRemove").removeClass("hideRemove");
			tb_remove();
		};
		return false;
	},
	
	removeImage : function(el){
		var t = $(el);
		
		t.next().val('');
		t.siblings('img').slideUp();
		t.removeClass('show-remove').addClass('hide-remove');
		t.fadeOut();
		return false;
	}	
};

$(document).ready(function(){spDialog.init();});
})(jQuery);
