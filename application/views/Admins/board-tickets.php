<div id="block-list-tickets">
	<?php foreach($tickets as $row): ?>
	<div class="block-ticket-no-assign">
	<?php if($row->uid_admins != NULL): ?>
		<a href='<?php echo site_url("tickets")?>/thisticket?id=<?php echo $row->id; ?>' class='link-ticket'><?php echo $row->subject; ?></a>
		<?php if ($row->uid_admins != NULL): ?>
			<span class="admins-ticket">Pas encore assigné</span>
		<?php else: ?>
			<span class="admins-ticket"><?php echo $row->uid_users; ?></span>
		<?php endif; ?>
		<a href='<?php echo site_url("tickets")?>/assign?id=<?php echo $row->id; ?>' class='link-ticket'>Assigner</a>
		<?php if ($row->etat == 0): ?>
			<span class="etat-ticket">Ouvert</span>
		<?php else: ?>
			<span class="etat-ticket">Fermé</span>
		<?php endif; ?>
	</div>
	<?php elseif($row->uid_users == $this->session->userdata("adminslogin")): ?>
	<div class="block-ticket-assign">
		<a href='<?php echo site_url("tickets")?>/thisticket?id=<?php echo $row->id; ?>' class='link-ticket'><?php echo $row->subject; ?></a>
		<?php if ($row->id_admins == 0): ?>
			<span class="admins-ticket">Pas encore assigné</span>
		<?php else: ?>
			<span class="admins-ticket"><?php echo $row->uid_users; ?></span>
		<?php endif; ?>
		<a href='<?php echo site_url("tickets")?>/assign?id=<?php echo $row->id; ?>' class='link-ticket'>Assigner</a>
		<?php if ($row->etat == 0): ?>
			<span class="etat-ticket">Ouvert</span>
			<a href='<?php echo site_url("tickets")?>/closeadmins?id=<?php echo $row->id; ?>' class='link-ticket'>Fermer</a>
		<?php else: ?>
			<span class="etat-ticket">Fermé</span>
			<a href='<?php echo site_url("tickets")?>/openadmins?id=<?php echo $row->id; ?>' class='link-ticket'>Ouvrir</a>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	<?php endforeach; ?>
</div>