<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <title>Home Page</title>
    <script>
    function removereadonly()
    {
        $(".rdonly").removeAttr("readonly");
        $(".saveb").show();
        $(".cancelb").show();
        $(".editb").hide();
    }
    function showreadonly()
    {
        $(".rdonly").prop("readonly",true);
        $(".saveb").hide();
        $(".cancelb").hide();
        $(".editb").show();
    }
    // function savedata()
    // {
    //     parent.location='<?php echo site_url('profile/updatedata') ;?>';
    // }
    </script>
</head>
<body>
    <?php  $nam = $this->session->userdata('namedisplay'); ?>
    <h3 algin="center">  </h3>
    <div class="container"><br>

        <?php  echo '<h3 align="center"> Welcome '.$nam.' </h3>'?>
        <div class="panel panel-default">
            <div class="panel-heading">Your Profile</div>
            <div class="panel-body">
                <form method="post" action="<?php echo site_url('profile/updatedata') ;?>">
                    <div class="form-group">
                        <label>Your Name</label>
                        <input readonly type="text" name="user_name" class="form-control rdonly" value="<?php echo $name ?>" />
                        <?php  $this->session->set_userdata('namedisplay',$name) ; ?>
                    </div>
                    <div class="form-group">
                        <label>Your Email Address</label>
                        <input readonly type="email" name="user_email" class="form-control rdonly" value="<?php echo $email ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Enter Your Valid Password</label>
                        <input readonly required type="text" name="user_password" class="form-control rdonly" value="<?php echo $password ?>"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" style="display:none"  value="Save" class="btn btn-info saveb" onclick="savedata()"/>
                        <input type="button"  value="Edit" class="btn btn-info editb" onclick="removereadonly()" />
                        <input type="button" style="display:none" value="Cancel" class="btn btn-danger cancelb" onclick="showreadonly()"/>
                        <input type="button" class="btn btn-primary" name="back" value="Back" onclick="parent.location='<?php echo site_url('home') ;?>'"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
