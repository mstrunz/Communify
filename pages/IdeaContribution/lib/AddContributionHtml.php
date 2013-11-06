<div class="span1 tools">
<a href="index.php?page=2" class='btn btn-large btn-inverse'><i class="icon-arrow-left icon-white"></i></a>
</div>
<div class="span11">
<h1>Contribute</h1>

<form action="index.php?page=2&sub=AddContribution&action=addnewContribution" method="post">

<label for="name">Contribution Name</label>
<input type="text" name="name" id="name" />

<label for="description">Your Contribution</label>
<textarea rows="10" cols="10" class='input-xxlarge' name="contribution" id="contribution" ></textarea>

<br />
<input type="hidden" name="topicid" value="<?php echo Core::getGetParameter("topicId");?>" />
<input type='submit' value='Contribute' class='btn btn-inverse'/>
</form>
</div>