<div class="locations index">
	<h2><?php echo __('Locations'); ?></h2>
	<?php echo $this->Form->create("Location",array("div"=>false,)); ?>
	<div class="srch">
		<?php echo $this->element("admins/common",array("place"=>'Search by Location name',"flag"=>false,"pageheader"=>'',"buttontitle"=>'no',"listflag"=>"no","action"=>'no')); ?>
		<div class="rhs_actions right">
			<?php echo $this->Html->link(__('Add Location'), array('action' => 'add')); ?>
		</div>
	</div>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Form->input("check",array("label"=>false,"div"=>false,"id"=>'checkall',"type"=>'checkbox')); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($locations as $location): ?>
	<tr>
		<td><?php echo $this->Form->input("id.".$location['Location']['id'],array("class"=>'chk',"value"=>$location['Location']['id'],"type"=>'checkbox',"div"=>false,"label"=>false)); ?><?php echo $this->Form->input("status.".$location['Location']['id'],array("type"=>'hidden',"value"=>($location['Location']['status'] == 1?0:1))); ?></td>
		<td><?php echo h($location['Location']['name']); ?>&nbsp;</td>
		<td><?php echo h(empty($location['Location']['status'])?"Inactive":"Active"); ?>&nbsp;</td>
		<td><?php echo h($location['Location']['created']); ?>&nbsp;</td>
		<td><?php echo h($location['Location']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $location['Location']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $location['Location']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $location['Location']['name']))); ?>
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
