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
			<h2><span class="glyphicon glyphicon-home"></span>&nbsp;ADMIN SECTION</h2>
		</div>
	</div>
	<div class="container">
		<h3>List of blogs</h3>

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
		<!-- <a href="<?php echo site_url('user/insert_users');?>" class="btn btn-primary" >ADD RECORD</a> -->
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<td>ID</td>
					<td>Author</td>
					<td>Title</td>
					<td>Content</td>
					<td>Status</td>
					<td>Action</td>

					

				</tr>
			</thead>
			<tbody>
				<?php 

					if($datablog){
						foreach ($datablog as $blogdata) {
							# code...
					

				 ?>
				<tr>
					<td><?php echo $blogdata->id;?></td>
					<td><?php echo $blogdata->usersname; ?></td>
					<td><?php echo $blogdata->title;?></td>
					<td><?php echo $blogdata->caption; ?></td>
					<?php if($blogdata->poststatus == 1){
					?>
					<td>Approved</td>
					<?php
					}else{
					?>
					<td>Pending</td>
					<?php
					}?>
					<td>
						
					<?php if($blogdata->poststatus == 1){
					?>
					<a href="" class="btn btn-info">View Blog</a>
					
					<?php
					}else{
					?>
					<a href="" class="btn btn-info">View Blog</a>
					<a href="<?php echo site_url('user/updatestatus/'.$blogdata->id); ?>" class="btn btn-primary">Approved Blog</a>
					<?php	
					}?>
						
					</td>
				</tr>
				<?php 	}
					} ?>
			</tbody>
			
		</table>
	</div>
<script src="<?php echo base_url('js/assets/bootstrap.min.js')?>"></script>
 	</body>
</html>