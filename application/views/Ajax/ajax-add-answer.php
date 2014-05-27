<script type="text/javascript">
	$(document).ready(function(){
		$( ".block-this-answer").click(function() {
  			var id_answer = $(this).attr("value");
  			$.post( "forum/ajax_list_comments", {id_answer:id_answer}, function(result){
  				$("#block-list-comment").html(result);
  			});
		});
	});
</script>
<?php foreach ($answers as $row): ?>
	<div class="block-this-answer">
		<div class="text-answer"><?php echo $row->answer; ?></div>
		<div class="text-uid">Posté par <?php echo $row->uid; ?></div>
	</div>
<?php endforeach; ?>