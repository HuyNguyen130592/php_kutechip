<?php include("session.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php include("head.php"); ?>
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="javascript:void(0)"><b>LOGIN</b> ADMIN</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="http://localhost:8080/www/web_1/admin/login_session.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Account" name="username"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div style="color: red; font-size: 15px;">
                    <center>
                    <?php
                        
                        if(isset($_SESSION['login']['msg'])){
                            echo $_SESSION['login']['msg'];
                            unset($_SESSION['login']['msg']);
                        }
                    ?>
                    </center>
            </div>                      
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        

        <a href="#">I forgot my password</a><br>
        

      </div><!-- /.login-box-body -->
      
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="http://localhost:8080/www/web_1/admin/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="http://localhost:8080/www/web_1/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="http://localhost:8080/www/web_1/admin/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>