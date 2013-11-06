<div class="span1 tools">
<a href="index.php?page=5" class='btn btn-large btn-inverse'><i class="icon-arrow-left icon-white"></i></a>
</div>
<div class="span11">
<h1>My Awards</h1>
<br><br>
<table class="table table-hover">
<?php foreach ($this->awards as $award):?>
	<tr>
		<td>
		<?php if ($award['achieved']): $class="";?>
		<img alt="pokal" src="img/pokal.jpg" style='height:100px;'>
		<?php else: $class="notachieved";?>
		<img alt="pokal" src="img/pokal_grey.jpg" style='height:100px;'>	
		<?php endif;?>
		</td>
		<td>
		<h2 class="<?php echo $class;?>"><?php echo $award['name'];?></h2>
		</td>
	</tr>
<?php endforeach;?>
</table>
</div>