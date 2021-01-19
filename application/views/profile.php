<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <title>Profile Page</title>
</head>
<body style="background-color:grey;">
    <?php  $nam = $this->session->userdata('namedisplay'); ?>
    <h3 algin="center">  </h3>
    <div class="container"><br>

        <?php  $nam = $this->session->userdata('namedisplay'); ?>
        <h2 align="center" style = "color:blue;font-family:sansserif;font-style:italic;color:black;"> Welcome <?php echo $nam;?> </h2>

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
                    <!-- <div class="form-group">
                        <img src="<?php echo base_url($image) ?>" alt="hahahaha  ">
                    </div> -->
                    <div class="form-group">
                        <input type="submit" style="display:none"  value="Save" class="btn btn-info saveb" onclick="savedata()"/>
                        <input type="button"  value="Edit" class="btn btn-info editb" onclick="removereadonly()" />
                        <input type="button" style="display:none" value="Cancel" class="btn btn-danger cancelb" onclick="showreadonly()"/>
                        <input type="button" class="btn btn-primary back" name="back" value="Back" onclick="parent.location='<?php echo site_url('home') ;?>'"/>
                    </div>
                </form>
                <div class="container" align="right"><br><br>
                    <h3 align="center">Upload Image</h3>
                    <form method="post" id="upload_form" align="center" enctype="multipart/form-data">
                        <input type="file" name="image_file" id="image_file" />
                        <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />
                    </form>
                    <div id="uploaded_image">
                    </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
function removereadonly()
{
    $(".rdonly").removeAttr("readonly");
    $(".saveb").show();
    $(".cancelb").show();
    $(".editb").hide();
    $(".back").hide();
}
function showreadonly()
{
    $(".rdonly").prop("readonly",true);
    $(".saveb").hide();
    $(".cancelb").hide();
    $(".editb").show();
    $(".back").show();
}

$(document).ready(function(){
    $('#upload_form').on('submit',function(ev){
        ev.preventDefault();
        debugger;
        if($('#image_file').val() == '')
        {
            alert("Please select the file");
        }
        else
        {

            $.ajax({
                url:"<?php echo site_url('profile/ajax_upload'); ?>",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success:function(data)
                {
                    //debugger;
                    $('#uploaded_image').html(data);
                }
            });
        }
    });
});
</script>
