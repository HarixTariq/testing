<?php $this->load->view('header.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <title>Login</title>
</head>
<body style="background-color:black;">
    <div class="container"><br>
        <h1 align="center" class="reg">Login</h1>
        <div class="panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
                <?php
                if($this->session->flashdata('message'))
                {
                    echo '<div class = "alert alert-success">'.$this->session->flashdata("message").'</div>';
                }
                ?>
                <form method="post" action="<?php echo site_url('Userregistration/validationLogin') ;?>" >
                    <div class="form-group">
                        <label>Enter Email Address</label>
                        <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" />
                        <span class="text-danger"><?php echo form_error('user_email'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
                        <span class="text-danger"><?php echo form_error('user_password'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" value="Login" class="btn btn-info">
                        <div style="float:right">
                            <span>Create a new account</span>
                            <a href="<?php echo site_url('Userregistration/indexRegistration'); ?>">Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php $this->load->view('footer.php'); ?>
