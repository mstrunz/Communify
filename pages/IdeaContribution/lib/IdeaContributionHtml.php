<div class="span1 tools">
<a href="index.php?page=2&sub=addTopic&action=addTopic" class='btn btn-large btn-inverse toolbar'  data-toggle="tooltip" title="Add Topic" data-placement="right"><i class="icon-plus icon-white"></i></a>
</div>
<div class="span11">
<h1>Idea Contribution</h1>

<div id="myCarousel" class="carousel slide">
  <ol class="carousel-indicators">
    <?php $i=0;
    	if (is_array($this->topics))
  		foreach ($this->topics as $topic):?>
	    <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" <?php echo ($i==0)?"class='active'":"";?>></li>
  	<?php $i++; endforeach;?>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
  <?php $i=0;
  		if (is_array($this->topics))
  		foreach ($this->topics as $topic):?>
		    <div class="item <?php echo ($i==0)?" active":"";?>">
			    <div class='ideatopicslider'>
				    <table class='ideatopictable'>
					    <tr>
					    	<td><h4 class='ideatopicname'><?php echo $topic->getName();?></h4></td>
					    	<td style='text-align: right;'><h4 class='ideatopiccreator'>By <?php echo $topic->getCreatedBy()->getUsername();?></h4></td>
						</tr>
						<tr>    
				    		<td><h5>Description</h5></td>
				    		<td style='text-align: right;'><a href='index.php?page=2&sub=addContribution&action=addContribution&topicId=<?php echo $topic->getId();?>' class='btn btn-inverse'>Contribute to get <?php echo $topic->getCoins();?><img alt='img/ccs.gif' src='img/ccs.gif'></a></td>
			    		</tr>
			    		<tr>
			    			<td colspan='2'>
					    		<div class='ideatopicdescription'><?php echo $topic->getDescription();?></div>
				    		</td>
			    		</tr>
				    </table>
				    <h3>Contributions</h3>
				    <br><br>
				    
				    <?php $contributions = $topic->getIdeaContributions();
				    if (is_array($contributions)):?>
				    
				    <?php foreach ($contributions as $contribution):?>
				    <table class='ideatopictable'>
				    <tr>
				    	<td><i class='icon-user'></i> <?php echo $contribution->getCreatedBy()->getUsername();?></td>
				    	<td style='text-align: right;'> <i class='icon-calendar'></i> <?php echo $contribution->getCreationDate();?></td>
				    </tr>
				    <tr>
				    	<td colspan="2"><b><?php echo $contribution->getName();?></b></td>
				    </tr>
				    <tr>
				    	<td colspan="2">
				    	<?php echo $contribution->getDescription();?>
				    	</td>
				    </tr>
				    </table>
				    <?php endforeach;?>
				    <?php endif;?>
				    
		    	</div>
		    </div>
  <?php $i++; endforeach;?>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
</div>


<script type="text/javascript">

$(function() {
	$('.toolbar').tooltip()	;
	$('.carousel').carousel({
		  interval: false
		});

	
});

</script>
