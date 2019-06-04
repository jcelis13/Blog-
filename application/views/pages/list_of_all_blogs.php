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
		<div class="alert alert-success" style="display: none;">
			

		</div>
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
					<a style="margin-left: 10px;" href="" class="btn btn-info">View Blog</a>
					<a href="" class="btn btn-primary">Approved Blog</a>
					
						
					</td>
				</tr>
				
			</tbody>
			
		</table>
	</div>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Blog Info</h4>
      </div>
      <div class="modal-body">
           <form id="myForm" action="" method="post" class="form-horizontal">
       		<input type="hidden" name="txtid" value="0">
       			<div class="form-group">
       				<label class="label-control col-md-2">Author</label>
       				<div class="col-md-10">
       					<input type="text" name="Author" class="form-control" disabled>
       				</div>
       			</div>
       			<div class="form-group">
       				<label class="label-control col-md-2">Title</label>
       				<div class="col-md-10">
       					<input type="text" name="Title" class="form-control">
       				</div>
       			</div>
       			<div class="form-group">
       				<label class="label-control col-md-2">Caption</label>
       				<div class="col-md-10">
       					<textarea style="height: 100px;" class="form-control" name="Caption" size="20" ></textarea>
       				</div>
       			</div>
       			
       		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="btnupdate" type="button" class="btn btn-primary">Update</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
         	Do you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="btndelete" type="button" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?php echo base_url('js/assets/js/bootstrap.min.js')?>"></script>
    
<script type="text/javascript">
	
		$(function(){

				showAllBlogs();

				//update
				$('#btnupdate').click(function(){
					var url = $('#myForm').attr('action');
					var data = $('#myForm').serialize();

					$.ajax({
						type: 'ajax',
						method: 'post',
						url : url,
						data : data,
						dataType : 'json',
						success: function(response){
							 if(response.success){
							 	$('#myModal').modal('hide');
							 	$('#myForm')[0].reset();
							 	$('.alert-success').html('Updated Successfully').fadeIn().delay(3000).fadeOut('slow');

							 	showAllBlogs();
							 }else{
							 	alert('error');
							 }
						},
						error: function(){
							alert('Could not update data');
						}
					});

				});

				function showAllBlogs(){
				$.ajax({
					type: 'GET',
					url: '<?php echo site_url('ajax/blogs/getdata');?>',
					dataType: 'json',
					success: function(data){
						var html = '';
						var i;
						for(i=0; i<data.length; i++){
							if(data[i].poststatus == '1'){
								html += '<tr>'+
										'<td>'+data[i].id+'</td>'+
										'<td>'+data[i].usersname+'</td>'+
										'<td>'+data[i].title+'</td>'+
										'<td>'+data[i].caption+'</td>'+	
										'<td>'+'Approved'+'</td>'+
										'<td>'+	
										'<a style="margin-right: 5px;" href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'" >EDIT</a>'+
										'<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'">DELETE</a>'+
										'</td>';	
							}else{
								html += '<tr>'+
										'<td>'+data[i].id+'</td>'+
										'<td>'+data[i].usersname+'</td>'+
										'<td>'+data[i].title+'</td>'+
										'<td>'+data[i].caption+'</td>'+	
										'<td>'+'Pending'+'</td>'+
										'<td>'+	
										'<a style="margin-right: 5px;" href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'" >EDIT</a>'+
										'<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'">DELETE</a>'+
										'</td>';	
							}
							
						}
						$('#showdata').html(html);
					},
					error: function(){
						alert('Could not get data from database');
					}
				});
				//delete
				$('#showdata').on('click', '.item-delete', function(){
					var id = $(this).attr('data');
					$('#deleteModal').modal('show');
					$('#btndelete').unbind().click(function(){
						$.ajax({

							type: 'GET',
							url: '<?php echo site_url('ajax/blogs/deleteblogs');?>',
							data:{id: id},
							dataType: 'json',
							success: function(response){
							 if(response.success){
							 	$('#deleteModal').modal('hide');
							 	$('.alert-success').html('Updated Successfully').fadeIn().delay(3000).fadeOut('slow');
					 			showAllBlogs();
							 }else{
							 	alert('error');
							 }
						},
							error: function(){
								alert('Error');
							}

						});

						
					});
				});

					//edit
			$('#showdata').on('click', '.item-edit', function(){
				var id = $(this).attr('data');
				$('#myModal').modal('show');
				$('#myModal').find('.modal-title').text('Blog Info');
				$('#myForm').attr('action', '<?php echo site_url('ajax/blogs/updateblogs'); ?>');
				$.ajax({
					type: 'ajax',
					method: 'get',
					url: '<?php echo site_url('ajax/blogs/editblog');?>',
					data:{id: id},
					dataType: 'json',
					success: function(data){
						$('input[name=Author]').val(data.usersname);
						$('input[name=Title]').val(data.title);
						$('textarea[name=Caption]').val(data.caption);		
						$('input[name=txtid]').val(data.id);			
					},
					error: function(data){
						alert('Could not edit data');
					}
				});

				

			});

			}
		

		});


</script>


 	</body>
</html>