<div class="span1 tools">
<a href="index.php?page=3" class='btn btn-large btn-inverse toolbar' data-toggle="tooltip" title="Back"><i class="icon-arrow-left icon-white"></i></a>
<a href="#" class='btn btn-large btn-inverse toolbar' data-toggle="tooltip" title="Save Career Path" id='savebtn'><i class="icon-ok icon-white"></i></a>
</div>
<div class="span11">
	<h1>Select your Career Goals</h1>
	<div class="span3">
		<ul class='job_list' job_list='1' level='0'>
		<?php 
			if (is_array($this->all_jobs))
			{
				foreach ($this->all_jobs as $job)
				{
					echo "<li job_id='{$job['id']}'>";
					echo $job['name'];
					echo "</li>";
				}
			}
		?>
		</ul>
	
	</div>
	<div class="span3">
		<ul class='job_list' job_list='2' level='1'>
		</ul>	
	</div>
	<div class="span3">
		<ul class='job_list' job_list='3' level='2'>
		</ul>
	</div>
</div>

<script type="text/javascript">

$(function() {
	$('.toolbar').tooltip()	;
	addJobListEvents();
	
});

var jobpath = new Array();

<?php 
		foreach ($this->user_jobs as $user_job)
		{
			//echo "jobpath[".$user_job->getLevel()."] = ".$user_job->getJobId().";\n";	
		}
	?>

$('#savebtn').click(function(){
	$.ajax({
		  url: "ajax.php?page=3&action=saveCareerPath",
		  data:{'job_path' : jobpath},
		  success : function(data){
			  window.location.href = "index.php?page=3";
		  },
		  dataType: 'html'		  	
	});
});

function listShift()
{
	$(".job_list").each(function (index, value) {
		if (index > 0){
			var prevlist = parseInt($(this).attr('job_list')) - 1;
			$('ul[job_list = '+prevlist+']').html($(this).html()).effect("slide", { direction : 'right' });
		}
		$(this).attr("level",parseInt($(this).attr("level"))+1);
	});	
}

function addJobListEvents()
{
	$('.job_list li').hover(function(){
		$(this).addClass('jobhover');
	});

	$('.job_list li').mouseout(function(){
		$(this).removeClass('jobhover');
	});	
	$('.job_list li').unbind('click');
	$('.job_list li').click(function(){
		var job_id = $(this).attr('job_id');
		var job_list = parseInt($(this).parent().attr('job_list'));
		var job_level = parseInt($(this).parent().attr('level'));
		var current_list = $(this).parent();
		if (job_list == 3)
		{
			listShift();
			job_list = job_list - 1;
			current_list = $('ul[job_list = '+job_list+']');
				
		}
		$.ajax({
			  url: "ajax.php?page=3&action=getCareerGoals",
			  data:{'job_id' : job_id,
			  		'job_list' : job_list},
			  success : function(data){
						  
			  			var nextjoblist = job_list + 1;
			  			//$('ul[job_list = '+nextjoblist+']').html("");
			  			
			  			$(".job_list").each(function (index, value) {
			  			    if($(this).attr('job_list') > job_list){
								$(this).html("");
			  			    }
			  			});
			  			var jobshtml = "";
			  			$.each(data, function(index, value) {
			  				jobshtml = jobshtml+'<li job_id="'+value.id+'">'+value.name+'</li>';
		  			}); 
			  			$('ul[job_list = '+nextjoblist+']').append(jobshtml).effect("slide", { direction : 'right' });	
			  			jobpath[job_level] = job_id;
			  			for (var i = job_level+1; i < jobpath.length;i++)
			  			{
			  				jobpath[i] = null;	
			  			}
		  			addJobListEvents();
			  },
			  error: function(error){
				  alert(data);
			  },
			  dataType: 'json'		  	
		});
		current_list.children(".jobselected").removeClass('jobselected');
		current_list.children("[job_id = '"+job_id+"']").addClass('jobselected');
		//$(this).addClass('jobselected');
		
	});
	
}

</script>