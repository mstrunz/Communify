<div class="span1 tools">
</div>
<div class="span11">
<h1>Rewards</h1>
<hr>
<h1>My Current Balance: <?php echo $this->currentBalance;?><img alt='cc' src='img/cc.gif'></h1>
<table class="table table-hover rewardtable">
<tr>
	<td class='rewardlogo' action='Cash'><img alt="cash" src="img/cash.jpg"></td>
	<td valign="middle" action='Cash'>
		<h1>Cash your Communify Coins</h1>
		<p>1000<img alt='cc' src='img/ccs.gif'> = 1€</p>
	</td>
</tr>
<tr>
	<td class='rewardlogo' action='Amazon'><img alt="cash" src="img/amazon.jpg"></td>
	<td valign="middle" action='Amazon'>
		<h1>Get a Amazone gift card</h1>
		<p>800<img alt='cc' src='img/ccs.gif'> = 1€</p>
	</td>
</tr>
<tr>
	<td class='rewardlogo' action='Free Product'><img alt="cash" src="img/Hilti-drill.png"></td>
	<td valign="middle" action='Free Product'>
		<h1>Get a free Product</h1>
		<p>500<img alt='cc' src='img/ccs.gif'> = 1€</p>
	</td>
</tr>
</table>
</div>


<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Modal header</h3>
  </div>
  <div class="modal-body">
    <label for='amount'>Amount</label><input type="text" id='amount' />
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true" id='amountcloser'>Close</button>
    <button class="btn btn-inverse" id='amountsubmitter'>Submit</button>
  </div>
</div>


<script type="text/javascript">

$(function() {
	var action = "";
	$('.rewardtable td').click(function(){
		$('#myModal').modal();
		action = $(this).attr('action');

	});
	$('#amountcloser').click(function(){
		$('#myModal').modal('hide');	
	});

	$('#amountsubmitter').click(function(){
		var amount = $('#amount').val();
		if(amount && action){
			window.location.href = "index.php?page=4&action=getReward&amount="+amount+'&rewardtype='+action;
		}	
	});
	
});

</script>