<br><div class="container">
		<form method="post" action="<?php site_url('user/registration');?>">
				<center><h2>REGISTRATION</h2></center>
				<br>
			
				<br>
				<div class="form-row">

					
					<div class="form-group col-md-6">
						<label>Firt Name</label>
						<label style="color: red"><?php echo form_error('firstname'); ?></label>
						<input type="text" class="form-control" placeholder="firstname" name="firstname" size="20" value="<?php echo set_value('firstname');?>" />
						
					</div>
					<div class="form-group col-md-6">
						<label>Last Name</label>
						<label style="color: red"><?php echo form_error('lastname'); ?></label>
						<input type="text" class="form-control" placeholder="Lastname" name="lastname" size="20" value="<?php echo set_value('lastname');?>"   />
							
					</div>
		
				</div>
				 <div class="form-group">
					    <label>User Name</label>
					   <label style="color: red"><?php echo form_error('username'); ?></label>
					    <input type="text" class="form-control" name="username" placeholder="UserName" value="<?php echo set_value('username');?>" > 
			  	</div>
			  	<div class="form-row">
				  	<div class="form-group col-md-6">
				  		<label>Password</label>
				  		<label style="color: red"><?php echo form_error('password'); ?></label>
				  		<input type="password" class="form-control" placeholder="password" name="password" size="20" value="<?php echo set_value('password');?>" />

				  	</div>
				  	<div class="form-group col-md-6">
				  		<label>Confirm Password</label>
				  		<label style="color: red"><?php echo form_error('confirmpassword'); ?></label>
				  		<input type="password" class="form-control" placeholder="confirmpassword" name="confirmpassword" size="20" value="<?php echo set_value('confirmpassword');?>" />				  		
				  	</div>
			  	</div>
			  
			  	<button type="submit" name="submit" value="Send" class="btn btn-success">Success</button>
			  		
		</form>
	

</div>



