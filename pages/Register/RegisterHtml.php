<div id='loginform'>
    <h1>Register</h1>
    <form action='index.php?page=1000&action=register' method='post'>
        <label for='username'>Username</label>
        <input type='text' id='username' name='username' value='<?php echo $this->request->getParameter('username');?>'/>
        		
        <label for='email'>Email</label>
        <input type='email' id='email' name='email' value='<?php echo $this->request->getParameter('email');?>'/>
        		
        <label for='password'>Password</label>
        <input type='password' id='password' name='password' value='<?php echo $this->request->getParameter('password');?>'/>
        		
        <label for='password'>once more</label>
        <input type='password' id='password2' name='password2' value='<?php echo $this->request->getParameter('password2');?>'/>
        		
        <?php if ($this->request->getParameter('ismanager')==true)
        		{
        			$checked = "checked";
        		}
    		?>
        <label for='ismanager'>Manager</label>
        <input type='checkbox' value='true' name='ismanager' <?php echo $checked; ?>/><br /><br />
        		
        		
        <input type='submit' value='Register' class='btn btn-inverse'/>
    		
    </form>
		
</div>