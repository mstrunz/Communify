<div class="span1 tools">
<?php 
	$user = Core::getUser();
	if ($user->getIsManager()==true):
?>
<a href="index.php?page=1&sub=addTask&action=addTask" id="addTask" class='btn btn-large btn-inverse'  data-toggle="tooltip" title="Add Task" data-placement="right"><i class="icon-plus icon-white"></i></a>
<?php endif;?>
</div>
<div class="span11">
<h1>My Work</h1>
<h3>My Tasks</h3>

<table class="table table-hover">
	<thead>
		<tr>
		<?php 
			if (Core::getUser()->getIsManager()==true):?>
			<th class='orderer' orderfield='username'>User Name <i class="icon-resize-vertical"></i></th>
			<?php endif;?>
			<th class='orderer' orderfield='taskname'>Task Name <i class="icon-resize-vertical"></i></th>
			<th class='orderer' orderfield='duedate'>Due Date <i class="icon-resize-vertical"></i></th>
			<th class='orderer' orderfield='coins'>Coins <i class="icon-resize-vertical"></i></th>
			<th class='orderer' orderfield='status'>Status <i class="icon-resize-vertical"></i></th>
			<th>Actions</i></th>
		</tr>
		<tr class='filterrow'>
		<?php 
			if (Core::getUser()->getIsManager()==true):?>
			<th><input type="text" id='usernamefilter' class='filter' placeholder="Search by User" value='<?php echo Core::getInSession("usernamefilter");?>'/></th>
			<?php endif;?>
			<th><input type="text" id='tasknamefilter' class='filter' placeholder="Search by Task" value='<?php echo Core::getInSession("tasknamefilter");?>'/></th>
			<th><input type="text" id='duedatefilter' class='filter' placeholder="Search by Date" value='<?php echo Core::getInSession("duedatefilter");?>'/></th>
			<th><input type="text" id='coinsfilter' style='width:50px;' class='filter' placeholder="Search by Coins" value='<?php echo Core::getInSession("coinsfilter");?>'/></th>
			<th>
				<select id='statusfilter'>
				<option value=''>Search by Status</option>
				<option value='Open' <?php echo (Core::getInSession("statusfilter")=="Open")?selected:"";?>>Open</option>
				<option value='Completed' <?php echo (Core::getInSession("statusfilter")=="Completed")?selected:"";?>>Completed</option>
				</select>
			</th>
			<th></th>
		</tr>
	</thead>
	<tbody id="tasklist">
	</tbody>
</table>
</div>
<script type="text/javascript">
var orderfield = "<?php echo Core::getInSession("orderfield");?>";
var orderdirection = "<?php echo Core::getInSession("orderdirection");?>";
$(function() {
	$('#addTask').tooltip()	;
	loadTaskList();

	$('.filter').keyup(function(){
		loadTaskList();
	});

	$('#statusfilter').change(function(){
		loadTaskList();
	});

	$('.orderer').click(function(){
		var field = $(this).attr('orderfield');
		if(orderfield == field){
			if (orderdirection == "asc"){;	
				orderdirection = "desc";
			}
			else{
				orderdirection = "asc";
			}
		}
		$(this).parent().children('th').children('i').attr('class','icon-resize-vertical');
		if (orderdirection == "asc"){
			$(this).children('i').attr('class','icon-chevron-down');
		}
		else{
			$(this).children('i').attr('class','icon-chevron-up');
		}
		orderfield = field;
		loadTaskList();
	});

});
 var request;
function loadTaskList()
{
	if (request)
	{
		request.abort();
	}
	request = $.ajax({
		  url: "ajax.php?page=1&sub=taskList&action=taskList",
		  data:{
				'tasknamefilter' : $('#tasknamefilter').val(),
				<?php echo (Core::getUser()->getIsManager())?"'usernamefilter' : $('#usernamefilter').val(),":"";?>
				'duedatefilter' : $('#duedatefilter').val(),
				'coinsfilter' : $('#coinsfilter').val(),
				'statusfilter' : $('#statusfilter').val(),
				'orderfield' : orderfield,
				'orderdirection' : orderdirection
		  		},
		  success : function(data){
			$('#tasklist').html(data);
			$('.listactions').tooltip()	;
		  },
		  dataType: 'html'	  	
	});		
}
</script>