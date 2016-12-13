<div class="cmsemails index">
	<h2><?php echo __('Cmsemails'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('emailfrom'); ?></th>
			<th><?php echo $this->Paginator->sort('subject'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($cmsemails as $cmsemail): ?>
	<tr>
		<td><?php echo h($cmsemail['Cmsemail']['id']); ?>&nbsp;</td>
		<td><?php echo h($cmsemail['Cmsemail']['title']); ?>&nbsp;</td>
		<td><?php echo h($cmsemail['Cmsemail']['emailfrom']); ?>&nbsp;</td>
		<td><?php echo h($cmsemail['Cmsemail']['subject']); ?>&nbsp;</td>
		<td><?php echo h($cmsemail['Cmsemail']['slug']); ?>&nbsp;</td>
		<td><?php echo h($cmsemail['Cmsemail']['content']); ?>&nbsp;</td>
		<td><?php echo h($cmsemail['Cmsemail']['status']); ?>&nbsp;</td>
		<td><?php echo h($cmsemail['Cmsemail']['created']); ?>&nbsp;</td>
		<td><?php echo h($cmsemail['Cmsemail']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cmsemail['Cmsemail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cmsemail['Cmsemail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cmsemail['Cmsemail']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cmsemail['Cmsemail']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Cmsemail'), array('action' => 'add')); ?></li>
	</ul>
</div>
