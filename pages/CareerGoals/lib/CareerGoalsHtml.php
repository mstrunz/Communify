<div class="span1 tools">
<a href="index.php?page=3&sub=selectCareerGoals&action=selectCareerGoals" id="addTask" class='btn btn-large btn-inverse'  data-toggle="tooltip" title="Set Career Goals" data-placement="right"><i class="icon-random icon-white"></i></a>
</div>
<div class="span11">
<h1>Career Goals</h1>
<?php if (is_array($this->user_jobs ))
	foreach ($this->user_jobs as $user_job):?>
	<div style='float:left;' class='textbox'>
	<h1><?php echo $user_job->getJob()->getName();?></h1>
	 <div class="text"><p>Some Text about the Job and how to get there.
	 </p>
	 </div>
	</div>
	
	
<?php endforeach;?>
</div>

<script type="text/javascript">
	$('#addTask').tooltip()	;

	$('.listactions').tooltip()	;
</script>