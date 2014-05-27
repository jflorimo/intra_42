<script>
$(document).ready(function(){
	$(".block-this-thread").click(function(){
		var idthread = $(this).attr("value");
		$.post("forum/ajax_this_thread",{idthread:idthread}, function(result){
    		$("#block-threads-forum").html(result);
    	});	
	});
});
</script>
<?php foreach ($threads as $row): ?>
	<div class="block-this-thread" value="<?php echo $row->id; ?>"><span class="subject-thread"><?php echo $row->subject; ?></span></div>
<?php endforeach; ?>
