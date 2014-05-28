<script type="text/javascript">
	$(document).ready(function(){
		$( "#submit-add-answer" ).click(function() {
  			var id_thread = $("#input-answer-thread").val();
  			var answer = $("#textarea-answer-thread").val();
  			$.post( "forum/ajax_add_answer_thread", {id_thread:id_thread, answer:answer}, function(result){
  				$("#block-list-answer").html(result);
  			});
		});
		$( ".block-this-answer").click(function() {
  			var id_answer = $(this).attr("value");
  			$.post( "forum/ajax_list_comments", {id_answer:id_answer}, function(result){
  				$("#block-list-comment").html(result);
  			});
		});
	});
</script>
<div id="block-thread-subject">
	<div id="title-threads-subject"><?php echo $thread[0]->subject; ?></div>
	<div id="title-threads-description"><?php echo $thread[0]->description; ?></div>
	<div id="title-threads-uid">Posted by  <?php echo $thread[0]->uid; ?></div>
</div>
<div id="block-list-answer">
	<?php foreach ($answers as $row): ?>
		<div class="block-this-answer" value="<?php echo $row->id; ?>">
			<div class="text-answer"><?php echo $row->answer; ?></div>
			<div class="text-uid">Posted by  <?php echo $row->uid; ?></div>
		</div>
	<?php endforeach; ?>
</div>
<div id="block-list-comment">
</div>
<div id="block-form-answer">
	<div id="title-add-answer">Add an answer</div>
	<input type="hidden" name="thread" id="input-answer-thread" value="<?php echo $thread[0]->id; ?>">
	<textarea id="textarea-answer-thread" name="answer" placeholder="Write your answer here..."></textarea>
	<div><input type="submit" id="submit-add-answer" value="Add" /></div>
</div>
