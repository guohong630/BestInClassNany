<?php
/**
 * Content wrappers
 *
 * @author 		WooThemes
 * @package 	wpv
 * @subpackage  david-goliath
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

?>

<div class="pane main-pane">
	<div class="row">
		<div class="page-outer-wrapper">
			<div class="clearfix page-wrapper">
				<?php WpvTemplates::left_sidebar() ?>
				
				<article class="<?php echo WpvTemplates::get_layout(); ?>">
					<?php 
						global $wpv_has_header_sidebars;
						if( $wpv_has_header_sidebars) WpvTemplates::header_sidebars(); 
					?>
					<div class="page-content no-image">