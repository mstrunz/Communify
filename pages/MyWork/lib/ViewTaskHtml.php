<div class="span1 tools">
<a href="index.php?page=1" class='btn btn-large btn-inverse'><i class="icon-arrow-left icon-white"></i></a>
</div>
<div class="span11">
<h1>View Task</h1>
<h4><?php echo $this->task->getName();?></h4>
<br><br>
<h4>Desciption:</h4>
<p><?php echo $this->task->getDescription()?></p>

</div>