<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <title>Home Page</title>
        <script>
            function removereadonly()
            {
                $();
            }
        </script>
    </head>
    <body>

        <?php  $nam = $this->session->userdata('namedisplay'); ?>
        <h3 algin="center">  </h3>
        <div class="container"><br>
            <?php  echo '<h3 algin="center"> Welcome '.$nam.' </h3>'?>
            <div class="panel panel-default">
                <div class="panel-heading">Your Profile</div>
                <div class="panel-body">
                    <form method="post" action="<?php echo site_url('register/validation') ;?>">
                        <div class="form-group">
                            <label>Your Name</label>
                            <input readonly type="text" name="user_name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Your Valid Email Address</label>
                            <input readonly type="email" name="user_email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Your Valid Password</label>
                            <input readonly type="text" name="user_password" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="button" style="display:none" name="save" value="Save" class="btn btn-info" />
                            <input type="button" name="edit" value="Edit" class="btn btn-info" onclick="removereadonly()" />
                            <input type="button" style="display:none" name="cancel" value="Cancel" class="btn btn-danger" />
                        </div>

                    </form>

                </div>

            </div>
        </div>


    </body>
</html>
