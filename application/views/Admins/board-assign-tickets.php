<div id="block-list-tickets">
	<?php echo form_open('admins/assign_tickets'); ?>
	<input type="hidden" id="input-id-ticket" name="id" value="<?php echo $id; ?>" />
	<select name="uid_admins">
      <?php foreach ($admins as $row): ?>
        <option value="<?php echo $row->uid; ?>" ><?php echo $row->uid; ?></option>
      <?php endforeach; ?>
    </select>
	<input type="submit" value="Assigner" />

	<?php echo form_close(); ?>
</div>