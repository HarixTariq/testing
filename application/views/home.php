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
        <!-- <div class="container" > -->
        <div class="col-md-4" >
            <?php  $nam = $this->session->userdata('namedisplay'); ?>
            <h2 align="cener" style = "color:blue;font-family:sansserif;font-style:italic;color:black;"> Welcome <?php echo $nam;?> </h2>
            <div class="form-group" >
                <img style="border-radius:20px 100px;" src="<?php echo base_url($image) ?>" alt="Your profile picture is not set yet,please visit profile page to update picture">
            </div>
        </div>
        <div class="col-md-4">
            <input type="text" id="data_of_post" >
            <input type="button"  onclick="functionPost()" class='postbutton' value="Post" /><br><br>
            <p class="showPost">
                <?php
                //$records = json_decode($data);
                foreach ($abc as $key)
                {
                    echo "<br><br> $key->date";
                    echo "<br><br> $key->text";
                    // echo "<tr><td>" + results.postid +
                    //                     "</td><td>" + results.userid +
                    //                     "</td><td>" + results.date +
                    //                     "</td><td>" + results.text +
                    //                     "</tr>"

                }
                 ?>

            </p>
            <table id="showPost" border="5">

            </table>
        </div>
        <div class="col-md-4">

            <h2 align="center" style = "border-radius:10px 15px;background-color:black;width:97px;height:40px"><a href="<?php echo site_url('home/logout') ;?>">Logout</a></h2>
            <h2 align="center" style = "border-radius:10px 20px;background-color:black;color:white;width:170px;height:40px"><a href="<?php echo site_url('profile'); ?>">Show Profile</a></h2>
            <h2 align="center" style = "border-radius:10px 20px;background-color:black;color:white;width:90px;height:40px"><a href="<?php echo site_url('addfriend'); ?>">Users</a></h2>
            <!-- <h2 align="center" style = "border-radius:10px 20px;background-color:black;color:white;width:190px;height:40px"><a href="<?php echo site_url('Friendlist'); ?>">Your Friends</a></h2> -->
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
        //debugger;
        alert("Please enter some text");
    }
    else
    {
        var posttext = $('#data_of_post').val();
        $.ajax({
            url:"<?php echo site_url('home/postData'); ?>",
            method:"POST",
            datatype:"json",
            data:{"posttext":posttext},
            cache:false,
            success:function(data)
            {
                debugger;
                var val = JSON.parse(data);
                // $.each(data.results, function(i, results) {
                //     var tblRow =    "<tr><td>" + results.postid +
                //                     "</td><td>" + results.userid +
                //                     "</td><td>" + results.date +
                //                     "</td><td>" + results.text +
                //                     "</tr>"
                //     $(tblRow).appendTo("#showPost tbody");
                //     debugger;
                // });
                $('#showPost').html(val);
            }
        });
    }
}

</script>
