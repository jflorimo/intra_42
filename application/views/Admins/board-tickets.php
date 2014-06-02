<div id="block-board-categories">
	<div id="title-categories">Tickets</div>
	<table id="block-info-categories">
	<thead>
	<tr>
		<th class="th-label-categories">Name</th>
		<th class="th-label-categories">Admin</th>
		<th class="th-label-categories">Assigned</th>
		<th class="th-label-categories">State</th>
		<th class="th-label-categories">Change State</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($tickets as $row): ?>
	<tr>
	<?php if($row->uid_admins == NULL): ?>
		<td class="td-info-categories"><a href='<?php echo site_url("tickets")?>/thisticket?id=<?php echo $row->id; ?>' class='link-ticket'><?php echo $row->subject; ?></a> by <?php echo $row->uid_users; ?></td>
		<?php if ($row->uid_admins == NULL): ?>
			<td class="td-info-categories">Pas encore assigné</td>
		<?php else: ?>
			<td class="td-info-categories"><?php echo $row->uid_admins; ?></td>
		<?php endif; ?>
		<td class="td-info-categories"><a href='<?php echo site_url("admins")?>/assign_tickets?id=<?php echo $row->id; ?>' class='link-ticket'>Assigner</a>
		<?php if ($row->etat == 0): ?>
			<td class="td-info-categories">Ouvert</td>
			<td class="td-info-categories"></td>
		<?php else: ?>
			<td class="td-info-categories">Fermé</td>
			<td class="td-info-categories"></td>
		<?php endif; ?>
	</div>
	<?php elseif($row->uid_admins == $this->session->userdata("uid")): ?>
	<div class="block-ticket-assign">
		<td class="td-info-categories"><a href='<?php echo site_url("tickets")?>/thisticket?id=<?php echo $row->id; ?>' class='link-ticket'><?php echo $row->subject; ?></a> by <?php echo $row->uid_users; ?></td>
		<?php if ($row->uid_admins == NULL): ?>
			<td class="td-info-categories">Pas encore assigné</td>
		<?php else: ?>
			<td class="td-info-categories"><?php echo $row->uid_admins; ?></td>
		<?php endif; ?>
		<td class="td-info-categories"><a href='<?php echo site_url("admins")?>/assign_tickets?id=<?php echo $row->id; ?>' class='link-ticket'>Assigner</a>
		<?php if ($row->etat == 0): ?>
			<td class="td-info-categories">Ouvert</td>
			<td class="td-info-categories"><a href='<?php echo site_url("admins")?>/close_tickets?id=<?php echo $row->id; ?>' class='link-ticket'>Fermer</a>
		<?php else: ?>
			<td class="td-info-categories">Fermé</td>
			<td class="td-info-categories"><a href='<?php echo site_url("admins")?>/open_tickets?id=<?php echo $row->id; ?>' class='link-ticket'>Ouvrir</a>
		<?php endif; ?>
	<?php endif; ?>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>