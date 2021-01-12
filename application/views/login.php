<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <br>
            <h3 align="center">Complete User Registration and login System in COdeignitor</h3>
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form method="post" action="<?php echo site_url('login/validation') ;?>" >
                        <div class="form-group">
                            <label>Enter Email Address</label>
                            <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" />
                        </div>
                        <div class="form-group">
                            <label>Enter Passwrod</label>
                            <input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" value="Login" class="btn btn-info">
                        </div>
                        <a href="<?php echo base_url(); ?>register">Register</a>
                    </form>


                </div>

            </div>
        </div>
    </body>
</html>
