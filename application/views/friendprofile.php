<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Friend Profile</title>
</head>
<body style="background-color:dodgerblue;">
    <div>
        <!-- <div class="container" > -->
        <div class="col-md-4" >
            <!-- <?php  //$nam = $this->session->userdata('namedisplay'); ?> -->
            <h2 align="left" style = "color:blue;font-family:sansserif;font-style:italic;color:black;"> <?php echo $userData['name'];?> Profile</h2>
            <div class="form-group" >
                <img style="border-radius:20px 100px;width:300px;height:300px;" src="<?php echo base_url($userData['image']) ?>" alt="Your profile picture is not set yet,please visit profile page to update picture">
            </div>
        </div>
        <div class="col-md-4" >

            <p class="showPost">
                <?php //comments names replies
                foreach ($posts as $post)
                {
                    echo "<th>Date</th>";
                    echo "<td> $post->date</td><br>";
                    //echo "<th>Post</th>";
                    echo "<h1><strong> $post->text</strong></h1><br>";
                    foreach ($comments as $comment)
                    {
                        if( $post->postid == $comment->postid)
                        {
                            echo "<label>".$names[$comment->userid]. "</label>";
                            echo " Commented on above post <br> ";
                            echo "<dt>Comment</dt>";
                            echo "<dd> $comment->text</dd><br>";
                            foreach ($replies as $reply)
                            {
                                if( $comment->id == $reply->parent_id)
                                {
                                    echo "<label>".$names[$reply->userid]. " Replied of " .$names[$comment->userid]."</label>  Comment";
                                    //echo " Replied <br> ";
                                    echo "<dt>reply</dt>";
                                    echo "<dd> $reply->text</dd><br>";
                                }
                            }
                            echo "<input type='text' id='reply_$comment->id' class='form-control' style='width:350px;' placeholder='Reply ...'>";
                            echo "<input id='id_of_post_forreply' type='hidden' value='$post->postid' />";
                            echo "<input type='button' style='border-radius: 12px;' onclick='functionreply(".$comment->id.")' class='btn btn-danger' value='Reply' /><br><br>";
                        }
                    }
                    echo "<input type='text' id='comment_$post->postid' class='form-control' style='width:350px;'  placeholder='Comment ...'>";
                    echo "<input id='id_of_post' type='hidden' value='$post->postid' />";
                    echo "<input type='button' style='border-radius: 12px;' onclick='functionComment(".$post->postid.")' class='btn btn-success' value='Comment' /><br><br>";
                }
                 ?>

            </p>
            <!-- <table id="showPost" border="5" >

            </table> -->
        </div>
        <div class="col-md-4" >
            <div class="dropdown" >
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><b>Menu</b>
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu" style="background-color:dodgerblue;">

            <li><h2 align="center" style="background-color:dodgerblue;"><a style="color:black;" href="<?php echo site_url('home/logout') ;?>">Logout</a></h2></li>
            <li><h2 align="center" style="background-color:dodgerblue;"><a style="color:black;" href="<?php echo site_url('profile'); ?>">My Profile</a></h2></li>
            <li><h2 align="center" style="background-color:dodgerblue;"><a style="color:black;" href="<?php echo site_url('addfriend'); ?>">Users</a></h2></li>
            <li><h2 align="center" style="background-color:dodgerblue;"><a style="color:black;" href="<?php echo site_url('friendlist'); ?>">Friends</a></h2></li>
                    </ul>
        </div>
</body>
</html>
<script>
function functionComment(post_id)
{
    let commenttext = $('#comment_'+post_id).val().trim();
    if(commenttext == '')
    {
        alert("Please enter some text");
    }
    else
    {
        // document.getElementById('data_of_comment').value = '';
        $.ajax({
            url:"<?php echo site_url('friendprofile/commentData'); ?>",
            method:"POST",
            datatype:"json",
            data:{"commenttext":commenttext,"post_id":post_id},
            cache:false,
            success:function(data)
            {
                window.location.reload(true);
            }
        });
    }
}
function functionreply(comment_id)
{
    let replytext = $('#reply_'+comment_id).val();
    if(replytext == '')
    {
        alert("Please enter some text");
    }
    else
    {
        var post_id = document.getElementById('id_of_post_forreply').value;
        $.ajax({
            url:"<?php echo site_url('friendprofile/replyData'); ?>",
            method:"POST",
            datatype:"json",
            data:{"replytext":replytext,"comment_id":comment_id, "post_id":post_id},
            cache:false,
            success:function(data)
            {
                window.location.reload(true);
            }
        });
    }
}

</script>
