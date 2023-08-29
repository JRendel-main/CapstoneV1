<?php
$peer_id = $_SESSION['peer_id'];
?>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '../../server/tutor/request-list.php',
            method: 'POST',
            data: { peer_id: <?php echo $peer_id; ?> },
            dataType: 'json',
            success: function(response) {
                console.log(response.);
            },
            error: function(response) {
                console.log(response);
            }
        });
    });
</script>