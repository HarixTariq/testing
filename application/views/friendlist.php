<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Show Friends</title>
</head>
<body>
    <?php
    foreach($list as $friend)
    {?>
        <label> <?=$friend->Name;?> </label><br>

        <h2 align="center" style = "border-radius:10px 15px;background-color:black;width:167px;height:40px">
            <a style="color:white;" href="<?php echo site_url('friendprofile/showprofile').'/'.$friend->friendid ;?>">Show Profile</a>
        </h2>
        <?php
    }
    ?>

</body>
</html>
