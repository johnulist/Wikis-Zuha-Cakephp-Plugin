<div class="wikis index">
<h2><?php __('Wikis');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('WikiStartPage.title');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($wikis as $wiki):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link(str_replace('_', ' ', $wiki['WikiStartPage']['title']), array('controller' => 'wikis', 'action' => 'view', $wiki['Wiki']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Add Page', true), array('controller' => 'wiki_pages', 'action' => 'edit', 'wiki_id' => $wiki['Wiki']['id'])); ?>
			<?php echo $this->Html->link(__('List Categories', true), array('controller' => 'wiki_categories', 'action' => 'index')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $wiki['Wiki']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $wiki['Wiki']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<?php echo $this->element('paging'); ?>


<?php 
// set the contextual menu items
$this->Menu->setValue(array(
	array(
		'heading' => 'Wikis',
		'items' => array(
			$this->Html->link(__('Add Wiki', true), array('controller' => 'wiki_contents', 'action' => 'edit', 'admin' => 1))),
		),
	));
?>