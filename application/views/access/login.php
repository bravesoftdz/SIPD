<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url();?>"><b>Admin</b> SIPD</a>
  </div><!-- /.login-logo -->
  
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <?php 
        echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
        echo form_open('access/validate'); 
    ?>
      <div class="form-group has-feedback">
          <input type="text" name="usermail" 
                 class="form-control" placeholder="Email" autofocus="" value="<?php echo set_value('usermail'); ?>"/>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" name="userpass" 
                 class="form-control" placeholder="Password" value="<?php echo set_value('userpass'); ?>"/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">      
          <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div><!-- /.col -->
      </div>
    <?php echo form_close();?>
    
    <a href="#">I forgot my password</a><br>
    <div class="social-auth-links text-center">
      <p>AdminSIPD &copy; 2015
          <br>
         Versi 1.0.0 
      </p>
    </div><!-- /.social-auth-links -->
  </div><!-- /.login-box-body -->
  
</div><!-- /.login-box -->