<script type="text/javascript">
	$(document).ready(function(){
		$( "#submit-add-answer" ).click(function() {
  			var id_thread = $("#input-answer-thread").val();
  			var answer = $("#textarea-answer-thread").val();
  			$.post( "forum/ajax_add_answer_thread", {id_thread:id_thread, answer:answer}, function(result){
  				$("#block-list-answer").html(result);
  			});
		});
	});
</script>
<div id="block-thread-subject">
	<div id="title-threads-subject"><?php echo $thread[0]->subject; ?></div>
	<div id="title-threads-description"><?php echo $thread[0]->description; ?></div>
</div>
<div id="block-list-answer">
	<?php foreach ($answers as $row): ?>
		<?php echo $row->answer; ?>
		<br />
	<?php endforeach; ?>
</div>
<div id="block-form-answer">
	<div id="title-add-answer">Add an answer</div>
	<input type="hidden" name="thread" id="input-answer-thread" value="<?php echo $thread[0]->id; ?>">
	<textarea id="textarea-answer-thread" name="answer" placeholder="Write your answer here..."></textarea>
	<div><input type="submit" id="submit-add-answer" value="Add" /></div>
</div>
