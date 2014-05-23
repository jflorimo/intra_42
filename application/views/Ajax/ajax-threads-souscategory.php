<script>
$(document).ready(function(){
	$("#submit-add-thread").click(function(){
		var idsouscategory = $("#input-category-thread").attr("value");
		var subject = $("#input-subject-thread").attr("value");
		var description = $("#textarea-description-thread").attr("value");
    	$.post("forum/ajax_add_thread",{idsouscategory:idsouscategory, subject:subject, description:description}, function(result){
    		$("#block-list-threads").html(result).load("forum/ajax/ajax-threads-souscategory");
    	});	
	});
});
</script>

<div id="block-threads-categories">
	<div id="title-threads-category"><?php echo $souscategory[0]->name; ?></div>

		<span id="title-add-thread">Add a Thread</span>
		<input type="hidden" name="category" id="input-category-thread" value="<?php echo $souscategory[0]->id; ?>">
		<label for="subject" id="label-subject-thread">Subject</label>
    	<input type="text" id="input-subject-thread" name="subject" />
    	<textarea id="textarea-description-thread" name="description" placeholder="Write your message here..."></textarea>
    	<input type="submit" id="submit-add-thread" value="Add" />

</div>
<div id="block-list-threads">
	<?php foreach ($threads as $row): ?>
		<?php echo $row->subject; ?><br/>
	<?php endforeach; ?>
</div>