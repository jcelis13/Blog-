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
		<h3>Blog Details</h3>
		
		<a href="<?php echo site_url('user/main');?>" class="btn btn-primary">Back</a>
		<form action="<?php echo site_url('user/updateblogs'); ?>" method="post" class="form-horizontal">
			<input type="hidden" name="text_hidden" value="<?php echo $data->id; ?>">
			<div class="form-row" style="margin-left: 500px;">

					
					<div class="form-group col-md-8">
						<label style="margin-right: 410px;">Author</label>
						<input type="text" class="form-control"name="author" size="20" value="<?php echo $data->usersname;?>" disabled/>
						<br>
						 <img src="<?php echo base_url('uploads/'.$data->picname);?>">
						 <br>
						<br>
						<label style="margin-right: 410px;">Title</label>
						<input type="text" class="form-control"name="blogtitle" size="20" value="<?php echo $data->title;?>"/>
						
					<br>
					
						<label style="margin-right: 420px;">Caption</label>
						<input type="text" style="height: 100px; " class="form-control" name="caption" size="20" value="<?php echo $data->caption;?>"/>
						<br>
						
						<input type="submit" name="btnsave" class="btn btn-primary" value="Update">
						
					</div>
			</div>	
		</form>
	</div>

 </body>

</html>