<?php 
$peer_id = $_SESSION('peer_id');
?>
<script>
    $(document).ready(function() {
        console.log('test');
        $('#pending-table').DataTable({
            data: data,
            columns: [
                { data: 'topic' },
                { data: 'date' },
                { data: 'time' },
                { data: 'availableSlot' },
                { data: 'status' },
                { data: 'option' }
            ],
            responsive: true,
            
        });
    });
</script>