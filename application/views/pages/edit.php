<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
      <!--   <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     	 -->
        <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="<?php echo base_url('css/assets/css/bootstrap.min.css');?>" >
     
        <title>Blog</title>
    </head>
    <body>
	<div class="navbar navbar-default">
		<div class="container">
			<h2><span class="glyphicon glyphicon-home"></span>&nbsp;WELCOME TO MY BLOG</h2>
		</div>
	</div>
	<div class="container">
		<h3>Edit users</h3>
		<a href="<?php echo site_url('user/index');?>" class="btn btn-primary">Back</a>
		<form action="<?php echo site_url('user/update'); ?>" method="post" class="form-horizontal">
			<input type="hidden" name="text_hidden" value="<?php echo $data->id; ?>">
			<div class="form-group">
				<label for="firstname" class="col-md-2 text-right">First Name</label>
				<div class="col-md-10">
					<input type="text" name="firstname" class="form-control" placeholder="firstname" value="<?php echo $data->firstname;?>"> 
					<label style="color: red"><?php echo form_error('firstname'); ?></label>
				</div>
				
			</div>
			<div class="form-group">
				<label for="lastname" class="col-md-2 text-right">Last Name</label>
				<div class="col-md-10">
					<input type="text" name="lastname" class="form-control" placeholder="lastname" value="<?php echo $data->lastname;?>">
					<label style="color: red"><?php echo form_error('lastname'); ?></label>
				</div>
			</div>
			<div class="form-group">
				<label for="username" class="col-md-2 text-right">User Name</label>
				<div class="col-md-10">
					
					<input type="text" name="username" class="form-control" placeholder="UserName"value="<?php echo $data->username;?>" >
					<label style="color: red"><?php echo form_error('username'); ?></label>
				</div>
			</div>
		<!-- 	<div class="form-group">
				<label for="username" class="col-md-2 text-right">Password</label>
				<div class="col-md-3">
					
					<input type="password" name="password" class="form-control" >
					<label style="color: red"><?php echo form_error('password'); ?></label>
				</div>
			
				
				<label for="username" class="col-md-2 text-right">Confirm Password</label>
				<div class="col-md-3">
					
					<input type="password" name="confirmpassword" class="form-control">
					<label style="color: red"><?php echo form_error('confirmpassword'); ?></label>
				</div>
			</div> -->
			<div class="form-group">
				<label class="col-md-2 text-right"></label>
				<div class="col-md-10">
					<input type="submit" name="btnsave" class="btn btn-primary" value="Update">
				</div>
			</div>
			
		</form>
	</div>

 </body>

</html>