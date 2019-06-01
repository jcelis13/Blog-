<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
      <!--   <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     	 -->
        <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="<?php echo base_url('css/assets/css/bootstrap.min.css');?>">
       <script  type="text/javascript" src="<?php echo base_url('js/assets/js/jquery.js')?>"></script> 
     
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
		<a href="<?php echo site_url('user/main');?>" class="btn btn-primary">Back</a>
		<!-- <a href="<?php echo site_url('user/insert_users');?>" class="btn btn-primary" >ADD RECORD</a> -->
		<table class="table table-bordered table-responsive" style="margin-top: 20px;">
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
			<tbody id="showdata">
				
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>	
					<a href="" class="btn btn-info">View Blog</a>
					<a href="" class="btn btn-primary">Approved Blog</a>
					
						
					</td>
				</tr>
				
			</tbody>
			
		</table>
	</div>
<script src="<?php echo base_url('js/assets/js/bootstrap.min.js')?>"></script>
    
<script type="text/javascript">
	
		$(function(){

				showAllBlogs();
				function showAllBlogs(){
				$.ajax({
					type: 'GET',
					url: '<?php echo site_url('ajax/blogs/showAllBlogs');?>',
					async: false,
					dataType: 'json',
					success: function(data){
						var html = '';
						var i;
						for(i=0; i<data.length; i++){
							html += '<tr>'+
										'<td>'+data[i].id+'</td>'+
										'<td>'+data[i].usersname+'</td>'+
										'<td>'+data[i].title+'</td>'+
										'<td>'+data[i].caption+'</td>'+
										'<td>'+data[i].status+'</td>'+
										'<td>'+	
										'<a href="" class="btn btn-info">View Blog</a>'+
										'<a href="" class="btn btn-primary">Approved Blog</a>'+
										
											
										'</td>';	
						}
						$('#showdata').html(html);
					},
					error: function(){
						alert('Could not get data from database');
					}
				});


			}

		});


</script>


 	</body>
</html>