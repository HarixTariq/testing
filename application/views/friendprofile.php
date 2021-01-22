<?php $this->load->view('header.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Friend Profile</title>
</head>
<body class="home_body">

    <div class="col-md-4" >
        <h2 align="left" class="user_heading"> <?php echo $userData['name'];?> Profile</h2>
        <div class="form-group" >
            <img class="home_image" src="<?php echo base_url($userData['image']) ?>" alt="Your profile picture is not set yet,please visit profile page to update picture">
        </div>
    </div>
    <div class="col-md-4" >

        <p class="showPost">
            <?php
            foreach ($posts as $post)
            {?>
                <div class="post_text_box" align="center">

                <th>Date</th>
                <h5 ><?= $post->date ?></h5><br>
                <h1 class="post_text"><strong><?= $post->text ?></strong></h1><br>
                </div>
                <?php  foreach ($comments as $comment)
                {
                    if( $post->postid == $comment->postid)
                    {?>
                        <label class="comment_text"><?= $names[$comment->userid] ?> Commented on above post</label>
                        <br>
                        <h4 class="comment_text"><?= $comment->text ?></h4><br>
                        <?php  foreach ($replies as $reply)
                        {
                            if( $comment->id == $reply->parent_id)
                            {?>
                                <?php echo "<h6 class='reply_name'> ".$names[$reply->userid]. " Replied of " .$names[$comment->userid]." Comment </h6>"?>

                                <h5 class='reply_text'><?= $reply->text?></h5><br>
                            <?php  }
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
    </div>
    <div class="col-md-4" >
        <div class="dropdown" >
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><b>Menu</b>
                <span class="caret"></span></button>
                <ul class="dropdown-menu" style="background-color:dodgerblue;border-radius:20px 20px;">

                    <li><h2 align="center" style="background-color:dodgerblue;"><a style="color:black;" href="<?= site_url('Homeprofile/logout') ;?>">Logout</a></h2></li>
                    <li><h2 align="center" style="background-color:dodgerblue;"><a style="color:black;" href="<?php echo site_url('Homeprofile/profile'); ?>">My Profile</a></h2></li>
                    <li><h2 align="center" style="background-color:dodgerblue;"><a style="color:black;" href="<?php echo site_url('Forfriend/showsuggestion'); ?>">Users</a></h2></li>
                    <li><h2 align="center" style="background-color:dodgerblue;"><a style="color:black;" href="<?php echo site_url('Forfriend/showmyfriend'); ?>">Friends</a></h2></li>
                </ul>
        </div>
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
                url:"<?php echo site_url('Forfriend/commentData'); ?>",
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
                url:"<?php echo site_url('Forfriend/replyData'); ?>",
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
    <?php $this->load->view('footer.php'); ?>
