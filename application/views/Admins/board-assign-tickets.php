<div id="block-list-tickets">
<div id="title-assign-tickets">Assign a ticket</div>
	<?php echo form_open('admins/assign_tickets',array("id"=>"form-assign-tickets")); ?>
	<input type="hidden" id="input-id-tickets" name="id" value="<?php echo $id; ?>" />
	<select name="uid_admins">
      <?php foreach ($admins as $row): ?>
        <option value="<?php echo $row->uid; ?>" ><?php echo $row->uid; ?></option>
      <?php endforeach; ?>
    </select>
	<input type="submit" id="submit-add-tickets" value="Assign" />
	<?php echo form_close(); ?>
</div>