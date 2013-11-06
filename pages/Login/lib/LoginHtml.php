<div id='loginform'>
	<h1>Login</h1>
	<form action='index.php?page=1002&action=login' method='post'>
		<label for='username'>Username</label>
		<input type='text' id='username' name='username' value='<?php echo $this->getRequest()->getParameter('username');?>'/>
				
		<label for='password'>Password</label>
		<input type='password' id='password' name='password' value='<?php echo $this->getRequest()->getParameter('password');?>'/><br />
				
		<input type='submit' value='Login' class='btn btn-inverse'/>
			
	</form>
	OR<br /><br />
	<a href='index.php?page=1002&sub=register' class='btn btn-inverse'>Register</a>
</div>