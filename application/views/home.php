<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <title>Home Page</title>
        <?php  $my_url = site_url('home/upload_file') ?>
        <script>
    $(function() {
$('#upload_file').submit(function(e) {
e.preventDefault();
debugger;
let myurl = "<?php echo $my_url ?>";
$('#userfile').AjaxFileUpload({
    url 			:myurl,
    secureuri		:false,
    fileElementId	:'userfile',
    dataType		: 'json',
    });
    return false;
    });
    });
        </script>
    </head>
    <body>
        <?php  $nam = $this->session->userdata('namedisplay');
        echo '<h3 algin="center"> Welcome '.$nam.' </h3>';?>
        <h3 align="center">Upload Image</h3>
           <form method="post" id="upload_file" align="center" enctype="multipart/form-data">
                <input type="file" name="userfile" id="userfile" />
                <input type="submit" name="submit" id="submit" value="Upload" class="btn btn-info" />
           </form>
           <div id="files">
           </div>
        <?php echo '<h2 align="right" style = "padding-top:500px; padding-right:200px;"><a href="'.base_url().'index.php/home/logout">Logout</a></h2>';
        echo '<h2 align="right" style = "padding-right:200px;"><a href="'.base_url().'index.php/profile">Show Profile</a></h2>';
        ?>

    </body>
</html>
