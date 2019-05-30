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
		<h3>List of users account</h3>

		<?php

			if($this->session->flashdata('success_msg')){
		?>
			<div class="alert alert-success">
				
				<?php echo $this->session->flashdata('success_msg'); ?>
				
			</div>
		<?php
			}

		?>
			<?php

			if($this->session->flashdata('error_msg')){
		?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata('error_msg'); ?>
				
			</div>
		<?php
			}

		?>
		<a href="<?php echo site_url('user/main');?>" class="btn btn-primary">Back</a>
		

		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<td>ID</td>
					<td>First Name</td>
					<td>Last Name</td>
					<td>UserName</td>
					<td>Action</td>

				</tr>
			</thead>
			<tbody>
				<?php

				if($data){
					foreach($data as $usersdata){

				?>
				<tr>
					<td><?php echo $usersdata->id;?></td>
					<td><?php echo $usersdata->firstname;?></td>
					<td><?php echo $usersdata->lastname;?></td>
					<td><?php echo $usersdata->username;?></td>
					<td>
						<a href="<?php echo site_url('user/edit/'.$usersdata->id); ?>" class="btn btn-info">EDIT</a>

						<a href="<?php echo site_url('user/delete/'.$usersdata->id);?>" onclick="return confirm('Do you want to delete this record?')" class="btn btn-danger">DELETE</a>
					</td>
				</tr>
				<?php

					}
				}

				?>
			</tbody>
			
		</table>
	</div>
<script src="<?php echo base_url('js/assets/bootstrap.min.js')?>"></script>
 	</body>
</html>