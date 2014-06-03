<div id="block-answer-ticket">
	<div id="block-thread-subject">
		<div id="title-threads-subject"><?php echo $ticket[0]->subject; ?></div>
		<div id="title-threads-description"><?php echo $ticket[0]->description; ?></div>
		<div id="title-threads-uid">Posted by  <?php echo $ticket[0]->uid_users; ?></div>
	</div>
	<div id="block-list-answer">
		<?php foreach ($answer as $row): ?>
			<div class="block-this-answer" value="<?php echo $row->id; ?>">
				<div class="text-answer"><?php echo $row->answer; ?></div>
				<div class="text-uid">Posted by  <?php echo $row->uid_users; ?></div>
			</div>
		<?php endforeach; ?>
	</div>

	<div id="title-add-answer">Add a answer</div>
	<?php echo form_open('tickets/add_answertickets'); ?>
	<input type="hidden" id="input-id-ticket" name="id" value="<?php echo $ticket[0]->id; ?>" />
	<textarea id="textarea-answer-thread" name="answer" rows="10" cols="86" placeholder="Ecrivez votre réponse ici..."></textarea>
    <br/>
	<?php if ($ticket[0]->etat == 0): ?>
		<input type="submit" value="Envoyer" id="submit-add-answer"/>
	<?php else: ?>
		<div id="block-error-subject-forum">Le ticket est fermé, vous ne pouvez pas y répondre !</div>
	<?php endif; ?>
	<?php echo form_close(); ?>
</div>