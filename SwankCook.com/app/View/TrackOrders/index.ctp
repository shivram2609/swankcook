<div class="trackOrders index">
	<h2><?php echo __('Track Orders'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('order_id'); ?></th>
			<th><?php echo $this->Paginator->sort('order_status_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($trackOrders as $trackOrder): ?>
	<tr>
		<td><?php echo h($trackOrder['TrackOrder']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($trackOrder['User']['id'], array('controller' => 'users', 'action' => 'view', $trackOrder['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($trackOrder['Order']['id'], array('controller' => 'orders', 'action' => 'view', $trackOrder['Order']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($trackOrder['OrderStatus']['id'], array('controller' => 'order_statuses', 'action' => 'view', $trackOrder['OrderStatus']['id'])); ?>
		</td>
		<td><?php echo h($trackOrder['TrackOrder']['created']); ?>&nbsp;</td>
		<td><?php echo h($trackOrder['TrackOrder']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $trackOrder['TrackOrder']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $trackOrder['TrackOrder']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $trackOrder['TrackOrder']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $trackOrder['TrackOrder']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Track Order'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Statuses'), array('controller' => 'order_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Status'), array('controller' => 'order_statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
