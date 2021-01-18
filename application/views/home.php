<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>Home Page</title>
</head>
<body style="background-color:dodgerblue;">
    <div >
        <div class="container" >
            <div class="col-md-8">
                <?php  $nam = $this->session->userdata('namedisplay'); ?>
                <h2 align="cener" style = "color:blue;font-family:sansserif;font-style:italic;color:black;"> Welcome <?php echo $nam;?> </h2>
    <div class="form-group" >
        <img style="border-radius:20px 100px;" src="<?php echo base_url($image) ?>" alt="Your profile picture is not set yet,please visit profile page to update picture">
    </div>
</div>
<div class="col-md-4">

    <h2 align="center" style = "border-radius:10px 15px;background-color:black;width:97px;height:40px"><a href="<?php echo site_url('home/logout') ;?>">Logout</a></h2>
    <h2 align="center" style = "border-radius:10px 20px;background-color:black;color:white;width:170px;height:40px"><a href="<?php echo site_url('profile'); ?>">Show Profile</a></h2>
    <h2 align="center" style = "border-radius:10px 20px;background-color:black;color:white;width:90px;height:40px"><a href="<?php echo site_url('addfriend'); ?>">Users</a></h2>
</div>
</div>
</div>
</body>
</html>
<!-- <script>
$(document).ready(function(){
$('#upload_form').on('submit',function(ev){
ev.preventDefault();
if($('#image_file').val() == '')
{
alert("Please select the file");
}
else
{
$.ajax({
url:"<?php echo site_url('home/ajax_upload'); ?>",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data)
{
$('#uploaded_image').html(data);
}
});
}
});
});
</script> -->
