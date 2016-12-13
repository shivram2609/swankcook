<div class="configurations form">
<?php echo $this->Form->create('Configuration'); ?>
	<fieldset>
		<legend><?php echo __('Add Configuration'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('slug');
		echo $this->Form->input('conf_value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Configurations'), array('action' => 'index')); ?></li>
	</ul>
</div>
