
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS</title>
    <meta name="description" content="This is a free Bootstrap landing page theme created for BootstrapZero. Feature video background and one page design." />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
     <link rel="stylesheet" href="<?php echo base_url('cs/bootstrap.min.css');?>" >
     <link rel="stylesheet" href="<?php echo base_url('cs/animate.min.css');?>" >
  	 <link rel="stylesheet" href="<?php echo base_url('cs/ionicons.min.css');?>" >
     <link rel="stylesheet" href="<?php echo base_url('cs/styles.css');?>" >
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <nav id="topNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#first"><i class="ion-ios-analytics-outline"></i> Home</a>
            </div>
            <div class="navbar-collapse collapse" id="bs-navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="page-scroll" href="#one">Post</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="#three">Gallery</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#four">Features</a>
                    </li>
                 
                </ul>
                <ul class="nav navbar-nav navbar-right">
                	<li>
                	 <div class="dropdown" style="margin-top: 20px; margin-right: 80px;">
                      <a style="text-decoration: none; cursor: pointer; color: white" class=" dropdown-toggle" type="button" data-toggle="dropdown"><?php if(!empty($this->session->userdata('id'))){

                      	echo $this->session->userdata('firstname') ." ".  $this->session->userdata('lastname'); 
                        ?>
                           <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <?php $holder = $this->session->userdata('status');
                            if($holder == 0){
                             ?>
                             <li><a class="page-scroll" data-toggle="modal" href="#aboutModal1">Edit Profile</a></li>
                            <li><a href="<?php echo site_url('user/logout');?>">Logout</a></li>
                             <?php   
                            }else{
                                ?>
                                 <li><a class="page-scroll" data-toggle="modal" href="#aboutModal1">Edit Profile</a></li>
                                  <li><a href="<?php echo site_url('user/adminpage');?>">List of Blogs</a></li>
                                  <li><a href="<?php echo site_url('user/index');?>">List of Accounts</a></li>
                                 <li><a href="<?php echo site_url('user/logout');?>">Logout</a></li>
                                <?php
                            }
                            ?>
                             
                            
                            </ul>

                        <?php
                      }

                      ?>


                         
                    </div>
                	</li>
                	
                </ul>
               
            </div>
     

    </nav>
  
    <header id="first">
        <?php if(!empty($this->session->userdata('id'))) {
        ?>
        
				<br><br>
					<center><h2>BLOG</h2></center>
		<form method="post" action="<?php echo site_url('user/insert_blog');?>" enctype="multipart/form-data">
			<div class="form-row" style="margin-left: 500px;">

					
					<div class="form-group col-md-6">
						<label style="margin-right: 410px;">Blog Title</label>
						<label style="color: red"><?php echo form_error('blogtitle'); ?></label>
						<input type="text" class="form-control" placeholder="Blog Title" name="blogtitle" size="20" value="<?php echo set_value('blogtitle');?>" />
						
					<br>
					
						<label style="margin-right: 420px;">Caption</label>
						<label style="color: red"><?php echo form_error('caption'); ?></label>
						<textarea style="height: 200px;" class="form-control" placeholder="write your caption here......" name="caption" size="20" value="<?php echo set_value('caption');?>"   ></textarea>
						<br>
						<input type="file" name="userFile">   
                        <br>
						<button type="submit" name="submit" value="Send" class="btn btn-success" style="margin-right: 400px;border-radius: 2px;">Submit</button>

					
		
				</div>
			</div>	
		</form>	
        <?php	
		}?>
                     

            
    </header>
<center><h1>POST SECTION</h1></center>
    <section class="bg-primary" id="one">
    		
    <?php       
             if($datablog){


                foreach($datablog as $row){
            
             
             ?>
    		 <div class="row">
    		 	
    		
					  <div class="col-lg-4">
					    
					  </div>
					
		 	 
					  <div class="col-lg-4">
					    <div class="thumbnail">
                            <div class="row">
					    	<p class="col-sm-11" style="color: black">Name: <?php echo $row->usersname;?></p>
                            
                        <ul class="col-sm-1">
                        <li>
                         <div class="dropdown" >
                          <a style="text-decoration: none; cursor: pointer; color: white" class=" dropdown-toggle" type="button" data-toggle="dropdown">


                            <span style="color: black" class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo site_url('user/editblogs/'.$row->id); ?>">Edit</a></li>
                              <li><a href="<?php echo site_url('user/deleteblogs/'.$row->id);?>"onclick="return confirm('Do you want to delete this record?')">DELETE</a></li>
                            
                            </ul>

                            </div>
                            </li>
                            
                        </ul>
               
                        
                            </div>
                               
                                     <div class="row no-gutter">
                                         <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="<?php echo base_url('uploads/'.$row->picname);?>">
                                        <img style="height: 300px;" src="<?php echo base_url('uploads/'.$row->picname);?>" class="img-responsive" alt="Image 1">
                                        <div class="gallery-box-caption">
                                            <div class="gallery-box-content">
                                                <div>
                                                    <i class="icon-lg ion-ios-search"></i>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                               
					      <!-- <img src="<?php echo base_url('uploads/'.$row->picname);?>"> -->
					      <div class="caption">
					        <h3>TITLE: <?php echo $row->title;?> </h3>
					        <p>Caption:  <?php echo $row->caption;?></p>
					        <small>Date:  <?php echo $row->date;?></small><br>
                            <small>Date:  <?php echo $row->time;?></small>
				  
					      </div>
					    </div>
					  </div>
        
             
					  <div class="col-lg-4">
					  
					  </div>
					 
			</div>

	 <?php }
                }?>	
   
    </section>

    <section id="three" class="no-padding">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="<?php echo base_url('assets/deer.jpg');?>">
                        <img src="<?php echo base_url('assets/deer.jpg');?>" class="img-responsive" alt="Image 1">
                        <div class="gallery-box-caption">
                            <div class="gallery-box-content">
                                <div>
                                    <i class="icon-lg ion-ios-search"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="<?php echo base_url('assets/beach.jpg');?>">
                        <img src="<?php echo base_url('assets/beach.jpg');?>" class="img-responsive" alt="Image 2">
                        <div class="gallery-box-caption">
                            <div class="gallery-box-content">
                                <div>
                                    <i class="icon-lg ion-ios-search"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="clearfix hidden-lg"> </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="<?php echo base_url('assets/lake.jpg');?>">
                        <img src="<?php echo base_url('assets/lake.jpg');?>" class="img-responsive" alt="Image 3">
                        <div class="gallery-box-caption">
                            <div class="gallery-box-content">
                                <div>
                                    <i class="icon-lg ion-ios-search"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="<?php echo base_url('assets/bike.jpg');?>">
                        <img src="<?php echo base_url('assets/bike.jpg');?>" class="img-responsive" alt="Image 4">
                        <div class="gallery-box-caption">
                            <div class="gallery-box-content">
                                <div>
                                    <i class="icon-lg ion-ios-search"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="clearfix hidden-lg"> </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="<?php echo base_url('assets/city.jpg');?>">
                        <img src="<?php echo base_url('assets/city.jpg');?>" class="img-responsive" alt="Image 5">
                        <div class="gallery-box-caption">
                            <div class="gallery-box-content">
                                <div>
                                    <i class="icon-lg ion-ios-search"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="<?php echo base_url('assets/colors.jpg');?>">
                        <img src="<?php echo base_url('assets/colors.jpg');?>" class="img-responsive" alt="Image 6">
                        <div class="gallery-box-caption">
                            <div class="gallery-box-content">
                                <div>
                                    <i class="icon-lg ion-ios-search"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid" id="four">
       
            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <h2 class="text-center text-primary">Features</h2>
                <hr>
                <div class="media wow fadeInRight">
                    <h3>Simple</h3>
                    <div class="media-body media-middle">
                        <p>What could be easier? Get started fast with this landing page starter theme.</p>
                    </div>
                    <div class="media-right">
                        <i class="icon-lg ion-ios-bolt-outline"></i>
                    </div>
                </div>
                <hr>
                <div class="media wow fadeIn">
                    <h3>Free</h3>
                    <div class="media-left">
                      
                    </div>
                    <div class="media-body media-middle">
                        <p>Yes, please. Grab it for yourself, and make something awesome with this.</p>
                    </div>
                </div>
                <hr>
                <div class="media wow fadeInRight">
                    <h3>Unique</h3>
                    <div class="media-body media-middle">
                        <p>Because you don't want your Bootstrap site, to look like a Bootstrap site.</p>
                    </div>
                    <div class="media-right">
                        <i class="icon-lg ion-ios-snowy"></i>
                    </div>
                </div>
                <hr>
                <div class="media wow fadeIn">
                    <h3>Popular</h3>
                    <div class="media-left">
                        <i class="icon-lg ion-ios-heart-outline"></i>
                    </div>
                    <div class="media-body media-middle">
                        <p>There's good reason why Bootstrap is the most used frontend framework in the world.</p>
                    </div>
                </div>
                <hr>
                <div class="media wow fadeInRight">
                    <h3>Tested</h3>
                    <div class="media-body media-middle">
                        <p>Bootstrap is matured and well-tested. It's a stable codebase that provides consistency.</p>
                    </div>
                    <div class="media-right">
                        <i class="icon-lg ion-ios-flask-outline"></i>
                    </div>
                </div>

            </div>
             

    </section>
    
  <!--   
    <footer id="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6 col-sm-3 column">
                   
                </div>
                <div class="col-xs-6 col-sm-3 column">
                    <h4>Login</h4>
                    <ul class="list-unstyled">
                        <li><a >Contact Us</a></li>
                        <li><a >Delivery Information</a></li>
                        <li><a >Privacy Policy</a></li>
                        <li><a >Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                
                <div class="col-xs-12 col-sm-3 text-right">
                    <h4>Follow</h4>
                    <ul class="list-inline">
                      <li><a rel="nofollow" title="Twitter"><i class="icon-lg ion-social-twitter-outline"></i></a>&nbsp;</li>
                      <li><a rel="nofollow" href="https://web.facebook.com/" title="Facebook"><i class="icon-lg ion-social-facebook-outline"></i></a>&nbsp;</li>
                      <li><a rel="nofollow"  title="Dribble"><i class="icon-lg ion-social-dribbble-outline"></i></a></li>
                    </ul>
                </div>
            </div>
            <br/>
            <span class="pull-right text-muted small"><a href="http://www.bootstrapzero.com">Landing Zero by BootstrapZero</a> ©2015 Company</span>
        </div>
    </footer> -->
    <div id="galleryModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" id="galleryImage" class="img-responsive" />
                <p>
                    <br/>
                    <button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true">Close <i class="ion-android-close"></i></button>
                </p>
            </div>
        </div>
        </div>
    </div>

    <div id="aboutModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">


                <div class="container-fluid" data-spy="scroll" data-target=".navbar" data-offset="50">
                    <div style="margin: 10px;">
                  
                    <center><label style="font-family: Impact; font-size: 30px;" >Sign In</label></center>
                </div>
<div>
             <form name="myForm">   
                    <center>
                    <!-- <form method="post" action="signin.php"> -->
            
                        <div class="input-group" style="margin-bottom: 20px;">
                            <input  type="text" class="form-control" name="username" ng-model="username" placeholder="Username" required>
                      </div>
                        <div class="input-group " style="margin-bottom: 20px;">
                             <input  type="password" class="form-control" name="password"placeholder="password" >
                      </div>
                        <br>
                      <button type="submit" class="btn btn-info" style="width: 120px" value="login">Submit</button>

                  <!--   </form> -->
                </center>
         </form>
</div>
                </div>
            </div>
        </div>
        </div>
    </div>

       <div class="modal fade" id="aboutModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style=" background-color: black;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" ><font color="white" size="5">REGISTRATIOM FORM</font></h4>
        </div>
        <div class="modal-body">
         <h4>Personal Infromation</h4>

<div>

         <!-- <form method="POST" action="sig

            nup.php" enctype="multipart/form-data"> -->
       <form action="<?php echo site_url('user/updateusers'); ?>" method="post" class="form-horizontal">
            <input type="hidden" style="height: 10px; width: 5px;" name="text_hidden" value="<?php echo $this->session->userdata('id'); ?>">
         <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">Fist Name</label>
                                    <input type="text" class="form-control" style="width: 250px;"  placeholder="First Name" name="firstname" value="<?php echo $this->session->userdata('firstname'); ?>">
                                    
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="lastname">Last Name</label>
                                  <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $this->session->userdata('lastname'); ?>" >
                                </div>
                               
         </div>
      
    <!--       <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="middlename">Middle Name</label>
                                    <input type="text" class="form-control" id="middlename" placeholder="Middle Name" >`
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="gender">Gender</label>
                              
                                    <select id="gender" class="form-control">
                                       
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                               
         </div>
          <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="contact">Contact</label>
                                    <input type="text" class="form-control" id="contact" placeholder="Contact Number" >
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="address">Address</label>
                                  <input type="text" class="form-control" id="address" placeholder="Address" >
                                </div>
                               
         </div>
         <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="eaddress">Email Address</label>
                                    <input type="email" class="form-control" id="eaddress" placeholder="Email" >
                                </div>
                                
                               
         </div> -->
         <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="user">UserName</label>
                                    <input type="text" class="form-control" id="user" placeholder="UserName" name="username"  value="<?php echo $this->session->userdata('username'); ?>" >
                               </div>
                                <div class="form-group col-md-6">
                                 <!--  <label for="pass">PassWord</label>
                                  <input type="password" class="form-control" id="pass" placeholder=" Please type your pasPassword" > -->
                                </div>
                           
                               
         </div>



        <button type="submit" class="btn btn-info" value="save" style="margin-left: 20px;" >Update</button>
           </form>
</div>

</div>



      </div>
 
    </div>

  </div>


<!-- EDIT  -->
 <div class="modal fade" id="Edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style=" background-color: black;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" ><font color="white" size="5">REGISTRATIOM FORM</font></h4>
        </div>
        <div class="modal-body">
         <h4>Personal Infromation</h4>

<div ng-controller="editController">

        <div class="header-content">
         <!-- <form method="POST" action="sig

            nup.php" enctype="multipart/form-data"> -->
        <form name="myForm">


         <div class="form-row">
        
                                <div class="form-group col-md-6">
                                    <label for="firstname">Fist Name</label>      
                                    <input type="text" class="form-control"   placeholder="First Name" name="fname">
                                    
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="lastname">Last Name</label>
                                    </span>
                                  <input type="text" class="form-control" placeholder="Last Name" name="lname">
                                </div>
                               
         </div>
      
          <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="middlename">Middle Name</label>
                                    <input type="text" class="form-control"  placeholder="Middle Name">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="gender">Gender</label>
                              
                                    <select class="form-control">
                                       
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                               
         </div>
          <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="contact">Contact</label>
                                    <input type="text" class="form-control"  placeholder="Contact Number" >
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="address">Address</label>
                                  <input type="text" class="form-control" placeholder="Address">
                                </div>
                               
         </div>
         <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="eaddress">Email Address</label>
                                    <input type="email" class="form-control"  placeholder="Email">
                                </div>
                                
                               
         </div>
         <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="user">UserName</label>
                                    <input type="text" class="form-control"  placeholder="UserName">
                               </div>
                                <div class="form-group col-md-4">
                                  <label for="pass">PassWord</label>
                                  <input type="password" class="form-control" placeholder="Password">
                                </div>
                                 <div class="form-group col-md-4">
                                  <label for="conpassword">Confirm Password</label>
                                  <input type="password" class="form-control" placeholder="Confirmpassword">
                                </div>
                               
         </div>



        <button type="submit" class="btn btn-info" style="margin-left: 20px;">Update</button>
            
           </form>


</div>



      </div>
 
    </div>

    </div>
  </div>





    <div id="alertModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="text-center">Nice Job!</h2>
                <p class="text-center">You clicked the button, but it doesn't actually go anywhere because this is only a demo.</p>
                <p class="text-center"><a href="http://www.bootstrapzero.com">Learn more at BootstrapZero</a></p>
                <br/>
                <button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true">OK <i class="ion-android-close"></i></button>
            </div>
        </div>

        </div>
    </div>

 		 <script src="<?php echo base_url('j/jquery.min.js')?>"></script> 
		<script src="<?php echo base_url('j/bootstrap.min.js')?>"></script>
		<script src="<?php echo base_url('j/jquery.easing.min.js')?>"></script>
		<script src="<?php echo base_url('j/wow.js')?>"></script>
		<script src="<?php echo base_url('j/scripts.js')?>"></script>
   
   
 
   <!--  <script src="js/angular.min.js" ></script> -->
    <script type="text/javascript">

 