<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Sign</b>Up</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="" method="post" id="myForm">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="name" placeholder="Full name" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="conpass" id="confirm_password" placeholder="Retype password" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-12">
      <span id='message'></span>
          <button type="submit" id="reg" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
</br>
    <a href="<?php echo site_url('Login/index');?>" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
 <div id="download_modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" id="dialog-download">
          <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Registration</h4>
                   
           </div>
            <h5 style="color:green;" align="center">You are Successfully Registered! Please login to access your Profile!</h5>
           
            <div class="modal-footer">
    <a href="<?php echo site_url('Login/index');?>" class="text-center">Login Here</a>
              <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Login</button>     
                -->   
                 </div>
        </div>
     </div>
</div>  
<!-- /.register-box -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- jQuery 2.2.3 -->
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>

<script type="text/javascript">
$("#reg").on('click', function (e) {
  e.preventDefault();
var password = $('#password').val();
var conpass = $('#confirm_password').val();
if(password == conpass)
{
 $.ajax({
type:"POST",
url: "<?php echo site_url('Register/add_new');?>",
data:$("#myForm").serialize(),
success: function (dataCheck) {
  $("#download_modal").modal("show");
            $('#myForm')[0].reset();
                       $('input[type="text"]', this).val('');
                     },
                     ,
        error: function(){
            alert('error');
        }
});
}
else{
  alert("Password doesn't matches");
}
});
</script>
</body>
</html>
