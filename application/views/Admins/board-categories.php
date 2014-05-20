<script type="text/javascript">
	$(document).ready(function(){ 
        $(".link-delete-category").click(function(){
        	var id = $(this).attr("value");
    		$.post("ajax_delete_category",{id:id});
    		$(this).parent("tr").remove();
        });
    });
</script>
<div id="block-board-categories">
	<div id="title-categories">Categories</div>
	<table id="block-info-categories">
	<thead>
	<tr>
		<th class="th-label-categories">ID</th>
		<th class="th-label-categories">Name</th>
		<th class="th-label-categories">Delete</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($categories as $row): ?>
		<tr>
			<td class="td-info-categories"><?php echo $row->id; ?></td>
			<td class="td-info-categories"><?php echo $row->name; ?></td>
			<td class="td-info-categories link-delete-category" value="<?php echo $row->id; ?>">Delete</td> 
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>