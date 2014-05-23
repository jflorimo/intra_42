<script type="text/javascript">
	$(document).ready(function(){ 
        $(".link-delete-category").click(function(){
        	var id = $(this).attr("value");
    		$.post("ajax_delete_souscategory",{id:id});
    		$(this).parent("tr").remove();
        });
    });
</script>
<div id="block-board-categories">
	<div id="title-categories">Categories</div>
	<?php echo form_open("admins/add_souscategory", array("id" => "form-add-category")); ?>
		<span id="title-add-category">Add a child Category</span>
		<label for="name" id="label-name-category">Name</label>
    	<input type="text" id="input-name-category" name="name" value="<?php echo set_value('name'); ?>" />
    	<select name="categories">
    		<option value="nochoice">Choose a category</option>
    		<?php foreach ($categories as $row): ?>
    			<option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
    		<?php endforeach; ?>
    	</select>
    	<input type="submit" id="submit-add-category" value="Add" />
	<?php echo form_close(); ?>
	<table id="block-info-categories">
	<thead>
	<tr>
		<th class="th-label-categories">Name</th>
		<th class="th-label-categories">Category</th>
		<th class="th-label-categories">Delete</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($souscategories as $row): ?>
		<tr>
			<td class="td-info-categories"><?php echo $row->name; ?></td>
			<td class="td-info-categories"><?php echo $row->cname; ?></td>
			<td class="td-info-categories link-delete-category" value="<?php echo $row->id; ?>">Delete</td> 
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>