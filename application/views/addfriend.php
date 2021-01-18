<?php
$this->load->view('header.php');
        foreach($result as $row){ ?>
            <button onclick="add_friend(<?= $row->ID?>)" class='friendbutton'  ><?=$row->Name?></button><br><br>
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
            data:{userId:user_id},
            //contentType:false,
            cache:false,
            //processData:false,
            success:function(data1)
            {
                    alert(data1);
            }
        });
}
</script>
<?php  $this->load->view('footer.php'); ?>
