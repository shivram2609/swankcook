<div class="orderStatuses view">
<h2><?php echo __('Order Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($orderStatus['OrderStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($orderStatus['OrderStatus']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status Slug'); ?></dt>
		<dd>
			<?php echo h($orderStatus['OrderStatus']['status_slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($orderStatus['OrderStatus']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($orderStatus['OrderStatus']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order Status'), array('action' => 'edit', $orderStatus['OrderStatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order Status'), array('action' => 'delete', $orderStatus['OrderStatus']['id']), array(), __('Are you sure you want to delete # %s?', $orderStatus['OrderStatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Track Orders'), array('controller' => 'track_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track Order'), array('controller' => 'track_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Track Orders'); ?></h3>
	<?php if (!empty($orderStatus['TrackOrder'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Order Status Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($orderStatus['TrackOrder'] as $trackOrder): ?>
		<tr>
			<td><?php echo $trackOrder['id']; ?></td>
			<td><?php echo $trackOrder['user_id']; ?></td>
			<td><?php echo $trackOrder['order_id']; ?></td>
			<td><?php echo $trackOrder['order_status_id']; ?></td>
			<td><?php echo $trackOrder['created']; ?></td>
			<td><?php echo $trackOrder['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'track_orders', 'action' => 'view', $trackOrder['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'track_orders', 'action' => 'edit', $trackOrder['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'track_orders', 'action' => 'delete', $trackOrder['id']), array(), __('Are you sure you want to delete # %s?', $trackOrder['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Track Order'), array('controller' => 'track_orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
