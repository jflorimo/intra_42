<div id="title-add-thread">Add a Ticket</div>
<?php	echo form_open('tickets/add_tickets', array("id"=>"form-connexion")); ?>
	<label for="subject" id="label-subject-thread">Subject</label>
	<input type="text" id="input-subject-thread" name="subject" />
	<br/>
	<textarea id="textarea-description-thread" name="description" placeholder="Write your message here..."></textarea>
	<input type="submit" id="submit-add-thread" value="Add" />
<?php echo form_close(); ?>