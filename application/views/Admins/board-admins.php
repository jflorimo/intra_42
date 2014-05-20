<script type="text/javascript">
	$(document).ready(function(){ 
        $(".link-delete-admin").click(function(){
        	var id = $(this).attr("value");
    		$.post("ajax_delete_admin",{id:id});
    		$(this).parent("tr").remove();
        });
    });
</script>
<div id="block-board-admins">
	<div id="title-admins">Admins</div>
	<table id="block-info-admins">
	<thead>
	<tr>
		<th class="th-label-admins">ID</th>
		<th class="th-label-admins">Uid</th>
		<th class="th-label-admins">Delete</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($admins as $row): ?>
		<tr>
			<td class="td-info-admins"><?php echo $row->id; ?></td>
			<td class="td-info-admins"><?php echo $row->uid; ?></td>
			<td class="td-info-admins link-delete-admin" value="<?php echo $row->id; ?>">Delete</td> 
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>