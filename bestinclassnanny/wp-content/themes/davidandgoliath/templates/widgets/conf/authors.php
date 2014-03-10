<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'davidandgoliath'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
		
<p>
	<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('How many authors to display?', 'davidandgoliath'); ?></label>
	<select id="<?php echo $this->get_field_id('count'); ?>" class="num_shown" name="<?php echo $this->get_field_name('count'); ?>">
		<?php for($i=1; $i<=$this->max_authors; $i++): ?>
			<option <?php selected($i, $count) ?>><?php echo $i ?></option>
		<?php endfor ?>
	</select>
</p>

<div class="authors_wrap hidden_wrap">
	<?php
		for($i=1; $i<=$this->max_authors; $i++): 
			$author_id = "author_id_$i";
			$author_desc = "author_desc_$i";
	?>
		<div class="hidden_el" <?php if($i>$count):?>style="display:none"<?php endif;?>>
			<p>
				<label for="<?php echo $this->get_field_id($author_id); ?>">
					<?php _e('Author:', 'davidandgoliath')?>
				</label>
				<select name="<?php echo $this->get_field_name($author_id); ?>" id="<?php echo $this->get_field_id($author_id); ?>" class="widefat">
					<?php foreach($authors as $user_id => $display_name):?>
						<option value="<?php echo $user_id ?>" <?php if($selected_author[$i] == $user_id) echo 'selected="selected"'?>><?php echo $display_name?></option>;
					<?php endforeach ?>
				</select>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( $author_desc ); ?>">
					<?php _e('Author Description (optional):', 'davidandgoliath')?>
				</label>
				<textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id($author_desc); ?>" name="<?php echo $this->get_field_name($author_desc); ?>"><?php echo $author_descriptions[$i]; ?></textarea>
			</p>

		</div>

	<?php endfor;?>
</div>