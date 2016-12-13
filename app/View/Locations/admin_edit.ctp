<div class="locations form">
<?php echo $this->Form->create('Location'); ?>
	<fieldset>
		<legend><?php echo __('Edit Location'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('status',array("label"=>"Active"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); echo $this->Html->link(__('Back'), array('action' => 'index'),array("class"=>"link")); ?>
</div>