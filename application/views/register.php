<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Complete User Registration and login System in COdeignitor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
</head>
<body>
    <div class="container"><br>
        <h3 align="center"> Complete User Registration and login System in COdeignitor </h3> <br>
        <div class="panel panel-default">
            <div class="panel-heading">Register</div>
            <div class="panel-body">
                <form method="post" action="<?php echo site_url('register/validation') ;?>">
                    <div class="form-group">
                        <label>Enter Your Name</label>
                        <input type="text" name="user_name" class="form-control" value="<?php echo set_value('user_name'); ?>"/>
                        <!-- <span class="text-danger"><?php echo form_error('user_name'); ?>Enter your name here </span> -->
                    </div>
                    <div class="form-group">
                        <label>Enter Your Valid Email Address</label>
                        <input required type="email" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>"/>
                        <!-- <span class="text-danger"><?php echo form_error('user_email'); ?>Please enter your email</span> -->
                    </div>
                    <div class="form-group">
                        <label>Enter Your Valid Password</label>
                        <input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>"/>
                        <!-- <span class="text-danger"><?php echo form_error('user_password'); ?>Password Required !</span> -->
                    </div>
                    <div class="form-group">
                        <input type="submit" name="register" value="Register" class="btn btn-info" />
                    </div>
                </form>

            </div>

        </div>
    </div>

</body>
</html>
