<div class="span1 tools">
<a href="index.php?page=5" class='btn btn-large btn-inverse'><i class="icon-arrow-left icon-white"></i></a>
</div>
<div class="span11">
<h1>Manage Employees</h1>

<table class="table table-hover">
	<thead>
		<tr>
			<th>Employee</th>
			<th>Email</th>
			<th>Manager</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($this->employees as $employee):?>
	<tr>
		<td><?php echo $employee->getUserName();?></td>
		<td><?php echo $employee->getEmail();?></td>
		<td><?php echo $employee->getManager()->getUserName();?></td>
		<td>
			<?php if($employee->getManagerId() != Core::getUser()->getId() && $employee->getId() != Core::getUser()->getId()):?>
			<a href='#' class='employeetask' userid='<?php echo $employee->getId();?>' data-toggle="tooltip" title="Add to my Employees"><i class='icon-bookmark'></i></a>
			<?php endif;?>
		</td>
	</tr>
	<?php endforeach;?>
	</tbody>

</table>

</div>

<script type="text/javascript">
$(function() {
	$('.employeetask').tooltip();

	$('.employeetask').click(function(){

		$.ajax({
			  url: "ajax.php?page=5&action=addEmployee",
			  data:{'userid': $(this).attr('userid')},
			  success : function(data){
				  location.reload();
			  }		  	
		});
	});
	
});
</script>