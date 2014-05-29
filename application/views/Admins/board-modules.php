<head>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
    $("#datepicker2").datepicker();
  });
  </script>
</head>
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
    	<br/><br/>
    	<label for="start" id="label-name-category">Start</label>
    	<input id="datepicker" name="start"/>
    	<br/><br/>
    	<label for="end" id="label-name-category">End</label>
    	<input id="datepicker2" name="end"/>
    	<br/><br/>
    	<label for="nbplaces" id="label-name-category">Place needed</label>
    	<input type="text" id="input-number-modules" name="nbplaces" value="<?php echo set_value('nbplaces'); ?>" />
    	<br/><br/>
    	<label for="nbcredits" id="label-name-category">Credits needed</label>
    	<input type="text" id="input-number-modules" name="nbcredits" value="<?php echo set_value('nbcredits'); ?>" />
    	<br/><br/>
    	<select name="semestres">
    		<option value="nochoice">Choose a Semestre</option>
    		<?php foreach ($semestres as $row): ?>
    			<option value="<?php echo $row->id; ?>"><?php echo $row->titre; ?></option>
    		<?php endforeach; ?>
    	</select>
    	<br/><br/>
    	<textarea id="textarea-description-modules" name="description" placeholder="Write the module's description..."></textarea>
    	<br/><br/>
    	<input type="submit" id="submit-add-category" value="Add" />
	<?php echo form_close(); ?>
	<table id="block-info-categories">
	<thead>
	<tr>
		<th class="th-label-categories">Name</th>
		<th class="th-label-categories">Semestre</th>
		<th class="th-label-categories">Places</th>
		<th class="th-label-categories">Credits</th>
		<th class="th-label-categories">Start</th>
		<th class="th-label-categories">End</th>
		<th class="th-label-categories">Description</th>
		<th class="th-label-categories">Delete</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($modules as $row): ?>
		<tr>
			<td class="td-info-categories"><?php echo $row->name; ?></td>
			<td class="td-info-categories"><?php echo $row->titre; ?></td>
			<td class="td-info-categories"><?php echo $row->nbplaces; ?></td>
			<td class="td-info-categories"><?php echo $row->nbcredits; ?></td>
			<td class="td-info-categories"><?php echo $row->start; ?></td>
			<td class="td-info-categories"><?php echo $row->end; ?></td>
			<td class="td-info-categories"><?php echo $row->description; ?></td>
			<td class="td-info-categories link-delete-category" value="<?php echo $row->id; ?>">Delete</td> 
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>