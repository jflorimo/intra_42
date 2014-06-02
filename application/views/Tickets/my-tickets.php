<div id="block-all-mytickets">
	<?php foreach($tickets as $row): ?>
	<div class="block-ticket">
		<a href='<?php echo site_url("tickets")?>/thisticket?id=<?php echo $row->id; ?>' class='link-ticket'><?php echo $row->subject; ?></a>
		<?php if ($row->uid_admins == NULL): ?>
			<span class="admins-ticket">Pas encore assigné</span>
		<?php else: ?>
			<span class="admins-ticket"><?php echo $row->uid_admins; ?></span>
		<?php endif; ?>
		<?php if ($row->etat == 0): ?>
			<span class="etat-ticket">Ouvert</span>
			<a href='<?php echo site_url("tickets")?>/close?id=<?php echo $row->id; ?>' class='link-ticket'>Fermer</a>
		<?php else: ?>
			<span class="etat-ticket">Fermé</span>
			<a href='<?php echo site_url("tickets")?>/open?id=<?php echo $row->id; ?>' class='link-ticket'>Ouvrir</a>
		<?php endif; ?>
	</div>
	<?php endforeach; ?>
	<a href='<?php echo site_url("tickets")?>/add_tickets' id='link-add-tickets'>Ajouter un ticket</a>
</div>