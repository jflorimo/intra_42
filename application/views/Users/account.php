<script type="text/javascript">
	$(document).ready(function(){ 
        $("#submit-go-admin-account").click(function(){
        	var uid = $(this).attr("value");
    		$.post("ajax_switch_to_admin",{uid:uid}, function(result){
    			$("#result-switch-to-admin").html(result);
    		});
        });
    });
</script>
<div id="block-account">
	<?php
		if (isset($user[0]["birth-date"][0]))
		{
			$year = substr($user[0]["birth-date"][0], 0, 4);
			$month = substr($user[0]["birth-date"][0], 4, 2);
			$day = substr($user[0]["birth-date"][0], 6, 2);
			$birthdate = $day."/".$month."/".$year;
		}
	?>
	<div id='title-account'>My Account</div>

	<div id="block-image-user-account">
		<?php if (isset($user[0]["picture"][0])): ?>
			<img id="image-user-account" src="https://cdn.42.fr/userprofil/profilview/<?php echo $user[0]["uid"][0]; ?>.jpg"/>
		<?php endif; ?>
	</div>

	<div id="block-all-info-user-account">
		<?php if (isset($user[0]["uid"][0])): ?>
		<div class="block-info-user-account">
			<span class="label-user-account">UID</span>
			<span id="uid-user-account" class="info-user-account"><?php echo $user[0]["uid"][0]; ?></span>
		</div>
		<?php endif; ?>

		<?php if (isset($user[0]["last-name"][0])): ?>
		<div class="block-info-user-account">
			<span class="label-user-account">Lastname</span>
			<span id="lastname-user-account" class="info-user-account"><?php echo $user[0]["last-name"][0]; ?></span>
		</div>
		<?php endif; ?>

		<?php if (isset($user[0]["first-name"][0])): ?>
		<div class="block-info-user-account">
			<span class="label-user-account">Firstname</span>
			<span id="firstname-user-account" class="info-user-account"><?php echo $user[0]["first-name"][0]; ?></span>
		</div>
		<?php endif; ?>

		<?php if (isset($user[0]["birth-date"][0])): ?>
		<div class="block-info-user-account">
			<span class="label-user-account">birthdate</span>
			<span id="birthdate-user-account" class="info-user-account"><?php echo $birthdate; ?></span>
		</div>
		<?php endif; ?>

		<?php if (isset($user[0]["mobile-phone"][0])): ?>
		<div class="block-info-user-account">
			<span class="label-user-account">Mobile phone</span>
			<span id="phone-user-account" class="info-user-account"><?php echo $user[0]["mobile-phone"][0]; ?></span>
		</div>
		<?php endif; ?>

		<?php if (isset($user[0]["email-address"][0])): ?>
		<div class="block-info-user-account">
			<span class="label-user-account">Mail</span>
			<span id="email-user-account" class="info-user-account"><?php echo $user[0]["email-address"][0]; ?></span>
		</div>
		<?php endif; ?>
	</div>

	<?php if ($this->session->userdata("admin") == true): ?>
		<div id="submit-go-admin-account" value=<?php echo $user[0]["uid"][0]; ?>>Switch to admin</div>
		<div id="result-switch-to-admin"></div>
	<?php endif; ?>
	<div id="submit-my-tickets"><a href='<?php echo site_url("tickets")?>/my_tickets' class='link-ticket'>My tickets</a></div>

	<?php if ($this->session->userdata("admin") == true): ?>
		<?php if ($logs): ?>
		<div id="title-logs">25 last logs</div>
		<table id="block-logs-user-account">
			<tr>
			<td class="td-label-logs">Type</td>
			<td class="td-label-logs">Url page</td>
			<td class="td-label-logs">Comment</td>
			<td class="td-label-logs">Date</td>
			</tr>
		<div >
			<?php foreach ($logs as $row): ?>
				<tr>
				<td class="td-info-logs"><?php echo $row->type; ?></td>
				<td class="td-info-logs"><?php echo $row->urlpage; ?></td>
				<td class="td-info-logs"><?php echo $row->comment; ?></td>
				<td class="td-info-logs"><?php echo $row->date; ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>
	<?php endif; ?>
</div>