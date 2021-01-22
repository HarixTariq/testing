<?php
$this->load->view('header.php'); ?>
<body class="body_friendlist" >
    <div class="col-3" >
        <h2><a  href="<?php echo site_url('Homeprofile/profile'); ?>">Show Profile</a></h2>
    </div>
    <div class="col-9">

        <div align="center" class="user_outer_box">

            <?php
            foreach($result as $row){
                $skipid = $this->session->userdata('id');
                if ($skipid == $row->ID)
                {
                    continue;
                }
                ?>
                <div class="user_inner_box">
                    <img style="border-radius:10px 10px; width:40px;height:40px;" src="<?php echo base_url($row->image) ?>" alt="No image for this user">
                    <label class="friend_name"><?=$row->Name?></label>
                    <input type="button" onclick="add_friend(<?= $row->ID?>)" class='btn btn-success friendbutton' value="Add Freind" />
                    <br><br>
                </div><br>
                <?php
            }
            //
            ?>
        </div>
    </div>
</body>
<script>
function add_friend(user_id)
{
    debugger;
    $.ajax({
        url:"<?php echo site_url('forfriend/adding_friend'); ?>",
        method:"POST",
        data:{"userId":user_id},
        //contentType:false,
        cache:false,
        //processData:false,
        success:function(data)
        {
            alert("Now a friend");
        }
    });
}
</script>
<?php  $this->load->view('footer.php'); ?>
