<?php 
/* 
	Feedburner Email Subscription Template: Default

	Give your biggest fans another way to keep up with your content feed by placing an email subscription widget on your site.
	This widget support shortcode for the short description.
	For another improvement, you can drop email to zourbuth@gmail.com

	Copyright 2013 zourbuth (email : zourbuth@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
			
?>
<div class="fes-default">
	<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri='<?php echo $feed; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
		<?php if( isset( $args['bootstrap_3'] ) ) : ?>
			<div class="form-group">
				<label class="sr-only"><span class="screen-reader-text green_text bold">BICN E-NEWSLETTER:</span></label>
				<input class="form-control search-field" type="text" value="<?php echo $text; ?>" onfocus="if(this.value=='<?php echo $text; ?>')this.value='';" onblur="if(this.value=='')this.value='<?php echo $text;?>'" name="email">
			</div>
			<button type="submit" class="btn btn-default btn-submit">Sign Up</button>	
			<?php // echo $submit; ?>		
		<?php else : ?>
			<p>
				<input type="text" value="<?php echo $text; ?>" onfocus="if(this.value=='<?php echo $text; ?>')this.value='';" onblur="if(this.value=='')this.value='<?php echo $text;?>'" name="email">
				<input class="btn" type="submit" name="imageField" value="<?php echo $submit; ?>" alt="<?php echo $submit; ?>" />
			</p>
		<?php endif; ?>
		<input type="hidden" value="<?php echo $feed; ?>" name="uri" />
		<input type="hidden" name="loc" value="en_US" />
	</form>
	<?php
		// Check if the current site supports automatic feed links, if not just return
		if ( current_theme_supports( 'automatic-feed-links' ) ) {
			$rss = array(
				// translators: Separator between blog name and feed type in feed links
				'separator'	=> _x('&raquo;', 'feed link'),
				// translators: 1: blog title, 2: separator (raquo)
				'feedtitle'	=> __('%1$s %2$s Feed'),
				// translators: %s: blog title, 2: separator (raquo)
				'comstitle'	=> __('%1$s %2$s Comments Feed'),
			);
			
			if( $args['posts_feed_link'] ) { ?>
				<a class="feed-link" title="<?php echo esc_attr(sprintf( $rss['feedtitle'], get_bloginfo('name'), $rss['separator'] )); ?>" href="<?php echo get_feed_link(); ?>">
					<img alt="img" src="<?php echo FEEDBURNER_EMAIL_SUBSCRIPTION_URL; ?>/img/rss.png" />Posts <abbr title="Really Simple Syndication">RSS</abbr>
				</a><?php
			}
			
			if( $args['comments_feed_link'] ) { ?>
				<a class="feed-link" title="<?php echo esc_attr(sprintf( $rss['comstitle'], get_bloginfo('name'), $rss['separator'] )); ?>" href="<?php echo get_feed_link( 'comments_' . get_default_feed() ); ?>">
					<img alt="img" src="<?php echo FEEDBURNER_EMAIL_SUBSCRIPTION_URL; ?>/img/rss.png" />Comments <abbr title="Really Simple Syndication">RSS</abbr>
				</a><?php
			}
		}
	?>
</div>