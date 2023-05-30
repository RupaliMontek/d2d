<div class="container-fluid forLoginScreenn">
   <div class="forLogoScreen">
      <img src="<?php echo base_url(); ?>frontend/images/logo.png" width="200" height="86">
    </div>


  
      <div class="forLoginForm">
      <form class="form-horizontal" action="<?php echo base_url();?>login/check_login" method="POST" id="login_form" name="login_form">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
     <input name="email" id="email" type="email" class="form-control" placeholder="Enter Password">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>

     <input  name="password" id="password" type="password" class="form-control" placeholder="Enter Password">

  <button type="submit" class="btn btn-primary">Log in</button>
</form>
</div>
</div>
