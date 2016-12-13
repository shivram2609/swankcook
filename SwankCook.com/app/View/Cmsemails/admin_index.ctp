<div class="cmsemails index">
	<h2><?php echo __('Cmsemails'); ?></h2>
	<?php echo $this->Form->create("Cmsemail",array("div"=>false,)); ?>
	<div class="srch">
		<?php echo $this->element("admins/common",array("place"=>'Search by Subject',"flag"=>false,"pageheader"=>'',"buttontitle"=>'no',"listflag"=>"no","action"=>'no',"selflag"=>false)); ?>
	</div>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('subject'); ?></th>
			<th><?php echo $this->Paginator->sort('emailfrom'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($cmsemails as $cmsemail): ?>
	<tr>
		<td><?php echo h($cmsemail['Cmsemail']['subject']); ?>&nbsp;</td>
		<td><?php echo h($cmsemail['Cmsemail']['emailfrom']); ?>&nbsp;</td>
		<td><?php echo h($cmsemail['Cmsemail']['created']); ?>&nbsp;</td>
		<td><?php echo h($cmsemail['Cmsemail']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cmsemail['Cmsemail']['id'])); ?>
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