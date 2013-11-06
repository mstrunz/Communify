<div class="span1 tools">
<?php 
	$user = Core::getUser();
	if ($user->getIsManager()==true):
?>
<a href="index.php?page=5&sub=manageEmployees&action=manageEmployees" class='btn btn-large btn-inverse toolbar'  data-toggle="tooltip" title="Manage Employees" data-placement="right"><i class="icon-bookmark icon-white"></i></a>
<?php endif;?>
<a href="index.php?page=5&sub=viewAwards&action=viewAwards" class='btn btn-large btn-inverse toolbar'  data-toggle="tooltip" title="View Awards" data-placement="right"><i class="icon-star icon-white"></i></a>
</div>
<div class="span11">
<h1>My Account
<?php 
echo $this->balance;
?>
<img alt="img/cc.gif" src="img/cc.gif">
</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th></th>
			<th>Task/Suggestion Name</th>
			<th>Coins</th>
			<th>Date</th>
		</tr>
	</thead>
	<tbody>
	<?php 
		if (is_array($this->balanceSheet))
		{
			foreach ($this->balanceSheet as $row)
			{
				echo "<tr>";
				if ($row['type']=='income')
				{
					echo "<td><i class='icon-arrow-up'></i></td>";	
				}
				else
				{
					echo "<td><i class='icon-arrow-down'></i></td>";	
				}
				echo "<td>{$row['name']}</td>";
				echo "<td>{$row['coins']}<img alt='img/ccs.gif' src='img/ccs.gif'></td>";
				echo "<td>{$row['date']}</td>";
				echo "</tr>";
			}
		}
	?>
</tbody>
</table>
</div>
<script type="text/javascript">
$(function() {
	$('.toolbar').tooltip()	;
});
</script>