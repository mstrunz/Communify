<div class="modal hide fade" id='awardModal'>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3><?php echo $message;?></h3>
  </div>
  <div class="modal-body">
  <img alt="pokal" src="img/pokal.jpg" style='height:150px;'>
    <p><?php echo $message;?></p>
  </div>
  <div class="modal-footer">
  </div>
</div>

<script type="text/javascript">

$(function() {
	$('#awardModal').modal();
});
</script>