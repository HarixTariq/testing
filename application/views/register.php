<?php $this->load->view('header.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Register</title>
</head>
<body  class = "register_body">
    <div class="container"><br>
        <h1 class="reg" align= "center";> Registration </h1> <br>
        <div class="panel panel-default">
            <div class="panel-heading">Register</div>
            <div class="panel-body">
                <form method="post" action="<?php echo site_url('Userregistration/validationRegistration') ;?>">
                    <div class="form-group">
                        <label>Enter Your Name</label>
                        <input type="text" name="user_name" class="form-control" value="<?php echo set_value('user_name'); ?>"/>
                        <span class="text-danger"><?php echo form_error('user_name'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Enter Your Valid Email Address</label>
                        <input type="email" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>"/>
                        <span class="text-danger"><?php echo form_error('user_email'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Enter Your Valid Password</label>
                        <input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>"/>
                        <span class="text-danger"><?php echo form_error('user_password'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="register" value="Register" class="btn btn-info" />
                        <div style="float:right">
                            <span>Already have a account?</span>
                            <a href="<?php echo site_url('Userregistration'); ?>">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php $this->load->view('footer.php'); ?>
