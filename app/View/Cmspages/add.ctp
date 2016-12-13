<div class="cmspages form">
<?php echo $this->Form->create('Cmspage'); ?>
	<fieldset>
		<legend><?php echo __('Add Cmspage'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('slug');
		echo $this->Form->input('content');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cmspages'), array('action' => 'index')); ?></li>
	</ul>
</div>
