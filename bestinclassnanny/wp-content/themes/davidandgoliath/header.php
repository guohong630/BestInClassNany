<?php
/**
 * Header template
 *
 * @package wpv
 * @subpackage david-goliath
 */
?><!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]> <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if IE 10 ]> <!--> <html <?php language_attributes(); ?> <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false) {
    echo 'class="ie10 no-ie no-js internet_11"';
} else {
	echo 'class="ie10 no-ie no-js "';
	}?> > <!--<![endif]-->
<!--[if IE 11 ]> <!--> <html <?php language_attributes(); ?> class="ie11 no-ie no-js <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false) {
    echo 'test';
}?>"> <!--<![endif]-->
<!--[if !(IE)]><!--> <html <?php language_attributes(); ?> class="no-ie no-js"> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php WpvTemplates::site_title() ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php wpvge('favicon_url')?>"/>
	<?php wp_head(); ?>
</head>
<body <?php body_class('layout-'.WpvTemplates::get_layout()); ?>>
	<span id="top"></span>
	<?php do_action('wpv_body') ?>
	<div id="container" class="main-container">

		<?php include(locate_template('templates/header/top.php'));?>

		<?php do_action('wpv_after_top_header') ?>

		<div class="boxed-layout">
			<div class="page-dash-wrapper">
				<div class="pane-wrapper clearfix">
					<?php include(locate_template('templates/header/middle.php'));?>
					<div id="main-content">
						<?php include(locate_template('templates/header/sub-header.php'));?>
						<!-- #main (do not remove this comment) -->
						<div id="main" role="main" class="layout-<?php echo WpvTemplates::get_layout() ?>">
							<div class="limit-wrapper">
