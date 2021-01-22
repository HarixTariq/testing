<?php $this->load->view('header.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Home Page</title>
</head>
<body class = "home_body">
    <div>
        <!-- <div class="container" > -->
        <div class="col-md-4" >
            <?php  $nam = $this->session->userdata('namedisplay'); ?>
            <h2 align="cener" class = "user_heading" > Welcome <?php echo $nam;?> </h2>
            <div class="form-group" >
                <img class="home_image" src="<?php echo base_url($getdata['image']) ?>" alt="Your profile picture is not set yet,please visit profile page to update picture">
            </div>
        </div>
        <div class="col-md-4" >
            <input type="text" id="data_of_post" >
            <input type="button"  onclick="functionPost()" class='postbutton btn btn-primary' value="Post" /><br><br>
            <p class="showPost">
                <?php
                foreach ($abc as $post)
                {?>
                    <div class="post_text_box" align="center">
                    <th>Date</th>
                    <td><?= $post->date?></td><br>
                    <!-- <th>Post</th> -->
                    <h1 class="post_text"><strong><?= $post->text?></strong></h1><br>
                    </div>
                    <?php  foreach ($comments as $comment)
                    {
                        if( $post->postid == $comment->postid && $comment->parent_id == 0)
                        {?>
                            <?php echo "<label>".$names[$comment->userid]. " Commented on above post <br></label>";?>
                            <!-- <dt>Comment</dt> -->
                            <h4 class="comment_text" ><?=  $comment->text?></h4><br>
                            <?php foreach ($replies as $reply)
                            {
                                if( $comment->id == $reply->parent_id)
                                {
                                    echo "<h6 class='reply_name'>".$names[$reply->userid]. " Replied of " .$names[$comment->userid]." Comment </h6>";
                                    //echo " Replied <br> ";
                                    //echo "<dt>reply</dt>";
                                    echo "<h5 class='reply_text' > $reply->text</h5><br>";
                                }
                            }
                            echo "<input type='text' id='reply_$comment->id' class='form-control' style='width:300px;' placeholder='Reply ...'>";
                            echo "<input id='id_of_post_forreply' type='hidden' value='$post->postid' />";
                            echo "<input type='button' style='border-radius: 12px;' onclick='functionreply(".$comment->id.")' class='btn btn-danger' value='Reply' /><br><br>";
                        }
                    }
                    echo "<input type='text' id='comment_$post->postid' class='form-control' style='width:450px;' >";
                    echo "<input id='id_of_post' type='hidden' value='$post->postid' />";
                    echo "<input type='button' style='border-radius: 12px;' onclick='functionComment(".$post->postid.")' class='commentbutton btn btn-success' value='Comment' /><br><br>";
                }
                 ?>

            </p>
            <table id="showPost" border="5">

            </table>
        </div>
        <div class="col-md-4" align="right">

            <h2 align="center" class ="btn_logout"><a class="link_white" href="<?php echo site_url('Homeprofile/logout') ;?>">Logout</a></h2>
            <h2 align="center" class = "btn_showprofile" ><a class="link_white" href="<?php echo site_url('Homeprofile/profile'); ?>">Show Profile</a></h2>
            <h2 align="center" class="btn_addfriend"><a class="link_white" href="<?php echo site_url('Forfriend/showsuggestion'); ?>">Users</a></h2>
            <h2 align="center" class="btn_freindlist"><a class="link_white" href="<?php echo site_url('Forfriend/showmyfriend'); ?>">Friends</a></h2>
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
        alert("Please enter some text");
    }
    else
    {
        var posttext = $('#data_of_post').val();
        document.getElementById('data_of_post').value = '';
        $.ajax({
            url:"<?php echo site_url('Homeprofile/postData'); ?>",
            method:"POST",
            datatype:"json",
            data:{"posttext":posttext},
            cache:false,
            success:function(data)
            {
                window.location.reload(true);
            }
        });
    }
}
function functionComment(post_id)
{
    let commenttext = $('#comment_'+post_id).val().trim();
    if(commenttext == '')
    {
        alert("Please enter some text");
    }
    else
    {
        // var commenttext = document.getElementById('data_of_comment').value;
        // var post_id = document.getElementById('id_of_post').value;
        //document.getElementById('data_of_comment').value = '';
        //var commenttext = $('#data_of_comment').val();
        //var post_id = $('#id_of_post').val();
        //console.log(post_id);
        //document.getElementById('comment_'post_id'').value = '';
        $.ajax({
            url:"<?php echo site_url('Homeprofile/commentData'); ?>",
            method:"POST",
            datatype:"json",
            data:{"commenttext":commenttext,"post_id":post_id},
            cache:false,
            success:function(data)
            {
                window.location.reload(true);
                //var posttext1=$('#data_of_post').val();
                //posttext1='';
                //$('#showPost').html(val);
            }
        });
    }
}
function functionreply(comment_id)
{
    let replytext = $('#reply_'+comment_id).val();
    debugger;
    if(replytext == '')
    {
        alert("Please enter some text");
    }
    else
    {
        var post_id = document.getElementById('id_of_post_forreply').value;
        $.ajax({
            url:"<?php echo site_url('Homeprofile/replyData'); ?>",
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
