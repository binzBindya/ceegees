<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Forgot Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css');?>">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Enter your email</p>

    <form action="" method="post" id="myForm">
      <?php foreach($result as $data){ 
                        ?>
      <div class="form-group has-feedback">
         <input type="hidden" name='id' value='<?php echo $data->id;?>'>
        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $data->username;?>" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
     <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="con_password" id="confirm_password" placeholder="Confirm Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row" >
       <div class="col-xs-3" ></div>
        <!-- /.col -->
        <div class="col-xs-6" >
          <button type="submit" id="reg" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
       
      </div>
      <?php } ?>
    </form>

   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

 <div id="download_modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" id="dialog-download">
          <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Message</h4>
                   
           </div>
            <h5 style="color:green;" align="center">Your Password has been changed! Please login to access your Profile!</h5>
           
            <div class="modal-footer">
    <a href="<?php echo site_url('Login/index');?>" class="text-center">Login Here</a>
              <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Login</button>     
                -->   
                 </div>
        </div>
     </div>
</div>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>

<script type="text/javascript">
$("#reg").on('click', function (e) {
  e.preventDefault();
var password = $('#password').val();
var conpass = $('#confirm_password').val();
// alert(password);
// alert(conpass);
if(password == conpass)
{
 $.ajax({
type:"POST",
url: "<?php echo site_url('Register/new_password1');?>",
data:$("#myForm").serialize(),
success: function (dataCheck) {
  $("#download_modal").modal("show");
    $('#myForm')[0].reset();
  $('input[type="text"]', this).val('');
},
});
}
else{
  alert("Password doesn't matches");
}
});
</script>
</body>
</html>
