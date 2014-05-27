<script>
$(document).ready(function(){
	$("#submit-add-thread").click(function(){
		var idcategory = $("#input-category-thread").attr("value");
		var subject = $("#input-subject-thread").attr("value");
		var description = $("#textarea-description-thread").attr("value");
    	$.post("forum/ajax_add_thread",{idcategory:idcategory, subject:subject, description:description}, function(result){
    		$("#block-list-threads").html(result);
    	});
	});
	$(".block-this-thread").click(function(){
		var idthread = $(this).attr("value");
		$.post("forum/ajax_this_thread",{idthread:idthread}, function(result){
    		$("#block-threads-forum").html(result);
    	});	
	});
});
</script>

<div id="block-threads-categories">
	<div id="title-threads-category"><?php echo $category[0]->name; ?></div>

		<div id="title-add-thread">Add a Thread</div>
		<input type="hidden" name="category" id="input-category-thread" value="<?php echo $category[0]->id; ?>">
		<label for="subject" id="label-subject-thread">Subject</label>
    	<input type="text" id="input-subject-thread" name="subject" />
    	<br/>
    	<textarea id="textarea-description-thread" name="description" placeholder="Write your message here..."></textarea>
    	<input type="submit" id="submit-add-thread" value="Add" />

</div>
<div id="block-list-threads">
	<?php foreach ($threads as $row): ?>
		<div class="block-this-thread" value="<?php echo $row->id; ?>"><span class="subject-thread"><?php echo $row->subject; ?></span></div>
	<?php endforeach; ?>
</div>