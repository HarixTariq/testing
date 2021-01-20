<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <title>Friend Profile</title>
</head>
<body style="background-color:dodgerblue;">
    <div>
        <!-- <div class="container" > -->
        <div class="col-md-4" >
            <!-- <?php  //$nam = $this->session->userdata('namedisplay'); ?> -->
            <h2 align="left" style = "color:blue;font-family:sansserif;font-style:italic;color:black;"> Welcome <?php echo $userData['name'];?> </h2>
            <div class="form-group" >
                <img style="border-radius:20px 100px;width:300px;height:300px;" src="<?php echo base_url($userData['image']) ?>" alt="Your profile picture is not set yet,please visit profile page to update picture">
            </div>
        </div>
        <div class="col-md-4" >

            <p class="showPost">
                <?php //comments names
                foreach ($posts as $post)
                {
                    echo "<th>Date</th>";
                    echo "<td> $post->date</td><br>";
                    echo "<th>Post</th>";
                    echo "<td><strong> $post->text</strong></td><br>";
                    foreach ($comments as $comment)
                    {
                        if( $post->postid == $comment->postid)
                        {
                            echo "<label>".$names[$comment->userid]. "</label>";
                            echo " Commented on above post <br> ";
                            // foreach ($names as $name)
                            // {
                            //     if( $name->ID == $comment->userid)
                            //     {
                            //             echo "<label> $name->Name </label>";
                            //             echo " Commented on above post <br> ";
                            //     }
                            // }
                            echo "<dt>Comment</dt>";
                            echo "<dd> $comment->text</dd><br>";
                        }
                    }
                    echo "<input type='text' id='data_of_comment' class='form-control' style='width:350px;' >";
                    echo "<input id='id_of_post' type='hidden' value='$post->postid' />";
                    echo "<input type='button' style='border-radius: 12px;' onclick='functionComment()' class='btn btn-success' value='Comment' /><br><br>";
                }
                 ?>

            </p>
            <!-- <table id="showPost" border="5" >

            </table> -->
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
function functionComment()
{
    if($('#data_of_comment').val() == '')
    {
        alert("Please enter some text");
    }
    else
    {
        debugger;
        var commenttext = document.getElementById('data_of_comment').value;
        var post_id = document.getElementById('id_of_post').value;
        document.getElementById('data_of_comment').value = '';
        //var commenttext = $('#data_of_comment').val();
        //var post_id = $('#id_of_post').val();
        //console.log(post_id);
        document.getElementById('data_of_comment').value = '';
        $.ajax({
            url:"<?php echo site_url('friendprofile/commentData'); ?>",
            method:"POST",
            datatype:"json",
            data:{"commenttext":commenttext,"post_id":post_id},
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

</script>
