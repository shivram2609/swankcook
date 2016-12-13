<div class="cmspages view">
<h2><?php echo __('Cmspage'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cmspage['Cmspage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($cmspage['Cmspage']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($cmspage['Cmspage']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($cmspage['Cmspage']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($cmspage['Cmspage']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($cmspage['Cmspage']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($cmspage['Cmspage']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cmspage'), array('action' => 'edit', $cmspage['Cmspage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cmspage'), array('action' => 'delete', $cmspage['Cmspage']['id']), array(), __('Are you sure you want to delete # %s?', $cmspage['Cmspage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cmspages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cmspage'), array('action' => 'add')); ?> </li>
	</ul>
</div>
