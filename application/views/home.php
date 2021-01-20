<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <title>Home Page</title>
</head>
<body style="background-color:dodgerblue;">
    <div>
        <!-- <div class="container" > -->
        <div class="col-md-4" >
            <?php  $nam = $this->session->userdata('namedisplay'); ?>
            <h2 align="cener" style = "color:blue;font-family:sansserif;font-style:italic;color:black;"> Welcome <?php echo $nam;?> </h2>
            <div class="form-group" >
                <img style="border-radius:20px 100px;" src="<?php echo base_url($getdata['image']) ?>" alt="Your profile picture is not set yet,please visit profile page to update picture">
            </div>
        </div>
        <div class="col-md-4" >
            <input type="text" id="data_of_post" style="width:250px;border-radius:20px;">
            <input type="button"  onclick="functionPost()" class='postbutton btn btn-primary' value="Post" /><br><br>
            <p class="showPost">
                <?php
                foreach ($abc as $key)
                {
                    echo "<th>Date</th>";
                    echo "<td> $key->date</td><br>";
                    echo "<th>Post</th>";
                    echo "<td><strong> $key->text</strong></td><br>";
                    echo "<input type='text' id='data_of_comment' class='form-control' style='width:350px;' >";
                    echo "<input type='button' style='border-radius: 12px;' onclick='functionComment()' class='commentbutton btn btn-success' value='Comment' /><br><br>";
                }
                 ?>

            </p>
            <table id="showPost" border="5">

            </table>
        </div>
        <div class="col-md-4">

            <h2 align="center" style = "border-radius:10px 15px;background-color:black;width:97px;height:40px"><a style="color:white;" href="<?php echo site_url('home/logout') ;?>">Logout</a></h2>
            <h2 align="center" style = "border-radius:10px 20px;background-color:black;color:white;width:170px;height:40px"><a style="color:white;" href="<?php echo site_url('profile'); ?>">Show Profile</a></h2>
            <h2 align="center" style = "border-radius:10px 20px;background-color:black;color:white;width:90px;height:40px"><a style="color:white;" href="<?php echo site_url('addfriend'); ?>">Users</a></h2>
            <h2 align="center" style = "border-radius:10px 20px;background-color:black;color:white;width:110px;height:40px"><a style="color:white;" href="<?php echo site_url('friendlist'); ?>">Friends</a></h2>
        </div>
        <!-- </div> -->
    </div>
</body>
</html>
<script>
function functionPost()
{
    if($('#data_of_post').val() == '')
    {
        //alert("Please enter some text");
    }
    else
    {
        var posttext = $('#data_of_post').val();
        document.getElementById('data_of_post').value = '';
        $.ajax({
            url:"<?php echo site_url('home/postData'); ?>",
            method:"POST",
            datatype:"json",
            data:{"posttext":posttext},
            cache:false,
            success:function(data)
            {
                //var posttext1=$('#data_of_post').val();
                //posttext1='';
                //$('#showPost').html(val);
            }
        });
    }
}
// function functionComment()
// {
//     if($('#data_of_comment').val() == '')
//     {
//         alert("Please enter some text");
//     }
//     else
//     {
//         var commenttext = $('#data_of_comment').val();
//         document.getElementById('data_of_comment').value = '';
//         $.ajax({
//             url:"<?php echo site_url('home/commentData'); ?>",
//             method:"POST",
//             datatype:"json",
//             data:{"commenttext":commenttext},
//             cache:false,
//             success:function(data)
//             {
//                 //var posttext1=$('#data_of_post').val();
//                 //posttext1='';
//                 //$('#showPost').html(val);
//             }
//         });
//     }
// }

</script>
