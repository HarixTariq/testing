<?php
$this->load->view('header.php');
        foreach($result as $row){
            $skipid = $this->session->userdata('id');
            if ($skipid == $row->ID)
            {
                continue;
            }
            ?>
            <label><?=$row->Name?></label>
            <input type="button" onclick="add_friend(<?= $row->ID?>)" class='friendbutton' value="Add Freind" />
            <br><br>
        <?php
    }
    //
        ?>

<script>
function add_friend(user_id)
{
    debugger;
        $.ajax({
            url:"<?php echo site_url('addfriend/adding_friend'); ?>",
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
