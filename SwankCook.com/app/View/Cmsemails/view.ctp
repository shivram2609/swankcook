<div class="cmsemails view">
<h2><?php echo __('Cmsemail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cmsemail['Cmsemail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($cmsemail['Cmsemail']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emailfrom'); ?></dt>
		<dd>
			<?php echo h($cmsemail['Cmsemail']['emailfrom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subject'); ?></dt>
		<dd>
			<?php echo h($cmsemail['Cmsemail']['subject']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($cmsemail['Cmsemail']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($cmsemail['Cmsemail']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($cmsemail['Cmsemail']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($cmsemail['Cmsemail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($cmsemail['Cmsemail']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cmsemail'), array('action' => 'edit', $cmsemail['Cmsemail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cmsemail'), array('action' => 'delete', $cmsemail['Cmsemail']['id']), array(), __('Are you sure you want to delete # %s?', $cmsemail['Cmsemail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cmsemails'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cmsemail'), array('action' => 'add')); ?> </li>
	</ul>
</div>
