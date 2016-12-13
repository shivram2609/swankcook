<div class="orders view">
<h2><?php echo __('Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($order['Order']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dish'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['Dish']['name'], array('controller' => 'dishes', 'action' => 'view', $order['Dish']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($order['Order']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment'); ?></dt>
		<dd>
			<?php echo h($order['Order']['payment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Commission'); ?></dt>
		<dd>
			<?php echo h($order['Order']['commission']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Paid'); ?></dt>
		<dd>
			<?php echo h($order['Order']['is_paid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($order['Order']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($order['Order']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order'), array('action' => 'edit', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order'), array('action' => 'delete', $order['Order']['id']), array(), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dishes'), array('controller' => 'dishes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish'), array('controller' => 'dishes', 'action' => 'add')); ?> </li>
	</ul>
</div>
