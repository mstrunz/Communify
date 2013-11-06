<div class="span1 tools">
<a href="index.php?page=1" class='btn btn-large btn-inverse'><i class="icon-arrow-left icon-white"></i></a>
</div>
<div class="span11">
<h1>View Suggestion</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Username</th>
			<th>Suggestion</th>
			<?php if(Core::getUser()->getIsManager()):?>
			<th>Coins</th>
			<?php endif;?>
		</tr>
	</thead>
	<tbody>
	<?php 
	if (is_array($this->suggestions))
	{
		foreach ($this->suggestions as $suggestion)
		{
			echo "<tr>";
			echo "<td>{$suggestion['username']}</td>";
			echo "<td>{$suggestion['suggestiontext']}</td>";
			if(Core::getUser()->getIsManager())
			{
				echo "<td>";
				if (!$suggestion['coins'])
				{	
					echo "<div style='width:110px;'>";
					echo "<input type='text' suggestionid='{$suggestion['id']}' class='suggestioncoins'/>";
					echo "<a href='#' class='btn specialbtn btn-inverse' suggestionid='{$suggestion['id']}'><i class='icon-ok icon-white'></i></a>";
					echo "</div>";
				}
				else
				{
					echo $suggestion['coins']."<img alt='img/ccs.gif' src='img/ccs.gif'>";
				}
				echo "</td>";
			}
			echo "</tr>";
		}
	}
	?>
	</tbody>
</table>
</div>
<script type="text/javascript">

$(function() {

	$(".specialbtn").click(function(){
		var suggestionid = $(this).attr('suggestionid');
		var coins = $('[suggestionid="'+suggestionid+'"]').val();
		$.ajax({
			  url: "ajax.php?page=1&action=addSuggestionCoins",
			  data:{'suggestionid' : suggestionid,
			  		'coins' : coins},
			  success : function(data){
	  			location.reload();
			  }		  	
		});
	});

});
</script>