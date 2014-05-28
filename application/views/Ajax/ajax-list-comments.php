<script type="text/javascript">
	$(document).ready(function(){
		$( "#submit-add-comment" ).click(function() {
  			var id_answer = $("#input-comment-answer").val();
  			var comment = $("#textarea-comment-answer").val();
  			$.post( "forum/ajax_add_comment_answer", {id_answer:id_answer, comment:comment}, function(result){
  				$("#block-all-comments").html(result);
  			});
		});
	});
</script>
<div id="block-answer-current">
	<div class="text-answer"><?php echo $answer[0]->answer; ?></div>
	<div class="text-uid"><?php echo $answer[0]->uid; ?></div>
</div>
<div id="block-all-comments">
	<?php foreach($comments as $row): ?>
		<div class="block-this-comment">
			<div class="text-comment"><?php echo $row->comment; ?></div>
			<div class="text-comment-uid">Posted by <?php echo $row->uid; ?></div>
		</div>
	<?php endforeach; ?>
</div>
<div id="block-form-comment">
	<div id="title-add-comment">Add a comment</div>
	<input type="hidden" name="answer" id="input-comment-answer" value="<?php echo $answer[0]->id; ?>">
	<textarea id="textarea-comment-answer" name="comment" placeholder="Write your comment here..."></textarea>
	<div><input type="submit" id="submit-add-comment" value="Add" /></div>
</div>