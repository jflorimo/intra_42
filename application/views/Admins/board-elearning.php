<script type="text/javascript">
	$(document).ready(function(){ 
        $(".link-delete-category").click(function(){
        	var id = $(this).attr("value");
    		$.post("ajax_delete_elearning",{id:id});
    		$(this).parent("tr").remove();
        });
    });
</script>
<div id="block-board-categories">
	<div id="title-categories">E-Learning</div>
	<?php echo form_open('admins/add_elearning?id='.$_GET['id'].'', array("id" => "form-add-category" , "enctype" => "multipart/form-data")); ?>
		<span id="title-add-category">Add a Video</span>
		<label for="name" id="label-name-category">Name</label>
    	<input type="text" id="input-name-category" name="name" value="<?php echo set_value('name'); ?>" />
    	<br/><br/>
        <INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="9999999">
        <label for="video" id="label-name-category">Import e-learning video: </label>
        <INPUT NAME="userfile" TYPE="file">
        <br/><br/>
    	<input type="submit" id="submit-add-category" value="Add" />
	<?php echo form_close(); ?>
	<table id="block-info-categories">
	<thead>
	<tr>
		<th class="th-label-categories">Name</th>
		<th class="th-label-categories">Delete</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($elearning as $row): ?>
		<tr>
			<td class="td-info-categories"><?php echo $row->name; ?></td>
			<td class="td-info-categories link-delete-category" value="<?php echo $row->id; ?>">Delete</td> 
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>