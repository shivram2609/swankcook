<div class="cuisines index">
	<h2><?php echo __('Cuisines'); ?></h2>
	<?php echo $this->Form->create("Cuisine",array("div"=>false,)); ?>
	<div class="srch">
		<?php echo $this->element("admins/common",array("place"=>'Search by Cuisine type',"flag"=>false,"pageheader"=>'',"buttontitle"=>'no',"listflag"=>"no","action"=>'no')); ?>
		<div class="rhs_actions right">
			<?php echo $this->Html->link(__('Add Cuisine'), array('action' => 'add')); ?>
		</div>
	</div>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Form->input("check",array("label"=>false,"div"=>false,"id"=>'checkall',"type"=>'checkbox')); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($cuisines as $cuisine): ?>
	<tr>
		<td><?php echo $this->Form->input("id.".$cuisine['Cuisine']['id'],array("class"=>'chk',"value"=>$cuisine['Cuisine']['id'],"type"=>'checkbox',"div"=>false,"label"=>false)); ?><?php echo $this->Form->input("status.".$cuisine['Cuisine']['id'],array("type"=>'hidden',"value"=>($cuisine['Cuisine']['status'] == 1?0:1))); ?></td>
		<td><?php echo h($cuisine['Cuisine']['type']); ?>&nbsp;</td>
		<td><?php echo h(empty($cuisine['Cuisine']['status'])?'Inactive':'Active'); ?>&nbsp;</td>
		<td><?php echo h($cuisine['Cuisine']['created']); ?>&nbsp;</td>
		<td><?php echo h($cuisine['Cuisine']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cuisine['Cuisine']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $cuisine['Cuisine']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cuisine['Cuisine']['type']))); ?>
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
	<?php echo $this->Form->end(); ?>
</div>

