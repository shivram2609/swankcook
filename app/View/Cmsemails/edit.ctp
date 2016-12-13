<div class="cmsemails form">
<?php echo $this->Form->create('Cmsemail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cmsemail'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('emailfrom');
		echo $this->Form->input('subject');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cmsemail.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Cmsemail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cmsemails'), array('action' => 'index')); ?></li>
	</ul>
</div>
