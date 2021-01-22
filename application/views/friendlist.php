<?php $this->load->view('header.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Show Friends</title>
</head>
<body class ="body_friendlist">
    <div align="center" class="user_outer_box">


    <?php
    foreach($list as $friend)

    {?>
    <div class="user_inner_box">

        <label class="friend_name" > <?=$friend->Name;?> </label><br>
        <h2 align="center" class="show_profile">
            <a style="color:white;" href="<?php echo site_url('Forfriend/showprofile').'/'.$friend->ID ;?>">Show Profile</a>
        </h2>
    </div><br>
        <?php
    }
    ?>
    </div>
</body>
</html>
<?php $this->load->view('footer.php'); ?>
