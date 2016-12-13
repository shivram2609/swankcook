<div class="trackOrders view">
<h2><?php echo __('Track Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($trackOrder['TrackOrder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trackOrder['User']['id'], array('controller' => 'users', 'action' => 'view', $trackOrder['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trackOrder['Order']['id'], array('controller' => 'orders', 'action' => 'view', $trackOrder['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trackOrder['OrderStatus']['id'], array('controller' => 'order_statuses', 'action' => 'view', $trackOrder['OrderStatus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($trackOrder['TrackOrder']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($trackOrder['TrackOrder']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Track Order'), array('action' => 'edit', $trackOrder['TrackOrder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Track Order'), array('action' => 'delete', $trackOrder['TrackOrder']['id']), array(), __('Are you sure you want to delete # %s?', $trackOrder['TrackOrder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Track Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Statuses'), array('controller' => 'order_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Status'), array('controller' => 'order_statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
