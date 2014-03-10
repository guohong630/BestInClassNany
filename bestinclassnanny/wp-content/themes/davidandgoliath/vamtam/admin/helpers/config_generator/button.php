<?php
/**
 * button
 */
?>

<div class="wpv-config-row <?php echo $class ?> clearfix">
	<div class="rtitle">
		<?php if(isset($name)): ?>
			<h4><?php echo $name?></h4>
			<?php wpv_description('', $desc) ?>
		<?php endif ?>
	</div>

	<div class="rcontent">
		<a href="<?php echo isset($link)?$link:'#'?>" title="<?php echo $title?>" class="button-primary <?php echo isset($class)?$class:'' ?>"><?php echo $title?></a>
	</div>
</div>
