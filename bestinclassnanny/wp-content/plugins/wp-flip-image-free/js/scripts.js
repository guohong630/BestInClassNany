jQuery(document).ready(function() {	

	jQuery('.rollingimgupload').click(function() {

		btnID    =  jQuery(this).attr('id');

		gettheID =  btnID.substring(17);

		textID   = '#wp_flip_image_free-'+gettheID;

		uploadID = jQuery(textID);

		imgID    = '#wp_flip_image_free_img'+gettheID;

		imgfield = jQuery(imgID);

		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');

		return false;

	});

	

	window.send_to_editor = function(html) {

		imgurl = jQuery('img',html).attr('src');

		uploadID.val(imgurl);

		imgfield.attr('src',imgurl);

		tb_remove();
        alert(uploadID);
	}

	

	/*jQuery('.rollingimguploads').click(function() {

		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');

		return false;

	});*/

});