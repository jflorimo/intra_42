<script type="text/javascript">
	$(document).ready(function(){ 
		$("#block-result-uid-yearbook").hide();
        $("#block-yearbook").tablesorter( {sortList: [[0,0], [1,0]]} );
        $("#input-uid-search-yearbook").keyup(function(){
        	var uid = $(this).val();
        	if (uid.length > 2)
        	{
        		$.post("ajax_get_uid",{uid:uid},function(result){
    				$("#block-result-uid-yearbook").html(result);
    				$("#block-result-uid-yearbook").show();
 				 });
        	}
        	else
        		$("#block-result-uid-yearbook").hide();
        });
    });
</script>
<div id="block-yearbook-menu">
<?php foreach(range('A','Z') as $letter): ?>
	<a href='<?php echo site_url("users")?>/yearbook?letter=<?php echo $letter; ?>' class="link-yearbook-menu"><?php echo $letter; ?></a>
<?php endforeach; ?>
<div id="block-search-uid-yearbook">
	<input type="text" id="input-uid-search-yearbook" name="uid" value="" placeholder="Search a uid..." autocomplete="off"/>
	<div id="block-result-uid-yearbook">
	</div>
</div>
</div>

<div id="title-letter-yearbook"><?php echo $_GET["letter"]; ?></div>
<table id="block-yearbook" class="tablesorter">
<thead>
<tr>
	<th class="th-label-yearbook">Image</th>
	<th class="th-label-yearbook">Uid</th>
	<th class="th-label-yearbook">Lastname</th>
	<th class="th-label-yearbook">Firstname</th>
</tr>
</thead>
<tbody>
<?php foreach ($users as $row): ?>
	<?php if ($row["uid"][0]): ?>
	<tr>
		<td class="td-info-yearbook"><?php echo (isset($row["picture"][0]) ? "<img class='td-image-yearbook' src='https://cdn.42.fr/userprofil/profilview/".$row["uid"][0].".jpg'/>" : null) ?></td>
		<td class="td-info-yearbook"><a href="<?php echo site_url("users")?>/account?uid=<?php echo $row["uid"][0]; ?>" class="uid-user-yearbook"><?php echo $row["uid"][0]; ?></a></td>
		<td class="td-info-yearbook"><?php echo $row["last-name"][0]; ?></td>
		<td class="td-info-yearbook"><?php echo $row["first-name"][0]; ?></td>
	</tr>
	<?php endif; ?>
<?php endforeach; ?>
</tbody>
</table>
</div>