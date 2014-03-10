<?php



/* 



Plugin Name: WP Flip Image Free Ver 2.0



Plugin URI: http://www.flip-it.net/



Description: One Click On The Image And It Flips Right Around To Reveal The Text and link That You Want Your Visitors To See!  



Author: http://www.flip-it.net 



Version: 2.0



Text Domain: flip-image-free



*/



		



// add Flip Image Free Plugin menu in admin settings







define('WP_FLIP_IMAGE_FREE','wp-flip-image-free');





define('WP_FLIP_IMAGE_FREE_PATH',plugins_url(WP_FLIP_IMAGE_FREE));

/*define('FLIP_IMAGES_PRO_PATH',PLUGINDIR."/".plugin_basename(__DIR__));*/



define('WP_FLIP_IMAGE_FREE_SITE_ADMIN_URL',get_admin_url());







add_action( 'init', 'wp_flip_image_free_free_init' );



global $wpdb;







function wp_flip_image_free_free_init(){

	

	session_start();

	//edit by shalini for language changes FLIP_IMAGES_PRO_PATH.'/languages'

	if(!isset($_SESSION['lang'])){

		$_SESSION['lang'] = get_locale();	

	}

	load_plugin_textdomain( 'flip-image-free',  WP_FLIP_IMAGE_FREE_PATH.'/languages', dirname( plugin_basename( __FILE__ ) ). '/languages' );

	

	if(isset($_GET['lang']) && !empty($_GET['lang']) && $_SESSION['lang'] != $_GET['lang']){

		add_filter('locale','wpsx_redefine_locale',10);

		$mofile=dirname(__FILE__)."/languages/flip-image-free-".$_GET[lang].".mo";

		unload_textdomain('flip-image-free');

		

		$loaded=load_textdomain( 'flip-image-free', $mofile);

		$_SESSION['lang']=$_GET[lang];

	}else{

		$mofile=dirname(__FILE__)."/languages/flip-image-free-".$_SESSION['lang'].".mo";

		$loaded=load_textdomain( 'flip-image-free', $mofile);

	}

	

	add_filter( 'load_textdomain_mofile', 'flip_images_pro_cglang', 10, 2 ); 

	apply_filters( 'load_textdomain_mofile', $mofile, "flip-image-free" );

	

	

	add_action( 'admin_menu', 'wp_flip_image_free_free_admin_menu' );



}







function wp_flip_image_free_free_admin_menu() {



	global $wpdb;



	add_menu_page('WP Flip Image Free Option', 'Flip Image Free', 'manage_options', 'flip-image-free', 'wp_flip_image_free_admin', WP_FLIP_IMAGE_FREE_PATH.'/images/icon.png');

	add_submenu_page("flip-image-free", "Flip Image Free Language Manager", "Language", 0, "flip-image-free-language", "wp_flip_image_free_admin_language");



}







// add WP Flip Image Free Admin Area



function wp_flip_image_free_admin(){



?>







<div class="wrap">



  <div class="wp-flip-image-free-icon"><br>



  </div>

  <h2>WP Flip Image Free</h2>



  <div class="wp_flip_image_free-heading-free">



    <p> <img src="<?php echo WP_FLIP_IMAGE_FREE_PATH; ?>/images/logo.png" /></p>



  </div>



  <?php if(isset($_POST['submit'])){?>



  <div class="wp_flip_image_free-success-fade-free">

	 <p><?php _e("Plugin has successfully saved","flip-image-free")?>, <?php _e("Copy the shortcode","flip-image-free");?> <b>[WP-Flip-Image-Free]</b> <?php _e("and","flip-image-free")?> <?php _e("paste it on necessary page or post, where you want to show the plugin","flip-image-free")?>.</p>

     

   



  </div>



  <?php } ?>



  <div class="wp_flip_image_free-updated-fade-free">



    <p><span>Welcome to Flip Image admin area</span> Instructions:<br />



      1) <?php _e("Choose the thumbnail gallery size","flip-image-free");?>: 3x3 or 4x4.<br />



	  2) <?php _e("Upload images, insert text and link","flip-image-free");?>. Click "<?php _e("Save Changes","flip-image-free");?>" button.<br />



	  3) <?php _e("Copy the shortcode","flip-image-free");?> [WP-Flip-Image-Free] <?php _e("paste it on necessary page or post, where you want to show the plugin","flip-image-free")?> </p><br />



<p><span><a href="http://www.flip-it.net"><?php _e("UPGRADE to","flip-image-free");?> WP Flip Image Pro</a> <?php _e("and","flip-image-free");?> <?php _e("get many advanced features such","flip-image-free");?>:</span><br />



* <?php _e("<strong>Unlimited galleries</strong>, can be placed on your website","flip-image-free");?>!<br />



* <?php _e("Choose between <strong>Thumbnail</strong> or <strong>Slider</strong> gallery style","flip-image-free");?>!<br />



* <?php _e("Slider Gallery with many features: Auto Slide, rotating time, arrows design and more","flip-image-free");?>!<br />



* <?php _e("Thumbnail style gallery for up to 100 images","flip-image-free");?> (10x10)!<br />



* <?php _e("Full control over the image description (image front side) text, with: font, size, align & background settings","flip-image-free");?><br />



* <?php _e("<strong>Advanced Bulk Image Upload</strong>: Upload photo folder with only few clicks","flip-image-free");?>!<br />



* <?php _e("Free updates, Fast support and many more","flip-image-free");?>!<br /></p>



<p><span><a href="http://www.flip-it.net"><?php _e("Get WP Flip Image Pro NOW","flip-image-free");?>!</a></span></p>



  </div>



  <div class="wp_flip_image_free-content-free">



    <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>&updated=true">



      <input type="hidden" name="save_wp_flip_image_free" value="process_wp_flip_image_free" />



      <div class="wp_flip_image_free-box-free">



        <table border="0">



          <tr>



            <td>Gallery Name:</td>



            <td><input name='wp_flip_image_free_gallery_name' size='100' type='text'  value='<?php echo get_option('wp_flip_image_free_gallery_name'); ?>'  /></td>



          </tr>



        </table>



      </div>



      <div class="wp_flip_image_free-box-free">



        <table border="0">



          <tr>



            <td colspan="2"><?php _e("Gallery Size","flip-image-free");?>:</td>



          </tr>



          <tr>



            <td><table border="0">



                <tr>



                  <td><input name="wp_flip_image_free_gallery_type" type="radio" value="0" <?php if(get_option('wp_flip_image_free_gallery_type') == '0'){ echo "checked";} ?>/></td>



                  <td>3X3</td>



                  <td><img src="<?php echo WP_FLIP_IMAGE_FREE_PATH; ?>/images/3x3.jpg" /></td>



                </tr>



              </table></td>



            <td><table border="0">



                <tr>



                  <td><input name="wp_flip_image_free_gallery_type" type="radio" value="1" <?php if(get_option('wp_flip_image_free_gallery_type') == '1'){ echo "checked";} ?>/></td>



                  <td>4x4</td>



                  <td><img src="<?php echo WP_FLIP_IMAGE_FREE_PATH; ?>/images/4x4.jpg" /></td>



                </tr>



              </table></td>



          </tr>



        </table>



      </div>



      <div class="wp_flip_image_free-box-free">



        <table border="0">



          <tr>



            <td><?php _e("Bulk Image Upload","flip-image-free");?>:</td>



          </tr>



          <tr>



            <td><?php _e("Upload several images","flip-image-free")?></td>



          </tr>



          <tr>



            <td><a class="thickbox" title="Upload Mass Images" href="<?php echo WP_FLIP_IMAGE_FREE_SITE_ADMIN_URL."admin-ajax.php?action=getTheMediaContent";?>&height=500&width=640"><input type="button" value="<?php _e("Upload","flip-image-free")?>" name="rollonimageuploads" class="rollingimguploads"></a></td>



          </tr>



        </table>



      </div>



      <?php for($i = 1; $i <= 16; $i++){?>



       <div class="wp_flip_image_free-box-free image-box">



        <table border="0">



          <tr>



            <td><?php _e("Image","flip-image-free")?> <?php echo $i; ?></td>



            <td><input type="button" value="<?php _e("Upload","flip-image-free")?>" name="rollonimageupload" class="rollingimgupload" id="rollingimgupload-<?php echo $i; ?>">



              <input name="wp_flip_image_free<?php echo $i; ?>" type="text" value="<?php echo get_option('wp_flip_image_free'.$i)?>" id="wp_flip_image_free-<?php echo $i; ?>"/></td>



            <td rowspan="3" align="center"><img width="140"  src="<?php echo get_option('wp_flip_image_free'.$i);?>" id="wp_flip_image_free_img<?php echo $i; ?>"/></td>



          </tr>



          <tr>



            <td><?php _e("Insert Text","flip-image-free")?>:</td>



            <td><textarea name="wp_flip_image_free_text<?php echo $i; ?>" cols="45" rows="5"><?php echo get_option('wp_flip_image_free_text'.$i);?></textarea></td>



          </tr>



          <tr>



            <td><?php _e("URL","flip-image-free")?>:</td>



            <td><input name="wp_flip_image_free_link<?php echo $i; ?>" type="text" value="<?php echo get_option('wp_flip_image_free_link'.$i);?>" class="rollinginput" />



              <input name="wp_flip_image_free_check<?php echo $i; ?>" type="checkbox" value="1" <?php if(get_option('wp_flip_image_free_check'.$i)=='1'){ echo "checked"; } ?>/>



              <?php _e("Open in new Window","flip-image-free")?></td>



          </tr>



        </table>



      </div>



      <?php } ?>



      <div class="wp_flip_image_free-box-free">



      <table border="0">



          <tr>



            <td><input type="checkbox" name="wp_flip_image_free_developer_link" value="1"  <?php if(get_option('wp_flip_image_free_developer_link')=='1'){ echo "checked"; } ?>/>



              <?php _e("Disable","flip-image-free")?> "<?php _e("Powered By","flip-image-free")?> Flip-It" <?php _e("link on the footer","flip-image-free")?>.</td>



            <td  width="300" align="right"><input type="submit" value="<?php _e("Save Changes","flip-image-free");?>" class="button-primary" name="submit"></td>



          </tr>



        </table>



      </div>



    </form>



  </div>



</div>



<?php



}







// add admin style



add_action('admin_print_styles', 'wp_flip_image_free_admin_css');



function wp_flip_image_free_admin_css(){



	wp_register_style('wp-flip-image-free-admin-style', WP_FLIP_IMAGE_FREE_PATH .'/css/style.css');



	wp_enqueue_style('wp-flip-image-free-admin-style');



	wp_enqueue_style('thickbox');



}







//add admin scripts



add_action('wp_print_scripts', 'wp_flip_image_free_admin_js');



function wp_flip_image_free_admin_js(){



	if(is_admin() && $_GET['page'] == 'flip-image-free'){



		wp_enqueue_script("jquery");			



		wp_enqueue_script('media-upload');



		wp_enqueue_script('thickbox');



		wp_register_script('wp-flip-image-admin-scripts',WP_FLIP_IMAGE_FREE_PATH.'/js/scripts.js', array('jquery','media-upload','thickbox'));



		wp_enqueue_script('wp-flip-image-admin-scripts');



		wp_enqueue_script('plupload-all');



	}



}







// set the options 



register_activation_hook(__FILE__,'set_wp_flip_image_free_options');



function set_wp_flip_image_free_options(){



   add_option('wp_flip_image_free_gallery_name','','');



   add_option('wp_flip_image_free_gallery_type','','');



   add_option('wp_flip_image_free_developer_link','','');



	



   for($i = 1; $i <= 16; $i++){



      add_option('wp_flip_image_free'.$i,'','');



	  add_option('wp_flip_image_free_text'.$i,'','');



	  add_option('wp_flip_image_free_link'.$i,'','');



	  add_option('wp_flip_image_free_check'.$i,'','');



   }



}







// reset the options



register_uninstall_hook(__FILE__,'unset_wp_flip_image_free_options');



function unset_wp_flip_image_free_options(){ add_option('wp_flip_image_free_gallery_name','','');



   delete_option('wp_flip_image_free_gallery_name');



   delete_option('wp_flip_image_free_gallery_type');



   delete_option('wp_flip_image_free_developer_link');



   



   for($i = 1; $i <= 16; $i++){



      delete_option('wp_flip_image_free'.$i);



	  delete_option('wp_flip_image_free_text'.$i);



	  delete_option('wp_flip_image_free_link'.$i);



	  delete_option('wp_flip_image_free_check'.$i);



   }



}







// processing the form



if($_POST['save_wp_flip_image_free'] == "process_wp_flip_image_free") {  



   update_option('wp_flip_image_free_gallery_name',$_REQUEST['wp_flip_image_free_gallery_name']);



   update_option('wp_flip_image_free_gallery_type',$_REQUEST['wp_flip_image_free_gallery_type']);



   update_option('wp_flip_image_free_developer_link',$_REQUEST['wp_flip_image_free_developer_link']);



   



	for($i = 1; $i <= 16; $i++){



		update_option('wp_flip_image_free'.$i,$_REQUEST['wp_flip_image_free'.$i]);



		update_option('wp_flip_image_free_text'.$i,$_REQUEST['wp_flip_image_free_text'.$i]);



		update_option('wp_flip_image_free_link'.$i,$_REQUEST['wp_flip_image_free_link'.$i]);



		update_option('wp_flip_image_free_check'.$i,$_REQUEST['wp_flip_image_free_check'.$i]);



	}



}







// user side functions







//add user scripta and styles



add_action('wp_head', 'wp_flip_image_free_user_script');



function wp_flip_image_free_user_script(){



	wp_enqueue_script("jquery");



	wp_enqueue_script("jquery-ui-core");



	



	wp_register_script('jquery-flip-min', WP_FLIP_IMAGE_FREE_PATH .'/js/jquery.flip.js'); 



	wp_enqueue_script('jquery-flip-min');



	wp_register_script('wp-flip-image-free-user', WP_FLIP_IMAGE_FREE_PATH .'/js/user.js'); 



	wp_enqueue_script('wp-flip-image-free-user');



	



	wp_register_style('wp-flip-image-free-user-style', WP_FLIP_IMAGE_FREE_PATH .'/css/user_style.css');



	wp_enqueue_style('wp-flip-image-free-user-style');



}







//handling shortcode



add_shortcode( 'WP-Flip-Image-Free', 'wp_flip_image_free_shortcode');



function wp_flip_image_free_shortcode(){



	ob_start();



?>



<div class="sponsorListHolder">



  <?php



			if(get_option('wp_flip_image_free_gallery_type') == 0){



				$nocol    = 3;



				$notoshow = 9;



			}else{



				$nocol    = 4;



				$notoshow = 16;



			}



			$col = 0;



			for($i = 1; $i <= 16; $i++){



			 if(get_option('wp_flip_image_free'.$i) != '' && $i <= $notoshow){



			   if($col == 0){



			     echo '<div class="sponser-col'.$nocol.'">' ;



			   }



			?>



  <div class="sponsor">



    <div class="sponsorFlip"> <img width="140" height="140" src="<?php echo get_option('wp_flip_image_free'.$i); ?>" alt="More about <?php echo get_option('wp_flip_image_free_link'.$i); ?>" /> </div>



    <div class="sponsorData">



      <div class="sponsorDescription"> <?php echo get_option('wp_flip_image_free_text'.$i); ?> </div>



      <?php /*?><div class="sponsorURL"><?php if(get_option('wp_flip_image_free_link'.$i) !=''){ ?><a href="<?php echo convert_nonhttp_to_http_fn(get_option('wp_flip_image_free_link'.$i)); ?>" <?php if(get_option('wp_flip_image_free_check'.$i) == 1) { ?>target="_blank" <?php }?>><?php echo shorten_Text(convert_nonhttp_to_http_fn(get_option('wp_flip_image_free_link'.$i))); ?></a><?php }  ?></div><?php */?>

<div class="sponsorURL"><?php if(get_option('wp_flip_image_free_link'.$i) !=''){ ?><a href="<?php echo convert_nonhttp_to_http_fn(get_option('wp_flip_image_free_link'.$i)); ?>" <?php if(get_option('wp_flip_image_free_check'.$i) == 1) { ?>target="_blank" <?php }?>><?php echo convert_nonhttp_to_http_fn(get_option('wp_flip_image_free_link'.$i)); ?></a><?php }  ?></div>

    </div>



  </div>



  <?php  



		    $col++;



			if($col == $nocol){



				echo '</div>';



				$col = 0;



			}



		



		}



	 }  // end for



	  if($col != 0){ // check for closing row



	    echo '</div>';



	  }	



	   ?>



  <div class="clear"></div>



  <?php if(get_option('wp_flip_image_free_developer_link') != '1'){ ?>



   <div class="sponser-col<?php echo $nocol; ?>" style="margin-top:10px;text-align:right;"><?php _e("Powered by","flip-image-free")?><a href="http://flip-it.net/" target="_blank"><img src="<?php echo WP_FLIP_IMAGE_FREE_PATH; ?>/images/powered-by-logo.png" /></a>



   <?php } ?>



</div>



<?php



	return ob_get_clean();



}



	



//AJAX function handle



add_action('wp_ajax_getTheMediaContent', 'load_getTheMediaContent_callback');



function load_getTheMediaContent_callback(){







	@header('Content-Type: ' . get_option('html_type') . '; charset=' . get_option('blog_charset'));



	wp_enqueue_script('plupload-all');



	$upload_size_unit = $max_upload_size = wp_max_upload_size();



	$sizes = array( 'KB', 'MB', 'GB' );







	for ( $u = -1; $upload_size_unit > 1024 && $u < count( $sizes ) - 1; $u++ ) {



		$upload_size_unit /= 1024;



	}







	if ( $u < 0 ) {



		$upload_size_unit = 0;



		$u = 0;



	} else {



		$upload_size_unit = (int) $upload_size_unit;



	}



	?>



   <h3 class="rolling-media-title"><?php _e("Add media files from your computer","flip-image-free")?></h3>



   <div id="plupload-upload-ui" class="hide-if-no-js">



     <div id="drag-drop-area">



       <div class="drag-drop-inside">



        <p class="drag-drop-info"><?php _e('Drop files here',"flip-image-free"); ?></p>



        <p><?php _ex('or', 'Uploader: Drop files here - or - Select Files'); ?></p>



        <p class="drag-drop-buttons">



          <input id="plupload-browse-button" type="button" value="<?php esc_attr_e('Select Files',"flip-image-free"); ?>" class="button" />



        </p>



       </div>



     </div>



  </div>



  <p class="upload-flash-bypass">



	The images you are uploading will display here.</p>



   <span class="max-upload-size"><?php printf( __( 'Maximum upload file size: %d%s.' ,"flip-image-free"), esc_html($upload_size_unit), esc_html($sizes[$u]) ); ?></span>



  <div class="uploaded-images"></div>



  <p class="savebutton ml-submit" style="display:none;">



   <input type="submit" value="<?php _e('Select All',"flip-image-free"); ?>" class="button" id="selectall">



   <input type="submit" value="<?php _e('Insert Selected',"flip-image-free"); ?>" class="button" id="insertall">



  </p>



  <?php

  $plupload_init = array(



    'runtimes'            => 'html5,silverlight,flash,html4',



    'browse_button'       => 'plupload-browse-button',



    'container'           => 'plupload-upload-ui',



    'drop_element'        => 'drag-drop-area',



    'file_data_name'      => 'async-upload',            



    'multiple_queues'     => true,



    'max_file_size'       => wp_max_upload_size().'b',



    'url'                 => admin_url('admin-ajax.php'),



    'flash_swf_url'       => includes_url('js/plupload/plupload.flash.swf'),



    'silverlight_xap_url' => includes_url('js/plupload/plupload.silverlight.xap'),



    'filters'             => array(array('title' => __('Allowed Files'), 'extensions' => '*')),



    'multipart'           => true,



    'urlstream_upload'    => true,







    // additional post data to send to our ajax hook



    'multipart_params'    => array(



      '_ajax_nonce' => wp_create_nonce('photo-upload'),



      'action'      => 'photo_gallery_upload',            // the ajax action name



    ),



  );







  // we should probably not apply this filter, plugins may expect wp's media uploader...



  $plupload_init = apply_filters('plupload_init', $plupload_init); ?>







  <script type="text/javascript">







    jQuery(document).ready(function($){



     $('.savebutton').css('display','none');



      // create the uploader and pass the config from above



      var uploader = new plupload.Uploader(<?php echo json_encode($plupload_init); ?>);







      // checks if browser supports drag and drop upload, makes some css adjustments if necessary



      uploader.bind('Init', function(up){



        var uploaddiv = $('#plupload-upload-ui');







        if(up.features.dragdrop){



          uploaddiv.addClass('drag-drop');



            $('#drag-drop-area')



              .bind('dragover.wp-uploader', function(){ uploaddiv.addClass('drag-over'); })



              .bind('dragleave.wp-uploader, drop.wp-uploader', function(){ uploaddiv.removeClass('drag-over'); });







        }else{



          uploaddiv.removeClass('drag-drop');



          $('#drag-drop-area').unbind('.wp-uploader');



        }



      });







      uploader.init();







      // a file was added in the queue



      uploader.bind('FilesAdded', function(up, files){



        var hundredmb = 100 * 1024 * 1024, max = parseInt(up.settings.max_file_size, 10);







        plupload.each(files, function(file){



          if (max > hundredmb && file.size > hundredmb && up.runtime != 'html5'){



            // file size error?







          }else{







            // a file was added, you may want to update your DOM here...



           //  console.log(file);



		    



          }



        });







        up.refresh();



        up.start();



      });



	  



      // a file was uploaded 



      uploader.bind('FileUploaded', function(up, file, response) {



        $('.savebutton').css('display','block');



		$(".uploaded-images").append('<div class="uploaded-item" id="'+file.id+'"><table><td width="39" valign="middle"><input type="checkbox" value="'+response['response']+'" class="item_selection" /></td><td width="169" align="left" valign="middle"><img src="'+response['response']+'" width="40"></td></tr></table></div>');



      });



	  



	  $('.ml-submit #selectall').live("click",function(){



		$('.uploaded-item .item_selection').each(function(e) {



			$(this).attr("checked",true);



		});



		return false;



      });



	  			



	  var imageList = [];



	  var i = 0;



	  $('.ml-submit #insertall').live("click",function(){



	    $('.uploaded-item .item_selection').each(function(e) {



		  if($(this).is(':checked')){



		    imageList.push($(this).val());



		  }



		});



		$(".image-box img").each(function() {



		   if($(this).attr('src') == '' && i <= imageList.length){



				$(this).attr('src',imageList[i]);



				btnID    =  $(this).attr('id');



				gettheID =  btnID.substring(22);



				textID   = '#wp_flip_image_free-'+gettheID;



				uploadID = jQuery(textID);



				uploadID.val(imageList[i]);



				i++;



			}



		});



		tb_remove();



	  });



	



    });   



  </script>



    <?php



	die(); //



}







// handle uploaded file here



add_action('wp_ajax_photo_gallery_upload','wp_flip_image_free_uploadhandler');



function wp_flip_image_free_uploadhandler(){



  check_ajax_referer('photo-upload');



  // you can use WP's wp_handle_upload() function:



  $status = wp_handle_upload($_FILES['async-upload'], array('test_form'=>true, 'action' => 'photo_gallery_upload'));



  // and output the results or something...



  echo $status['url'];



  exit;



}







function convert_nonhttp_to_http_fn($url) {



    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {



        $url = "http://" . $url;



    }



    return $url;



}







function shorten_Text($text){



    $chars = 24;



	$url   = '';



    $countchars = strlen($text);



    if($countchars > $chars){



        $url   .= substr($text,0,$chars);



		$url   .= '<br>'.substr($text,24,24);



    }



    return $url;



}







//EDIT by SHALINI

function wp_flip_image_free_admin_language(){

	global $wpdb;

	//set default lang



	echo "<h1>WP Flip Image Free - ".__("Language Manager","flip-image-free")."</h1>";

	echo "<h2>".__("Current Language","flip-image-free").": ".$_SESSION['lang']."</h2>";

	echo"<h3>".__("Select Admin Language","flip-image-free")."</h3>";

	

	//echo $image_file_path = plugin_dir_path(__FILE__) .'/home/user/www/path/'; // this is the full server path to your images folder

	$plugin_dir_path = dirname(__FILE__)."/languages/";

	//echo "<br />".plugin_basename(__DIR__)."<br />";

	//echo bloginfo('wpurl');

	//echo dirname( plugin_basename( __FILE__ ) ). '/languages/'."<br />";

	//echo plugin_dir_path(__FILE__);

	//echo dirname( plugin_basename( __FILE__ ) ). '/languages/flip-image-free-' . $_GET[lang] . '.mo'."<br />";

	//echo FLIP_IMAGES_PRO_PATH."/languages/flip-image-free-".$_GET[lang].".mo<br />";

	//echo dirname(__FILE__). '/locale/wordpress-language-' . $locale . '.mo'."<br />";

	$d = dir($plugin_dir_path) or die("Wrong path: $plugin_dir_path");

	while (false !== ($entry = $d->read())) {

		if($entry != '.' && $entry != '..' && !is_dir($dir.$entry) && stristr($entry,".mo"))

		$langs[] = $entry;

	}

	$d->close();

	

	/*$countries=array( 'AF'=>'Afghanistan', 'AL'=>'Albania', 'DZ'=>'Algeria', 'AS'=>'American_Samoa', 'AD'=>'Andorra', 'AO'=>'Angola', 'AI'=>'Anguilla', 'AQ'=>'Antarctica', 'AG'=>'Antigua_And_Barbuda', 'AR'=>'Argentina', 'AM'=>'Armenia', 'AW'=>'Aruba', 'AU'=>'Australia', 'AT'=>'Austria', 'AZ'=>'Azerbaijan', 'BS'=>'Bahamas', 'BH'=>'Bahrain', 'BD'=>'Bangladesh', 'BB'=>'Barbados', 'BY'=>'Belarus', 'BE'=>'Belgium', 'BZ'=>'Belize', 'BJ'=>'Benin', 'BM'=>'Bermuda', 'BT'=>'Bhutan', 'BO'=>'Bolivia', 'BA'=>'Bosnia_And_Herzegovina', 'BW'=>'Botswana', 'BV'=>'Bouvet_Island', 'BR'=>'Brazil', 'IO'=>'British_Indian_Ocean_Territory', 'BN'=>'Brunei', 'BG'=>'Bulgaria', 'BF'=>'Burkina_Faso', 'BI'=>'Burundi', 'KH'=>'Cambodia', 'CM'=>'Cameroon', 'CA'=>'Canada', 'CV'=>'Cape_Verde', 'KY'=>'Cayman_Islands', 'CF'=>'Central_African_Republic', 'TD'=>'Chad', 'CL'=>'Chile', 'CN'=>'China', 'CX'=>'Christmas_Island', 'CC'=>'Cocos_(Keeling)_Islands', 'CO'=>'Columbia', 'KM'=>'Comoros', 'CG'=>'Congo', 'CK'=>'Cook_Islands', 'CR'=>'Costa_Rica', 'CI'=>'Cote_D\'Ivorie_(Ivory_Coast)', 'HR'=>'Croatia_(Hrvatska)', 'CU'=>'Cuba', 'CY'=>'Cyprus', 'CZ'=>'Czech_Republic', 'CD'=>'Democratic_Republic_Of_Congo_(Zaire)', 'DK'=>'Denmark', 'DJ'=>'Djibouti', 'DM'=>'Dominica', 'DO'=>'Dominican_Republic', 'TP'=>'East_Timor', 'EC'=>'Ecuador', 'EG'=>'Egypt', 'SV'=>'El_Salvador', 'GQ'=>'Equatorial_Guinea', 'ER'=>'Eritrea', 'EE'=>'Estonia', 'ET'=>'Ethiopia', 'FK'=>'Falkland_Islands_(Malvinas)', 'FO'=>'Faroe_Islands', 'FJ'=>'Fiji', 'FI'=>'Finland', 'FR'=>'France', 'FX'=>'France,_Metropolitan', 'GF'=>'French_Guinea', 'PF'=>'French_Polynesia', 'TF'=>'French_Southern_Territories', 'GA'=>'Gabon', 'GM'=>'Gambia', 'GE'=>'Georgia', 'DE'=>'Germany', 'GH'=>'Ghana', 'GI'=>'Gibraltar', 'GR'=>'Greece', 'GL'=>'Greenland', 'GD'=>'Grenada', 'GP'=>'Guadeloupe', 'GU'=>'Guam', 'GT'=>'Guatemala', 'GN'=>'Guinea', 'GW'=>'Guinea-Bissau', 'GY'=>'Guyana', 'HT'=>'Haiti', 'HM'=>'Heard_And_McDonald_Islands', 'HN'=>'Honduras', 'HK'=>'Hong_Kong', 'HU'=>'Hungary', 'IS'=>'Iceland', 'IN'=>'India', 'ID'=>'Indonesia', 'IR'=>'Iran', 'IQ'=>'Iraq', 'IE'=>'Ireland', 'IL'=>'Israel', 'IT'=>'Italy', 'JM'=>'Jamaica', 'JP'=>'Japan', 'JO'=>'Jordan', 'KZ'=>'Kazakhstan', 'KE'=>'Kenya', 'KI'=>'Kiribati', 'KW'=>'Kuwait', 'KG'=>'Kyrgyzstan', 'LA'=>'Laos', 'LV'=>'Latvia', 'LB'=>'Lebanon', 'LS'=>'Lesotho', 'LR'=>'Liberia', 'LY'=>'Libya', 'LI'=>'Liechtenstein', 'LT'=>'Lithuania', 'LU'=>'Luxembourg', 'MO'=>'Macau', 'MK'=>'Macedonia', 'MG'=>'Madagascar', 'MW'=>'Malawi', 'MY'=>'Malaysia', 'MV'=>'Maldives', 'ML'=>'Mali', 'MT'=>'Malta', 'MH'=>'Marshall_Islands', 'MQ'=>'Martinique', 'MR'=>'Mauritania', 'MU'=>'Mauritius', 'YT'=>'Mayotte', 'MX'=>'Mexico', 'FM'=>'Micronesia', 'MD'=>'Moldova', 'MC'=>'Monaco', 'MN'=>'Mongolia', 'MS'=>'Montserrat', 'MA'=>'Morocco', 'MZ'=>'Mozambique', 'MM'=>'Myanmar_(Burma)', 'NA'=>'Namibia', 'NR'=>'Nauru', 'NP'=>'Nepal', 'NL'=>'Netherlands', 'AN'=>'Netherlands_Antilles', 'NC'=>'New_Caledonia', 'NZ'=>'New_Zealand', 'NI'=>'Nicaragua', 'NE'=>'Niger', 'NG'=>'Nigeria', 'NU'=>'Niue', 'NF'=>'Norfolk_Island', 'KP'=>'North_Korea', 'MP'=>'Northern_Mariana_Islands', 'NO'=>'Norway', 'OM'=>'Oman', 'PK'=>'Pakistan', 'PW'=>'Palau', 'PA'=>'Panama', 'PG'=>'Papua_New_Guinea', 'PY'=>'Paraguay', 'PE'=>'Peru', 'PH'=>'Philippines', 'PN'=>'Pitcairn', 'PL'=>'Poland', 'PT'=>'Portugal', 'PR'=>'Puerto_Rico', 'QA'=>'Qatar', 'RE'=>'Reunion', 'RO'=>'Romania', 'RU'=>'Russia', 'RW'=>'Rwanda', 'SH'=>'Saint_Helena', 'KN'=>'Saint_Kitts_And_Nevis', 'LC'=>'Saint_Lucia', 'PM'=>'Saint_Pierre_And_Miquelon', 'VC'=>'Saint_Vincent_And_The_Grenadines', 'SM'=>'San_Marino', 'ST'=>'Sao_Tome_And_Principe', 'SA'=>'Saudi_Arabia', 'SN'=>'Senegal', 'SC'=>'Seychelles', 'SL'=>'Sierra_Leone', 'SG'=>'Singapore', 'SK'=>'Slovak_Republic', 'SI'=>'Slovenia', 'SB'=>'Solomon_Islands', 'SO'=>'Somalia', 'ZA'=>'South_Africa', 'GS'=>'South_Georgia_And_South_Sandwich_Islands', 'KR'=>'South_Korea', 'ES'=>'Spain', 'LK'=>'Sri_Lanka', 'SD'=>'Sudan', 'SR'=>'Suriname', 'SJ'=>'Svalbard_And_Jan_Mayen', 'SZ'=>'Swaziland', 'SE'=>'Sweden', 'CH'=>'Switzerland', 'SY'=>'Syria', 'TW'=>'Taiwan', 'TJ'=>'Tajikistan', 'TZ'=>'Tanzania', 'TH'=>'Thailand', 'TG'=>'Togo', 'TK'=>'Tokelau', 'TO'=>'Tonga', 'TT'=>'Trinidad_And_Tobago', 'TN'=>'Tunisia', 'TR'=>'Turkey', 'TM'=>'Turkmenistan', 'TC'=>'Turks_And_Caicos_Islands', 'TV'=>'Tuvalu', 'UG'=>'Uganda', 'UA'=>'Ukraine', 'AE'=>'United_Arab_Emirates', 'UK'=>'United_Kingdom', 'US'=>'United_States', 'UM'=>'United_States_Minor_Outlying_Islands', 'UY'=>'Uruguay', 'UZ'=>'Uzbekistan', 'VU'=>'Vanuatu', 'VA'=>'Vatican_City_(Holy_See)', 'VE'=>'Venezuela', 'VN'=>'Vietnam', 'VG'=>'Virgin_Islands_(British)', 'VI'=>'Virgin_Islands_(US)', 'WF'=>'Wallis_And_Futuna_Islands', 'EH'=>'Western_Sahara', 'WS'=>'Western_Samoa', 'YE'=>'Yemen', 'YU'=>'Yugoslavia', 'ZM'=>'Zambia', 'ZW'=>'Zimbabwe', 'GB'=>'United_Kingdom' );*/


$flags=array("ar"=>"Arabic.png",
				 "es_ES"=>"Spain.png",
				 "de_DE"=>"Germany.png",
				 "en_US"=>"United_States.png",
				 "sv_SE"=>"Sweden.png",
				 "it_IT"=>"Italy.png",
				 "fr_FR"=>"France.png",
				 "fi"=>"Finland.png");




		?>

    <style type="text/css">

	.langlist ul{

		list-style:disc;

		margin-left:20px;

	}

	.langlist ul li{

		list-style:disc;

		line-height:24px;

	}

	.langlist ul li a{

		text-decoration:none;

	}

	</style>

    <?

	echo"<div class=\"langlist\">

			<ul>";

	foreach($langs as $lang){
		
		

		$cnts=explode("_",basename($lang,".mo"));

		$conts=explode("-",basename($lang,".mo"));

		$langext=$conts[count($conts)-1];

		$cname=$countries[$cnts[count($cnts)-1]];
	
			
		

		echo "	<li>

					<a href=\"?page=flip-image-free-language&lang=".$langext."\" title=\"$cname\">

						<img src=\"".plugins_url( 'images/flags/'.$flags[$langext] , __FILE__ )."\"  alt=\"$cname\" /> ".basename($lang)."

					</a>

				</li>";
		

	}

	echo"</ul>

	</div>";



}

?>