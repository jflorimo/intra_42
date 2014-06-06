<div id="block-board-categories">
	<div id="title-categories">Tickets</div>
	<div id='block-add-tickets'><a href='<?php echo site_url("tickets")?>/add_tickets' id="link-add-tickets">Ajouter un ticket</a></div>
	<table id="block-info-categories">
	<thead>
	<tr>
		<th class="th-label-categories">Name</th>
		<th class="th-label-categories">Admin</th>
		<th class="th-label-categories">State</th>
		<th class="th-label-categories">Change State</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($tickets as $row): ?>
	<tr>
		<td class="td-info-categories"><a href='<?php echo site_url("tickets")?>/this_tickets?id=<?php echo $row->id; ?>' class='link-ticket'><?php echo $row->subject; ?></a> by <?php echo $row->uid_users; ?></td>
		<?php if ($row->uid_admins == NULL): ?>
			<td class="td-info-categories">Pas encore assigné</td>
		<?php else: ?>
			<td class="td-info-categories"><?php echo $row->uid_admins; ?></td>
		<?php endif; ?>
		<?php if ($row->etat == 0): ?>
			<td class="td-info-categories">Ouvert</td>
			<td class="td-info-categories"><a href='<?php echo site_url("tickets")?>/close?id=<?php echo $row->id; ?>' class='link-ticket'>Fermer</a></td>
		<?php else: ?>
			<td class="td-info-categories">Fermé</td>
			<td class="td-info-categories"><a href='<?php echo site_url("tickets")?>/open?id=<?php echo $row->id; ?>' class='link-ticket'>Ouvrir</a></td>
		<?php endif; ?>
	</div>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	
</div>