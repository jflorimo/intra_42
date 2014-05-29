<script type="text/javascript">
	$(document).ready(function(){ 
        $(".link-delete-category").click(function(){
        	var id = $(this).attr("value");
    		$.post("ajax_delete_module",{id:id});
    		$(this).parent("tr").remove();
        });
    });
</script>
<div id="block-board-categories">
	<div id="title-categories">Modules</div>
	<?php echo form_open("admins/add_module", array("id" => "form-add-category")); ?>
		<span id="title-add-category">Add a Module</span>
		<label for="name" id="label-name-category">Name</label>
    	<input type="text" id="input-name-category" name="name" value="<?php echo set_value('name'); ?>" />
    	<select name="semestres">
    		<option value="nochoice">Choose a Semestre</option>
    		<?php foreach ($semestres as $row): ?>
    			<option value="<?php echo $row->id; ?>"><?php echo $row->titre; ?></option>
    		<?php endforeach; ?>
    	</select>
    	<input type="submit" id="submit-add-category" value="Add" />
	<?php echo form_close(); ?>
	<table id="block-info-categories">
	<thead>
	<tr>
		<th class="th-label-categories">Name</th>
		<th class="th-label-categories">Semestre</th>
		<th class="th-label-categories">Delete</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($modules as $row): ?>
		<tr>
			<td class="td-info-categories"><?php echo $row->name; ?></td>
			<td class="td-info-categories"><?php echo $row->titre; ?></td>
			<td class="td-info-categories link-delete-category" value="<?php echo $row->id; ?>">Delete</td> 
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>