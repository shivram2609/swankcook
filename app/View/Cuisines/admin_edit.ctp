<div class="cuisines form">
<?php echo $this->Form->create('Cuisine'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cuisine'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type');
		echo $this->Form->input('status',array("type"=>"checkbox","label"=>"Active"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>