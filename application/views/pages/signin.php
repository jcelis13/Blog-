

<div class="bg"></div>
<form class="form-signin" method="post" action="<?php echo site_url('user/login');?>">
  <center>

  <img class="mb-4" src="<?php echo base_url('images/signup.png');?>" width="145" height="145">
    
          <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

      <div class="input-group mb-2">
       <div class="input-group-prepend">
          <div class="input-group-text" style="height: 48px;">
             <span class="input-group-addon"><img src="<?php echo base_url('images/user.png');?>" style="width: 20px; height: 20px"></span>
         </div>

      </div>
     
        <input type="text" name="username" class="form-control" placeholder="username" value="<?php echo set_value('username');?>" autofocus="" style="height: 48px;">
      
     
    </div>
      <label style="color: red"><?php echo form_error('username'); ?></label>
   
 
  <div class="input-group">
       <div class="input-group-prepend">
          <div class="input-group-text" style="height: 46px;">
             <span class="input-group-addon"><img src="<?php echo base_url('images/password.png');?>" style="width: 20px; height: 20px"></span>
         </div>
      </div>
         <input type="password" name="password" class="form-control" placeholder="password" value="<?php echo set_value('password');?>">
        
        
    </div>
     <label style="color: red"><?php echo form_error('password'); ?></label>
     
 
 
 
    <label>
     <a href="<?php echo site_url('user/registration');?>">Register First</a>
    </label>
  
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <?php
  echo '<label class="text-danger">'.$this->session->flashdata("error");

  ?>

  <p class="mt-5 mb-3 text-muted">© 2017-2019</p>
</form>
</center>
