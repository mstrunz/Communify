<div class="span1 tools">
<a href="index.php?page=1" class='btn btn-large btn-inverse'><i class="icon-arrow-left icon-white"></i></a>
</div>
<div class="span11">
<h1>Add Suggestion</h1>

<form action="index.php?page=1&sub=addSuggestion&action=addNewSuggestion" method="post">
<label for="duedate">My Suggestion</label>
<textarea rows="10" style="width:500px;" name="suggestion"></textarea>
<br />
<input type='submit' value='Add Suggestion' class='btn btn-inverse'/>
<input type="hidden" value="<?php echo $this->getRequest()->getParameter('taskid');?>" name="taskid"/>
</form>
</div>
